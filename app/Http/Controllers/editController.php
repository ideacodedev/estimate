<?php

namespace App\Http\Controllers;

use App\Models\tbl_at_title;
use App\Models\tbl_building;
use App\Models\tbl_ed;
use App\Models\tbl_ed_type;
use App\Models\tbl_lecturer;
use App\Models\tbl_officer;
use App\Models\tbl_officer_room;
use App\Models\tbl_room;
use App\Models\tbl_room_ed;
use App\Models\tbl_student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class editController extends Controller
{
    public function __construct()
    {
        $this->middleware('isLogin');
    }
    public function edit_at_title(Request $request)
    {
        tbl_at_title::where('at_title_id', $request->at_title_id)->update([
            'at_title_text' => $request->at_title_text,
        ]);
        return redirect()->back()->with('success', 'แก้ไขข้อมูลเรียบร้อย');
    }
    public function edit_room(Request $request)
    {

        $check = tbl_room::where('room_name', $request->room_name)
            ->where('building_id', $request->building_id)
            ->where('room_id', '!=', $request->room_id)
            ->where('room_floor', $request->room_floor)
            ->count();
        if ($check > 0) {
            return redirect()->back()->with('error', 'มีชื่ออาคารและห้องนี้อยู่ในระบบแล้ว');
        }
        tbl_room::where('room_id', $request->room_id)->update([
            'room_name' => $request->room_name,
            'building_id' => $request->building_id,
            'room_floor' => $request->room_floor,
        ]);
        foreach ($request->ed_id as $for) {
            $room_ed = tbl_room_ed::where('room_id', $request->room_id)
                ->where('ed_id', $for);
            if ($room_ed->count() == 0) {
                $sql = new tbl_room_ed();
                $sql->ed_id = $for;
                $sql->room_id = $request->room_id;
                $sql->save();
            }
        }
        foreach (tbl_room_ed::where('room_id', $request->room_id)->get() as $for) {
            if (!in_array($for->ed_id,$request->ed_id)) {
                tbl_room_ed::where('room_ed_id', $for->room_ed_id)->delete();
            }
        }
        return redirect()->route('room')->with('success', 'แก้ไขข้อมูลเรียบร้อย');
    }
    public function edit_ed(Request $request)
    {
        tbl_ed::where('ed_id', $request->ed_id)
            ->update([
                'ed_device' => $request->ed_device,
                'ed_type_id' => $request->ed_type_id,
            ]);
        return redirect()->back()->with('success', 'แก้ไขข้อมูลเรียบร้อย');
    }
    public function edit_ed_type(Request $request)
    {
        tbl_ed_type::where('ed_type_id', $request->ed_type_id)
            ->update([
                'ed_type_name' => $request->ed_type_name,
            ]);
        return redirect()->back()->with('success', 'แก้ไขข้อมูลเรียบร้อย');
    }
    public function edit_building(Request $request)
    {
        tbl_building::where('building_id', $request->building_id)
            ->update([
                'building_name' => $request->building_name,
            ]);
        return redirect()->back()->with('success', 'แก้ไขข้อมูลเรียบร้อย');
    }
    public function edit_officer(Request $request)
    {
        tbl_officer::where('officer_id', $request->officer_id)
            ->update([
                'officer_firstname' => $request->officer_firstname,
                'officer_email' => $request->officer_email,
                'officer_address' => $request->officer_address,
                'officer_number' => $request->officer_number,
                'username' => $request->username,
            ]);

        if (isset($request->password)) {
            tbl_officer::where('officer_id', $request->officer_id)
                ->update([
                    'password' => Hash::make($request->password),
                ]);
        }

        tbl_officer_room::where('officer_id', $request->officer_id)->delete();
        foreach ($request->room_id as $for) {
            $sql = new tbl_officer_room();
            $sql->room_id = $for;
            $sql->officer_id = $request->officer_id;
            $sql->save();
        }

        return redirect()->back()->with('success', 'แก้ไขข้อมูลเรียบร้อย');
    }
    public function edit_student(Request $request)
    {

        if (substr($request->student_code, 0, 2) != 40 and substr($request->student_code, 0, 2) != 10) {
            return redirect()->back()->with('error', 'รหัสนักศึกษาไม่ถูกต้อง!');
        }

        tbl_student::where('student_id', $request->student_id)
            ->update([
                'student_code' => $request->student_code,
                'student_firstname' => $request->student_firstname,
                'student_email' => $request->student_email,
                'student_address' => $request->student_address,
                'student_numeber' => $request->student_numeber,
                'username' => $request->username,
            ]);

        if (isset($request->password)) {
            tbl_student::where('student_id', $request->student_id)
                ->update([
                    'password' => Hash::make($request->password),
                ]);
        }
        return redirect()->back()->with('success', 'แก้ไขข้อมูลเรียบร้อย');
    }
    public function edit_lecturer(Request $request)
    {
        tbl_lecturer::where('lecturer_id', $request->lecturer_id)
            ->update([
                'lecturer_firstname' => $request->lecturer_firstname,
                'lecturer_email' => $request->lecturer_email,
                'lecturer_address' => $request->lecturer_address,
                'lecturer_numeber' => $request->lecturer_numeber,
                'username' => $request->username,
            ]);

        if (isset($request->password)) {
            tbl_lecturer::where('lecturer_id', $request->lecturer_id)
                ->update([
                    'password' => Hash::make($request->password),
                ]);
        }
        return redirect()->back()->with('success', 'แก้ไขข้อมูลเรียบร้อย');
    }
}
