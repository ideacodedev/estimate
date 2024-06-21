<?php

namespace App\Http\Controllers;

use App\Imports\officerImport;
use App\Imports\stdImport;
use App\Imports\teacherImport;
use App\Models\tbl_at;
use App\Models\tbl_at_list;
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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class addController extends Controller
{
    public function __construct()
    {
        $this->middleware('isLogin');
    }
    public function up_officer(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new officerImport, $file);
        return redirect()->back()->with('success', 'อัพโหลดข้อมูลเรียบร้อย!');
    }
    public function up_lecturer(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new teacherImport, $file);
        return redirect()->back()->with('success', 'อัพโหลดข้อมูลเรียบร้อย!');
    }
    public function up_student(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new stdImport, $file);
        return redirect()->back()->with('success', 'อัพโหลดข้อมูลเรียบร้อย!');
    }
    public function add_at(Request $request)
    {
        $rand = rand() . date('YmdHis');
        $url = 'at';

        $sql = new tbl_at();
        $sql->user_id = auth()->guard('students')->user()->student_id ?? auth()->guard('lecs')->user()->lecturer_id;
        if (auth()->guard('students')->check()) {
            $sql->at_role = 1;
        } elseif (auth()->guard('lecs')->check()) {
            $sql->at_role = 2;
        }
        $sql->room_id = $request->room_id ?? '';
        $sql->at_year = $request->at_year ?? '';
        $sql->at_tarm = $request->at_tarm ?? '';
        $sql->save();

        $first = tbl_at::select(DB::raw('MAX(at_id) as at_id'))->first();

        foreach ($request->room_ed_id as $key => $for) {
            $at_list_score = $request->input("at_list_score" . $for);
            $at_list_note = $request->at_list_note[$key];

            $sql = new tbl_at_list();
            $sql->at_id = $first->at_id ?? '';
            $sql->at_list_score = $at_list_score ?? '';
            $sql->at_list_note = $at_list_note ?? '';
            $sql->room_ed_id = $for ?? '';
            $sql->save();
        }
        return redirect()->route($url)->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }
    public function add_room(Request $request)
    {

        $check = tbl_room::where('room_name', $request->room_name)
            ->where('building_id', $request->building_id)
            ->count();
        if ($check > 0) {
            return redirect()->back()->with('error', 'มีชื่ออาคารและห้องนี้อยู่ในระบบแล้ว');
        }

        $sql = new tbl_room();
        $sql->room_name = $request->room_name;
        $sql->building_id = $request->building_id;
        $sql->room_floor = $request->room_floor;
        $sql->save();
        $room = tbl_room::select(DB::raw('MAX(room_id) as room_id'))->first();
        foreach ($request->ed_id as $for) {
            $sql = new tbl_room_ed();
            $sql->ed_id = $for;
            $sql->room_id = $room->room_id;
            $sql->save();
        }
        return redirect()->route('room')->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }
    public function add_ed(Request $request)
    {
        $request->validate([
            'ed_device' => 'unique:tbl_ed'
        ], [
            'ed_device.unique' => 'มีชื่ออุปกรณ์อิเล็กทรอนิกส์นี้อยู่ในระบบแล้ว'
        ]);

        $sql = new tbl_ed();
        $sql->ed_device = $request->ed_device;
        $sql->ed_type_id = $request->ed_type_id;
        $sql->save();

        return redirect()->back()->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }
    public function add_ed_type(Request $request)
    {
        $request->validate([
            'ed_type_name' => 'unique:tbl_ed_type'
        ], [
            'ed_type_name.unique' => 'มีชื่อประเภทอุปกรณ์อิเล็กทรอนิกส์นี้อยู่ในระบบแล้ว'
        ]);

        $sql = new tbl_ed_type();
        $sql->ed_type_name = $request->ed_type_name;
        $sql->save();

        return redirect()->back()->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }
    public function add_building(Request $request)
    {
        $request->validate([
            'building_name' => 'unique:tbl_building'
        ], [
            'building_name.unique' => 'มีชื่ออาคารนี้อยู่ในระบบแล้ว'
        ]);

        $sql = new tbl_building();
        $sql->building_name = $request->building_name;
        $sql->save();

        return redirect()->back()->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }
    public function add_officer(Request $request)
    {
        $student = tbl_student::where('username', $request->username)->count();
        $lecturer = tbl_lecturer::where('username', $request->username)->count();
        $officer = tbl_officer::where('username', $request->username)->count();
        if ($student > 0 or $lecturer > 0 or $officer > 0) {
            return redirect()->back()->with('error', 'มี Username นี้อยู่ในระบบแล้ว');
        }

        $sql = new tbl_officer();
        $sql->officer_firstname = $request->officer_firstname;
        $sql->officer_address = $request->officer_address;
        $sql->officer_email = $request->officer_email;
        $sql->officer_number = $request->officer_number;
        $sql->username = $request->username;
        $sql->password = Hash::make($request->password);
        $sql->save();

        $officer = tbl_officer::select(DB::raw('MAX(officer_id) as officer_id'))->first();
        foreach ($request->room_id as $for) {
            $sql = new tbl_officer_room();
            $sql->room_id = $for;
            $sql->officer_id = $officer->officer_id;
            $sql->save();
        }

        return redirect()->back()->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }
    public function add_student(Request $request)
    {
        $student = tbl_student::where('username', $request->username)->count();
        $lecturer = tbl_lecturer::where('username', $request->username)->count();
        $officer = tbl_officer::where('username', $request->username)->count();
        if ($student > 0 or $lecturer > 0 or $officer > 0) {
            return redirect()->back()->with('error', 'มี Username นี้อยู่ในระบบแล้ว');
        }

        if (substr($request->student_code, 0, 2) != 40 and substr($request->student_code, 0, 2) != 10) {
            return redirect()->back()->with('error', 'รหัสนักศึกษาไม่ถูกต้อง!');
        }

        $sql = new tbl_student();
        $sql->student_code = $request->student_code;
        $sql->student_firstname = $request->student_firstname;
        $sql->student_email = $request->student_email;
        $sql->student_address = $request->student_address;
        $sql->student_numeber = $request->student_numeber;
        $sql->username = $request->username;
        $sql->password = Hash::make($request->password);
        $sql->save();

        return redirect()->back()->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }
    public function add_lecturer(Request $request)
    {
        $student = tbl_student::where('username', $request->username)->count();
        $lecturer = tbl_lecturer::where('username', $request->username)->count();
        $officer = tbl_officer::where('username', $request->username)->count();
        if ($student > 0 or $lecturer > 0 or $officer > 0) {
            return redirect()->back()->with('error', 'มี Username นี้อยู่ในระบบแล้ว');
        }

        $sql = new tbl_lecturer();
        $sql->lecturer_firstname = $request->lecturer_firstname;
        $sql->lecturer_email = $request->lecturer_email;
        $sql->lecturer_address = $request->lecturer_address;
        $sql->lecturer_numeber = $request->lecturer_numeber;
        $sql->username = $request->username;
        $sql->password = Hash::make($request->password);
        $sql->save();

        return redirect()->back()->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }
}
