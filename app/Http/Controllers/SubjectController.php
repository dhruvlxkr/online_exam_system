<?php

namespace App\Http\Controllers;
use App\Models\Subject;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
       $subjects = Subject::all();
        return view('admin.subjects.subject',compact('subjects'));
    }

    public function store(Request $request){
      
    try{
     Subject::insert([
        'subject_name' => $request->subjectName
     ]);

     return response()->json([
        'success'=> true,
         'message'=> 'Subject Submitted Successfully'
     ]);
    }catch(\Exception $e){
        return response()->json([
            'success'=> false,
            'message'=> $e->getMessage()
        ]);
    }
    }
}
