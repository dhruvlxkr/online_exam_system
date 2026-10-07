<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Subject;



class ExamController extends Controller
{
 
   public function index(){
    $subjects = Exam:: with('subject')->get();
    // dd($subjects);
    return view('admin.exams.exam',['subjects' => $subjects ]);
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
    }catch(\Expception $e){
        return response()->json([
            'success' => true,
            'message' => $e->getMessage()
        ]);
    }
   }

}
