<?php

namespace App\Http\Controllers;

use App\Models\tbl_at;
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

class delController extends Controller
{
    public function __construct()
    {
        $this->middleware('isLogin');
    }
    public function del_at($id)
    {
        $id = base64_decode($id);
        tbl_at::where('	at_id',$id)->delete();
        return redirect()->back()->with('success','ลบข้อมูลเรียบร้อย');
    }
    public function del_room($id)
    {
        $id = base64_decode($id);
        tbl_room_ed::where('room_id', $id)->delete();
        tbl_room::where('room_id',$id)->delete();
        return redirect()->back()->with('success','ลบข้อมูลเรียบร้อย');
    }
    public function del_ed_type($id)
    {
        $id = base64_decode($id);
        tbl_ed_type::where('ed_type_id',$id)->delete();
        return redirect()->back()->with('success','ลบข้อมูลเรียบร้อย');
    }
    public function del_ed($id)
    {
        $id = base64_decode($id);
        tbl_ed::where('ed_id',$id)->delete();
        return redirect()->back()->with('success','ลบข้อมูลเรียบร้อย');
    }
    public function del_building($id)
    {
        $id = base64_decode($id);
        tbl_building::where('building_id',$id)->delete();
        return redirect()->back()->with('success','ลบข้อมูลเรียบร้อย');
    }
    public function del_officer($id)
    {
        $id = base64_decode($id);
        tbl_officer_room::where('officer_id',$id)->delete();
        tbl_officer::where('officer_id',$id)->delete();
        return redirect()->back()->with('success','ลบข้อมูลเรียบร้อย');
    }
    public function del_student($id)
    {
        $student_id = base64_decode($id);
        tbl_student::where('student_id',$student_id)->delete();
        return redirect()->back()->with('success','ลบข้อมูลเรียบร้อย');
    }
    public function del_lecturer($id)
    {
        $lecturer_id = base64_decode($id);
        tbl_lecturer::where('lecturer_id',$lecturer_id)->delete();
        return redirect()->back()->with('success','ลบข้อมูลเรียบร้อย');
    }
}
