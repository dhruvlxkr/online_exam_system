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

    public function update(Request $request){

    try{
      $subjectdata = Subject::find($request->id);
       if($subjectdata == null){
        return response()->json([
            'success'=> false,
            'message'=> 'Subject Not Found'
        ]);
       }
      $subjectdata->update([
        'subject_name' => $request->subjectName
      ]);
      if(!$subjectdata){
        return response()->json([
            'success'=> false,
            'message'=> 'Subject Not Updated'
        ]);
      }
      return response()->json([
        'success'=> true,
         'message'=> 'Subject Updated Successfully'
     ]);
    }catch(\Exception $e){
        return response()->json([
            'success'=> false,
            'message'=> $e->getMessage()
        ]);
    }
    }

    public function destroy(Request $request){
        try{

        Subject::where('id',$request->deleteid)->delete();
        return response()->json([
            'success'=> true,
            'message'=> 'Subject Deleted Successfully'
        ]);

        }catch(\Expception $e){
            return response()->json([
                'success'=> false,
                'message'=> $e->getMessage()
            ]);
        }
    }
}
