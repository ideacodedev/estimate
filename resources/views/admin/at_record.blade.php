@extends('layout.app')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">หน้าหลัก /</span> ประวัติการประเมิน
    </h4>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('at_record/search') }}" method="get">
                <div class="row">
                    <div class="col-md-2">
                        <div class="col mb-3">
                            <label class="form-label">วันที่เริ่มต้น (วันที่ประเมิน)</label>
                            <input type="date" class="form-control" name="start" value="{{ $start ?? '' }}" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="col mb-3">
                            <label class="form-label">วันที่สิ้นสุด (วันที่ประเมิน)</label>
                            <input type="date" class="form-control" name="end" value="{{ $end ?? '' }}" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="col mb-3">
                            <label class="form-label">ปีการศึกษา</label>
                            <input type="number" class="form-control" name="at_year" value="{{ $at_year ?? '' }}" placeholder="ปีการศึกษา" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="col mb-3">
                            <label class="form-label">เทอม</label>
                            <input type="number" class="form-control" name="at_tarm" value="{{ $at_tarm ?? '' }}" placeholder="เทอม" />
                        </div>
                    </div>
                    <div class="col-md-1 d-flex">
                        <div class="col mb-3">
                            <label class="form-label">ค้นหา</label><br>
                            <button type="submit" class="btn btn-success">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                        &nbsp;
                        <div class="col mb-3">
                            <label class="form-label">รีเซ็ต</label><br>
                            <a href="{{ route('at_record') }}" class="btn btn-warning">
                                <i class="fa-solid fa-rotate-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered table-hover data-table" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th>ผู้ประเมิน</th>
                            <th>ข้อมูลการประเมิน</th>
                            <th>วันที่ประเมิน</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php($i = 1)
                        @foreach ($at as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    @if ($item->at_role == 1)
                                        <span class="badge bg-secondary">นักศึกษา</span>
                                        <br>
                                        รหัสนักศึกษา: {{ $item->student?->student_code }} <br>
                                        ชื่อ-สกุล: {{ $item->student?->student_firstname }} <br>
                                    @elseif ($item->at_role == 2)
                                        <span class="badge bg-success">อาจารย์</span>
                                        <br>
                                        ชื่อ-สกุล: {{ $item->lecturer?->lecturer_firstname }} <br>
                                    @endif
                                </td>
                                <td>
                                    ชื่อห้อง: {{ $item->room?->room_name }} <br>
                                    อาคาร: <span
                                        class="badge bg-warning">{{ $item->room?->building?->building_name }} (ชั้น: {{ $item->room?->room_floor }})</span>
                                    <br> ปีการศึกษา: {{ $item->at_tarm }}/{{ $item->at_year }}
                                </td>
                                <td>{{ created_at($item->created_at) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
