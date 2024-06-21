<?php

namespace App\Http\Controllers;

use App\Models\tbl_admin;
use App\Models\tbl_at;
use App\Models\tbl_at_title;
use App\Models\tbl_building;
use App\Models\tbl_ed;
use App\Models\tbl_ed_type;
use App\Models\tbl_lecturer;
use App\Models\tbl_officer;
use App\Models\tbl_room;
use App\Models\tbl_student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class viewController extends Controller
{
    public function __construct()
    {
        $this->middleware('isLogin');
    }
    public function report_search(Request $request)
    {
        $chart_1 = new tbl_room();
        if (auth()->guard('officers')->check()) {
            $array = array();
            foreach (auth()->guard('officers')->user()->officer_room as $for) {
                $array[] = $for->room_id;
            }
            $chart_1 = $chart_1->whereIn('room_id', $array);
        }
        $chart_1 = $chart_1->get();

        $count_chart_1 = [];
        foreach ($chart_1 as $for) {
            $for_chart_1 = tbl_at::select('tbl_at.*')
                ->leftjoin('tbl_at_list', 'tbl_at_list.at_id', '=', 'tbl_at.at_id')
                ->leftjoin('tbl_room_ed', 'tbl_room_ed.room_ed_id', '=', 'tbl_at_list.room_ed_id')
                ->where('tbl_at.room_id', $for->room_id)
                ->groupBy('tbl_at.at_id');
            if (isset($request->start)) {
                $for_chart_1 = $for_chart_1->where(DB::raw('DATE_FORMAT(tbl_at.created_at, "%Y-%m-%d")'), '>=', $request->start);
            }
            if (isset($request->end)) {
                $for_chart_1 = $for_chart_1->where(DB::raw('DATE_FORMAT(tbl_at.created_at, "%Y-%m-%d")'), '<=', $request->end);
            }
            if (isset($request->at_year)) {
                $for_chart_1 = $for_chart_1->where('at_year', $request->at_year);
            }
            if (isset($request->at_tarm)) {
                $for_chart_1 = $for_chart_1->where('at_tarm', $request->at_tarm);
            }
            $for_chart_1 = $for_chart_1->get();
            $count_chart_1[] = $for_chart_1->count();
            // -----------------------------------------------------------
        }


        $count_chart_2 = [];
        for ($i = 1; $i <= 2; $i++) {
            $for_chart_2 = tbl_at::select('tbl_at.*')
                ->where('tbl_at.at_role', $i)
                ->groupBy('tbl_at.at_id');
            if (isset($request->start)) {
                $for_chart_2 = $for_chart_2->where(DB::raw('DATE_FORMAT(tbl_at.created_at, "%Y-%m-%d")'), '>=', $request->start);
            }
            if (isset($request->end)) {
                $for_chart_2 = $for_chart_2->where(DB::raw('DATE_FORMAT(tbl_at.created_at, "%Y-%m-%d")'), '<=', $request->end);
            }
            if (isset($request->at_year)) {
                $for_chart_2 = $for_chart_2->where('at_year', $request->at_year);
            }
            if (isset($request->at_tarm)) {
                $for_chart_2 = $for_chart_2->where('at_tarm', $request->at_tarm);
            }
            if (auth()->guard('officers')->check()) {
                $for_chart_2 = $for_chart_2->whereIn('tbl_at.room_id', $array);
            }
            $for_chart_2 = $for_chart_2->get();
            $count_chart_2[] = $for_chart_2->count();
            // -----------------------------------------------------------
        }

        $count_chart_3 = [];
        foreach ($chart_1 as $for) {
            $for_chart_3 = tbl_at::select(DB::raw('SUM(tbl_at_list.at_list_score) as at_list_score'))
                ->leftjoin('tbl_at_list', 'tbl_at_list.at_id', '=', 'tbl_at.at_id')
                ->leftjoin('tbl_room_ed', 'tbl_room_ed.room_ed_id', '=', 'tbl_at_list.room_ed_id')
                ->where('tbl_at.room_id', $for->room_id);
            if (isset($request->start)) {
                $for_chart_3 = $for_chart_3->where(DB::raw('DATE_FORMAT(tbl_at.created_at, "%Y-%m-%d")'), '>=', $request->start);
            }
            if (isset($request->end)) {
                $for_chart_3 = $for_chart_3->where(DB::raw('DATE_FORMAT(tbl_at.created_at, "%Y-%m-%d")'), '<=', $request->end);
            }
            if (isset($request->at_year)) {
                $for_chart_3 = $for_chart_3->where('at_year', $request->at_year);
            }
            if (isset($request->at_tarm)) {
                $for_chart_3 = $for_chart_3->where('at_tarm', $request->at_tarm);
            }
            $for_chart_3 = $for_chart_3->first();
            $count_chart_3[] = $for_chart_3->at_list_score ?? 0;
            // -----------------------------------------------------------
        }

        $count_chart_4_1 = [];
        $count_chart_4_2 = [];
        $count_chart_4_3 = [];
        $count_chart_4_4 = [];
        $count_chart_4_5 = [];
        foreach ($chart_1 as $for) {
            $for_chart_4_1 = tbl_at::select('tbl_at.*')
                ->leftjoin('tbl_at_list', 'tbl_at_list.at_id', '=', 'tbl_at.at_id')
                ->leftjoin('tbl_room_ed', 'tbl_room_ed.room_ed_id', '=', 'tbl_at_list.room_ed_id')
                ->where('tbl_at_list.at_list_score', 1)
                ->where('tbl_at.room_id', $for->room_id);
            if (isset($request->start)) {
                $for_chart_4_1 = $for_chart_4_1->where(DB::raw('DATE_FORMAT(tbl_at.created_at, "%Y-%m-%d")'), '>=', $request->start);
            }
            if (isset($request->end)) {
                $for_chart_4_1 = $for_chart_4_1->where(DB::raw('DATE_FORMAT(tbl_at.created_at, "%Y-%m-%d")'), '<=', $request->end);
            }
            if (isset($request->at_year)) {
                $for_chart_4_1 = $for_chart_4_1->where('at_year', $request->at_year);
            }
            if (isset($request->at_tarm)) {
                $for_chart_4_1 = $for_chart_4_1->where('at_tarm', $request->at_tarm);
            }
            $for_chart_4_1 = $for_chart_4_1->get();
            $count_chart_4_1[] = $for_chart_4_1->count();
            // -----------------------------------------------------------
            $for_chart_4_2 = tbl_at::select('tbl_at.*')
                ->leftjoin('tbl_at_list', 'tbl_at_list.at_id', '=', 'tbl_at.at_id')
                ->leftjoin('tbl_room_ed', 'tbl_room_ed.room_ed_id', '=', 'tbl_at_list.room_ed_id')
                ->where('tbl_at_list.at_list_score', 2)
                ->where('tbl_at.room_id', $for->room_id);
            if (isset($request->start)) {
                $for_chart_4_2 = $for_chart_4_2->where(DB::raw('DATE_FORMAT(tbl_at.created_at, "%Y-%m-%d")'), '>=', $request->start);
            }
            if (isset($request->end)) {
                $for_chart_4_2 = $for_chart_4_2->where(DB::raw('DATE_FORMAT(tbl_at.created_at, "%Y-%m-%d")'), '<=', $request->end);
            }
            if (isset($request->at_year)) {
                $for_chart_4_2 = $for_chart_4_2->where('at_year', $request->at_year);
            }
            if (isset($request->at_tarm)) {
                $for_chart_4_2 = $for_chart_4_2->where('at_tarm', $request->at_tarm);
            }
            $for_chart_4_2 = $for_chart_4_2->get();
            $count_chart_4_2[] = $for_chart_4_2->count();
            // -----------------------------------------------------------
            $for_chart_4_3 = tbl_at::select('tbl_at.*')
                ->leftjoin('tbl_at_list', 'tbl_at_list.at_id', '=', 'tbl_at.at_id')
                ->leftjoin('tbl_room_ed', 'tbl_room_ed.room_ed_id', '=', 'tbl_at_list.room_ed_id')
                ->where('tbl_at_list.at_list_score', 3)
                ->where('tbl_at.room_id', $for->room_id);
            if (isset($request->start)) {
                $for_chart_4_3 = $for_chart_4_3->where(DB::raw('DATE_FORMAT(tbl_at.created_at, "%Y-%m-%d")'), '>=', $request->start);
            }
            if (isset($request->end)) {
                $for_chart_4_3 = $for_chart_4_3->where(DB::raw('DATE_FORMAT(tbl_at.created_at, "%Y-%m-%d")'), '<=', $request->end);
            }
            if (isset($request->at_year)) {
                $for_chart_4_3 = $for_chart_4_3->where('at_year', $request->at_year);
            }
            if (isset($request->at_tarm)) {
                $for_chart_4_3 = $for_chart_4_3->where('at_tarm', $request->at_tarm);
            }
            $for_chart_4_3 = $for_chart_4_3->get();
            $count_chart_4_3[] = $for_chart_4_3->count();
            // -----------------------------------------------------------
            $for_chart_4_4 = tbl_at::select('tbl_at.*')
                ->leftjoin('tbl_at_list', 'tbl_at_list.at_id', '=', 'tbl_at.at_id')
                ->leftjoin('tbl_room_ed', 'tbl_room_ed.room_ed_id', '=', 'tbl_at_list.room_ed_id')
                ->where('tbl_at_list.at_list_score', 4)
                ->where('tbl_at.room_id', $for->room_id);
            if (isset($request->start)) {
                $for_chart_4_4 = $for_chart_4_4->where(DB::raw('DATE_FORMAT(tbl_at.created_at, "%Y-%m-%d")'), '>=', $request->start);
            }
            if (isset($request->end)) {
                $for_chart_4_4 = $for_chart_4_4->where(DB::raw('DATE_FORMAT(tbl_at.created_at, "%Y-%m-%d")'), '<=', $request->end);
            }
            if (isset($request->at_year)) {
                $for_chart_4_4 = $for_chart_4_4->where('at_year', $request->at_year);
            }
            if (isset($request->at_tarm)) {
                $for_chart_4_4 = $for_chart_4_4->where('at_tarm', $request->at_tarm);
            }
            $for_chart_4_4 = $for_chart_4_4->get();
            $count_chart_4_4[] = $for_chart_4_4->count();
            // -----------------------------------------------------------
            $for_chart_4_5 = tbl_at::select('tbl_at.*')
                ->leftjoin('tbl_at_list', 'tbl_at_list.at_id', '=', 'tbl_at.at_id')
                ->leftjoin('tbl_room_ed', 'tbl_room_ed.room_ed_id', '=', 'tbl_at_list.room_ed_id')
                ->where('tbl_at_list.at_list_score', 5)
                ->where('tbl_at.room_id', $for->room_id);
            if (isset($request->start)) {
                $for_chart_4_5 = $for_chart_4_5->where(DB::raw('DATE_FORMAT(tbl_at.created_at, "%Y-%m-%d")'), '>=', $request->start);
            }
            if (isset($request->end)) {
                $for_chart_4_5 = $for_chart_4_5->where(DB::raw('DATE_FORMAT(tbl_at.created_at, "%Y-%m-%d")'), '<=', $request->end);
            }
            if (isset($request->at_year)) {
                $for_chart_4_5 = $for_chart_4_5->where('at_year', $request->at_year);
            }
            if (isset($request->at_tarm)) {
                $for_chart_4_5 = $for_chart_4_5->where('at_tarm', $request->at_tarm);
            }
            $for_chart_4_5 = $for_chart_4_5->get();
            $count_chart_4_5[] = $for_chart_4_5->count();
        }

        return view('admin.report', [
            'chart_1' => $chart_1,
            'count_chart_1' => $count_chart_1,

            'start' => $request->start ?? '',
            'end' => $request->end ?? '',
            'at_year' => $request->at_year ?? '',
            'at_tarm' => $request->at_tarm ?? '',

            'count_chart_2' => $count_chart_2,
            'count_chart_3' => $count_chart_3,
            'count_chart_4_1' => $count_chart_4_1,
            'count_chart_4_2' => $count_chart_4_2,
            'count_chart_4_3' => $count_chart_4_3,
            'count_chart_4_4' => $count_chart_4_4,
            'count_chart_4_5' => $count_chart_4_5,

        ]);
    }
    public function report()
    {
        $chart_1 = new tbl_room();
        if (auth()->guard('officers')->check()) {
            $array = array();
            foreach (auth()->guard('officers')->user()->officer_room as $for) {
                $array[] = $for->room_id;
            }
            $chart_1 = $chart_1->whereIn('room_id', $array);
        }
        $chart_1 = $chart_1->get();

        $count_chart_1 = [];
        foreach ($chart_1 as $for) {
            $for_chart_1 = tbl_at::select('tbl_at.*')
                ->leftjoin('tbl_at_list', 'tbl_at_list.at_id', '=', 'tbl_at.at_id')
                ->leftjoin('tbl_room_ed', 'tbl_room_ed.room_ed_id', '=', 'tbl_at_list.room_ed_id')
                ->where('tbl_room_ed.room_id', $for->room_id)
                ->groupBy('tbl_at.at_id')
                ->get();
            $count_chart_1[] = $for_chart_1->count();
            // -----------------------------------------------------------
        }


        $count_chart_2 = [];
        for ($i = 1; $i <= 2; $i++) {
            $for_chart_2 = tbl_at::select('tbl_at.*')
                ->leftjoin('tbl_at_list', 'tbl_at_list.at_id', '=', 'tbl_at.at_id');
            if (auth()->guard('officers')->check()) {
                $for_chart_2 = $for_chart_2->whereIn('tbl_at.room_id', $array);
            }
            $for_chart_2 = $for_chart_2->where('tbl_at.at_role', $i)
                ->groupBy('tbl_at.at_id')
                ->get();
            $count_chart_2[] = $for_chart_2->count();
            // -----------------------------------------------------------
        }

        $count_chart_3 = [];
        foreach ($chart_1 as $for) {
            $for_chart_3 = tbl_at::select(DB::raw('SUM(tbl_at_list.at_list_score) as at_list_score'))
                ->leftjoin('tbl_at_list', 'tbl_at_list.at_id', '=', 'tbl_at.at_id')
                ->leftjoin('tbl_room_ed', 'tbl_room_ed.room_ed_id', '=', 'tbl_at_list.room_ed_id')
                ->where('tbl_at.room_id', $for->room_id)
                ->first();
            $count_chart_3[] = $for_chart_3->at_list_score ?? 0;
            // -----------------------------------------------------------
        }

        $count_chart_4_1 = [];
        $count_chart_4_2 = [];
        $count_chart_4_3 = [];
        $count_chart_4_4 = [];
        $count_chart_4_5 = [];
        foreach ($chart_1 as $for) {
            $for_chart_4_1 = tbl_at::select('tbl_at.*')
                ->leftjoin('tbl_at_list', 'tbl_at_list.at_id', '=', 'tbl_at.at_id')
                ->leftjoin('tbl_room_ed', 'tbl_room_ed.room_ed_id', '=', 'tbl_at_list.room_ed_id')
                ->where('tbl_at_list.at_list_score', 1)
                ->where('tbl_at.room_id', $for->room_id)
                ->get();
            $count_chart_4_1[] = $for_chart_4_1->count();
            // -----------------------------------------------------------
            $for_chart_4_2 = tbl_at::select('tbl_at.*')
                ->leftjoin('tbl_at_list', 'tbl_at_list.at_id', '=', 'tbl_at.at_id')
                ->leftjoin('tbl_room_ed', 'tbl_room_ed.room_ed_id', '=', 'tbl_at_list.room_ed_id')
                ->where('tbl_at_list.at_list_score', 2)
                ->where('tbl_at.room_id', $for->room_id)
                ->get();
            $count_chart_4_2[] = $for_chart_4_2->count();
            // -----------------------------------------------------------
            $for_chart_4_3 = tbl_at::select('tbl_at.*')
                ->leftjoin('tbl_at_list', 'tbl_at_list.at_id', '=', 'tbl_at.at_id')
                ->leftjoin('tbl_room_ed', 'tbl_room_ed.room_ed_id', '=', 'tbl_at_list.room_ed_id')
                ->where('tbl_at_list.at_list_score', 3)
                ->where('tbl_at.room_id', $for->room_id)
                ->get();
            $count_chart_4_3[] = $for_chart_4_3->count();
            // -----------------------------------------------------------
            $for_chart_4_4 = tbl_at::select('tbl_at.*')
                ->leftjoin('tbl_at_list', 'tbl_at_list.at_id', '=', 'tbl_at.at_id')
                ->leftjoin('tbl_room_ed', 'tbl_room_ed.room_ed_id', '=', 'tbl_at_list.room_ed_id')
                ->where('tbl_at_list.at_list_score', 4)
                ->where('tbl_at.room_id', $for->room_id)
                ->get();
            $count_chart_4_4[] = $for_chart_4_4->count();
            // -----------------------------------------------------------
            $for_chart_4_5 = tbl_at::select('tbl_at.*')
                ->leftjoin('tbl_at_list', 'tbl_at_list.at_id', '=', 'tbl_at.at_id')
                ->leftjoin('tbl_room_ed', 'tbl_room_ed.room_ed_id', '=', 'tbl_at_list.room_ed_id')
                ->where('tbl_at_list.at_list_score', 5)
                ->where('tbl_at.room_id', $for->room_id)
                ->get();
            $count_chart_4_5[] = $for_chart_4_5->count();
        }

        return view('admin.report', [
            'chart_1' => $chart_1,
            'count_chart_1' => $count_chart_1,

            'count_chart_2' => $count_chart_2,
            'count_chart_3' => $count_chart_3,
            'count_chart_4_1' => $count_chart_4_1,
            'count_chart_4_2' => $count_chart_4_2,
            'count_chart_4_3' => $count_chart_4_3,
            'count_chart_4_4' => $count_chart_4_4,
            'count_chart_4_5' => $count_chart_4_5,

        ]);
    }
    public function officer_edit($id)
    {
        $officer_id = base64_decode($id);
        $item = tbl_officer::where('officer_id', $officer_id)->first();
        $room = tbl_room::all();
        return view('admin.officer_edit', [
            'room' => $room,
            'item' => $item,
        ]);
    }
    public function officer_add()
    {
        $room = tbl_room::all();
        return view('admin.officer_add', [
            'room' => $room,
        ]);
    }
    public function at_view($id)
    {
        $id = base64_decode($id);
        $at_fetch = tbl_at::select('tbl_at.*', DB::raw('COUNT(at_id) as count'), DB::raw('SUM(at_list_score) as sum'))
            ->where('at_id', $id)->first();

        $at_title = tbl_at_title::first();
        $room = tbl_room::where('room_id', $at_fetch->room_ed?->room_id)->first();


        $at_list_score = array();
        $at_list_note = array();
        foreach ($room->room_ed as $for) {
            $at = tbl_at::where('room_ed_id', $for->room_ed_id)->first();
            $at_list_score[] = $at->at_list_score;
            $at_list_note[] = $at->at_list_note;
        }

        return view('admin.at_view', [
            'at_title' => $at_title,
            'room' => $room,
            'at' => $at,
            'at_fetch' => $at_fetch,

            'at_list_score' => $at_list_score,
            'at_list_note' => $at_list_note,
        ]);
    }
    public function at_record_search(Request $request)
    {
        $at = tbl_at::select('tbl_at.*', DB::raw('COUNT(tbl_at.at_id) as count'), DB::raw('SUM(at_list_score) as sum'))
            ->leftJoin('tbl_at_list', 'tbl_at.at_id', '=', 'tbl_at_list.at_id')
            ->leftJoin('tbl_room_ed', 'tbl_at_list.room_ed_id', '=', 'tbl_room_ed.room_ed_id');

        if (isset($request->start)) {
            $at = $at->where(DB::raw('DATE_FORMAT(tbl_at.created_at, "%Y-%m-%d")'), '>=', $request->start);
        }
        if (isset($request->end)) {
            $at = $at->where(DB::raw('DATE_FORMAT(tbl_at.created_at, "%Y-%m-%d")'), '<=', $request->end);
        }
        if (isset($request->at_year)) {
            $at = $at->where('at_year', 'LIKE', '%' . $request->at_year . '%');
        }
        if (isset($request->at_tarm)) {
            $at = $at->where('at_tarm', 'LIKE', '%' . $request->at_tarm . '%');
        }

        if (auth()->guard('students')->check()) {
            $at = $at->where('user_id', auth()->guard('students')->user()->student_id)
                ->where('at_role', 1);
        } elseif (auth()->guard('lecs')->check()) {
            $at = $at->where('user_id', auth()->guard('lecs')->user()->lecturer_id)
                ->where('at_role', 2);
        } elseif (auth()->guard('officers')->check()) {
            $array = array();
            foreach (auth()->guard('officers')->user()->officer_room as $for) {
                $array[] = $for->room_id;
            }
            $at = $at->whereIn('tbl_room_ed.room_id', $array);
        }

        $at = $at->groupBy('tbl_at.at_id')
            ->orderBy('tbl_at.at_id', 'DESC')
            ->get();
        return view('admin.at_record', [
            'at' => $at,
            'start' => $request->start ?? '',
            'end' => $request->end ?? '',
            'at_year' => $request->at_year ?? '',
            'at_tarm' => $request->at_tarm ?? '',
        ]);
    }
    public function at_record()
    {
        $at = tbl_at::select('tbl_at.*')
            ->leftJoin('tbl_at_list', 'tbl_at.at_id', '=', 'tbl_at_list.at_id')
            ->leftJoin('tbl_room_ed', 'tbl_at_list.room_ed_id', '=', 'tbl_room_ed.room_ed_id');

        if (auth()->guard('students')->check()) {
            $at = $at->where('user_id', auth()->guard('students')->user()->student_id)
                ->where('at_role', 1);
        } elseif (auth()->guard('lecs')->check()) {
            $at = $at->where('user_id', auth()->guard('lecs')->user()->lecturer_id)
                ->where('at_role', 2);
        } elseif (auth()->guard('officers')->check()) {
            $array = array();
            foreach (auth()->guard('officers')->user()->officer_room as $for) {
                $array[] = $for->room_id;
            }
            $at = $at->whereIn('tbl_room_ed.room_id', $array);
        }

        $at = $at->groupBy('tbl_at.at_id')->get();
        return view('admin.at_record', [
            'at' => $at,
        ]);
    }
    public function at_form($id)
    {
        $id = base64_decode($id);
        $room = tbl_room::where('room_id', $id)->first();
        $at_title = tbl_at_title::first();
        return view('admin.at_form', [
            'at_title' => $at_title,
            'room' => $room,
        ]);
    }
    public function at()
    {
        $room = tbl_room::all();
        return view('admin.at', [
            'room' => $room,
        ]);
    }
    public function at_title()
    {
        $at_title = tbl_at_title::where('at_title_id', 1)->first();
        return view('admin.at_title', [
            'at_title' => $at_title,
        ]);
    }
    public function room_edit($id)
    {
        $room_id = base64_decode($id);
        $room = tbl_room::where('room_id', $room_id)->first();
        $building = tbl_building::all();
        $ed = tbl_ed::all();
        return view('admin.room_edit', [
            'building' => $building,
            'ed' => $ed,
            'room' => $room,
        ]);
    }
    public function room_add()
    {
        $building = tbl_building::all();
        $ed = tbl_ed::all();
        return view('admin.room_add', [
            'building' => $building,
            'ed' => $ed,
        ]);
    }
    public function room()
    {
        $room = tbl_room::all();
        return view('admin.room', [
            'room' => $room,
        ]);
    }
    public function ed()
    {
        $ed = tbl_ed::all();
        $ed_type = tbl_ed_type::all();
        return view('admin.ed', [
            'ed' => $ed,
            'ed_type' => $ed_type,
        ]);
    }
    public function ed_type()
    {
        $ed_type = tbl_ed_type::all();
        return view('admin.ed_type', [
            'ed_type' => $ed_type,
        ]);
    }
    public function building()
    {
        $building = tbl_building::all();
        return view('admin.building', [
            'building' => $building,
        ]);
    }
    public function officer()
    {
        $officer = tbl_officer::all();
        return view('admin.officer', [
            'officer' => $officer,
        ]);
    }
    public function student()
    {
        $student = tbl_student::all();
        return view('admin.student', [
            'student' => $student,
        ]);
    }
    public function lecturer()
    {
        $lecturer = tbl_lecturer::all();
        return view('admin.lecturer', [
            'lecturer' => $lecturer,
        ]);
    }
    public function index()
    {
        $at = tbl_at::select('tbl_at.*')
            ->leftJoin('tbl_at_list', 'tbl_at.at_id', '=', 'tbl_at_list.at_id')
            ->leftJoin('tbl_room_ed', 'tbl_at_list.room_ed_id', '=', 'tbl_room_ed.room_ed_id');

        if (auth()->guard('officers')->check()) {
            $array = array();
            foreach (auth()->guard('officers')->user()?->officer_room as $for) {
                $array[] = $for->room_id;
            }
            $at = $at->whereIn('tbl_room_ed.room_id', $array);
        }
        $at = $at->groupBy('tbl_at.at_id')->get()
            ->count();

        $room = tbl_room::count();
        $building = tbl_building::count();
        $ed = tbl_ed::count();
        $ed_type = tbl_ed_type::count();
        return view('admin.index', [
            'at' => $at,
            'room' => $room,
            'building' => $building,
            'ed' => $ed,
            'ed_type' => $ed_type,
        ]);
    }
}
