<?php

namespace App\Imports;

use App\Models\tbl_officer;
use App\Models\tbl_officer_room;
use App\Models\tbl_room;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class officerImport implements ToCollection, WithStartRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        set_time_limit(500);

        foreach ($collection as $item) {
            $count = tbl_officer::where('username', $item[5])->count();
            if ($count == 0) {
                $sql = new tbl_officer();
                $sql->officer_firstname = $item[0] ?? '';
                $sql->officer_email = $item[1] ?? '';
                $sql->officer_address = $item[2] ?? '';
                $sql->officer_number = $item[3] ?? '';
                $sql->username = $item[5] ?? '';
                $sql->password = $item[6] != '' ? Hash::make($item[6]) : Hash::make(1234);
                $sql->save();

                if (!empty($item[4])) {
                    $first = tbl_officer::select(DB::raw('MAX(officer_id) as officer_id'))->first();
                    $ex = explode(',', $item[4]);
                    foreach ($ex as $for) {
                        $room_name = trim($for);
                        $room = tbl_room::where('room_name', 'LIKE', $room_name)->first();
                        if (!empty($room)) {
                            $sql = new tbl_officer_room();
                            $sql->room_id = $room->room_id;
                            $sql->officer_id = $first->officer_id;
                            $sql->save();
                        }
                    }
                }
            }
        }
    }
    public function startRow(): int
    {
        return 4;
    }
}
