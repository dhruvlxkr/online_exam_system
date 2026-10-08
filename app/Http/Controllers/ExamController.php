<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Subject;



class ExamController extends Controller
{
 
   public function index(){
    $subjects = Subject::all();
    $exams = Exam::with('subjects')->get();
    // dd($subjects);
    return view('admin.exams.exam',['subjects' => $subjects,'exams' => $exams ]);
   }


   public function store(Request $request){
    try{
     Exam::insert([
        'exam_name' => $request->examName,
        'subject_id' => $request->subjectName,
        'exam_date' => $request->examDate, 
        'exam_time' => $request->examTime
     ]);
    return response()->json([
            'success' => true,
            'message' => "Exam Submitted Successfully"
        ]);
    }catch(\Exception $e){
        return response()->json([
            'success' => true,
            'message' => $e->getMessage()
        ]);
    }
   }

   public function examDetailsget($id){
      try{
        
      $examData = Exam::where('id',$id)->get();
        return response()->json([
           'success' => true,
           'data' => $examData
        ]);
      }catch(\Exception $e){
        return response()->json([
           'success' => false,
           'message' => $e->getMessage()
        ]);
      }
   }

   public function update(Request $request){
   try{
      Exam::where('id',$request->exam_id)->update([
           'subject_id' => $request->subjectName1,
           'exam_name' => $request->examName1,
           'exam_date' => $request->examDate1,
           'exam_time' => $request->examTime1,

      ]);
       return response()->json([
            'success' => true,
            'message' => "Your Data Updated Successfully"
        ]);
   }catch(\Exception $e){
        return response()->json([
            'success' => false,
            'message' =>$e->getMessage()
        ]);
   }

}
}