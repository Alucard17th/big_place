<?php

namespace App\Imports;

use App\Models\Job;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JobImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Job([
            //
            'code_ogr' => $row,
            'full_name' => $row,
        ]);
    }
}
