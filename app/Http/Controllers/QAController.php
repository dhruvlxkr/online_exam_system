<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\Answers;

class QAController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $quetions =  Questions::with('answers')->get();
        return view('admin.questions.que-ans',compact('quetions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       try{

          $request->validate([
            'question' => 'required|string',
            'answers' => 'required|array|min:2',
            'answers.*' => 'required|string',
            'correct_answer' => 'required|integer|min:0',
        ]);
         $questionId = Questions::insertGetId([
            'questions' => $request->question
         ]);

         foreach($request->answers as $index => $answer){
            Answers::insert([
            'question_id' => $questionId,
            'answer' => $answer,
            'is_correct'=>($index == $request->correct_answer)? 1 : 0
         ]);
         }
         
        return response()->json([
            'success' => true,
            'message' => "Your Question And Answer Inserted Successfully"
        ]);
       }catch(\Exception $e){
        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        try {
            $qa = Questions::where('id', $request->qid)->with('answers')->first();
            if (!$qa) {
                return response()->json([
                    'success' => false,
                    'message' => 'Question Not Found'
                ]);
            }
            return response()->json([
                'success' => true,
                'data' => $qa
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $request->validate([
                'qid' => 'required',
                'edit_question' => 'required|string',
            ]);

            Questions::where('id', $request->qid)->update([
                'questions' => $request->edit_question
            ]);

            $existingAnsIds = [];

            if ($request->has('answers') && is_array($request->answers)) {
                $existingAnsIds = array_keys($request->answers);
                foreach ($request->answers as $ansId => $ansText) {
                    $isCorrect = ($request->edit_correct_answer == $ansId || $request->edit_correct_answer === $ansText) ? 1 : 0;
                    Answers::where('id', $ansId)
                        ->where('question_id', $request->qid)
                        ->update([
                            'answer' => $ansText,
                            'is_correct' => $isCorrect
                        ]);
                }
            }

            Answers::where('question_id', $request->qid)
                ->whereNotIn('id', $existingAnsIds)
                ->delete();

            if ($request->has('new_answers') && is_array($request->new_answers)) {
                foreach ($request->new_answers as $newAnsText) {
                    if (!empty($newAnsText)) {
                        $isCorrect = ($request->edit_correct_answer === $newAnsText) ? 1 : 0;
                        Answers::create([
                            'question_id' => $request->qid,
                            'answer' => $newAnsText,
                            'is_correct' => $isCorrect
                        ]);
                    }
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Question and Answers Updated Successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try{
            Questions::where('id',$request->id)->delete();
            Answers::where('question_id',$request->id)->delete();
        return response()->json([
             'success'=>true,
            'message' => 'Record Delete Successfully'
        ]);

        }catch(\Exception $e){
            return response()->json([
                'success'=>false,
                'message' => $e->getMessage()
            ]);
        }
       
    }
}
