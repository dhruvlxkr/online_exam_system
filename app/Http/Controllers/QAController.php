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
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
