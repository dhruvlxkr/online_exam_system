<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public $table = 'exams';

    protected $fillable = [
        'subject_id',
        'exam_name',
        'exam_date',
        'exam_time'
    ];  

    public function subject(){
        return $this->hasMany(Subject::class,'id','subject_id');
    }
}   
