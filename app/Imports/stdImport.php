<?php

namespace App\Imports;

use App\Models\tbl_student;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class stdImport implements ToCollection, WithStartRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        set_time_limit(500);
        foreach ($collection as $item) {
            $count = tbl_student::where('username', $item[5])->count();
            if ($count == 0) {
                if (substr($item[0], 0, 2) == 40 or substr($item[0], 0, 2) == 10) {
                    $sql = new tbl_student();
                    $sql->student_code = $item[0] ?? '';
                    $sql->student_firstname = $item[1] ?? '';
                    $sql->student_email = $item[2] ?? '';
                    $sql->student_address = $item[3] ?? '';
                    $sql->student_numeber = $item[4] ?? '';
                    $sql->username = $item[5] ?? '';
                    $sql->password = $item[6] != '' ? Hash::make($item[6]) : Hash::make(1234);
                    $sql->save();
                }
            }
        }
    }
    public function startRow(): int
    {
        return 4;
    }
}
