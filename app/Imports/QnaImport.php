<?php

namespace App\Imports;

use App\Models\Questions;
use App\Models\Answers;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class QnaImport implements ToModel
{
    public function model(array $row): Model|null
    {
        \Log::info($row);
        // return new Questions([
        
        // ]);
    }
}
