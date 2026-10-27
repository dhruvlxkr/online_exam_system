<?php

namespace App\Imports;

use App\Models\Questions;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class QnaImport implements ToModel
{
    public function model(array $row): Model|null
    {
        return new Questions([
            //
        ]);
    }
}
