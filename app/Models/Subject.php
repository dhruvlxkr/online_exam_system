<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $table = 'subjects';
    public $timestamps = false;

    protected $fillable = [
        'subject_name',
        'created_at',
        'updated_at'
    ];
}
