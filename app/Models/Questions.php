<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
   public $table = 'questions';
  protected $fillable = [
    'questions',
   ];
}
