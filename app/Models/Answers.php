<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
  public $table = 'answers';
  protected $fillable = [
    'question_id',
    'answer',
    'is_correct'
   ];
}
