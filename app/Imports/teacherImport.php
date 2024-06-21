<?php

namespace App\Imports;

use App\Models\tbl_lecturer;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class teacherImport implements ToCollection, WithStartRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        set_time_limit(500);
        foreach ($collection as $item) {
            $count = tbl_lecturer::where('username', $item[4])->count();
            if ($count == 0) {
                $sql = new tbl_lecturer();
                $sql->lecturer_firstname = $item[0] ?? '';
                $sql->lecturer_email = $item[1] ?? '';
                $sql->lecturer_address = $item[2] ?? '';
                $sql->lecturer_numeber = $item[3] ?? '';
                $sql->username = $item[4] ?? '';
                $sql->password = $item[5] != '' ? Hash::make($item[5]) : Hash::make(1234);
                $sql->save();
            }
        }
    }
    public function startRow(): int
    {
        return 4;
    }
}
