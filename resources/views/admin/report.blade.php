@extends('layout.app')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">หน้าหลัก /</span> รายงาน
    </h4>
    <div class="row mb-4">
        <div class="col-md-12">
            <form action="{{ url('report/search') }}" method="get">
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
                            <input type="number" class="form-control" name="at_year" value="{{ $at_year ?? '' }}"
                                placeholder="ปีการศึกษา" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="col mb-3">
                            <label class="form-label">เทอม</label>
                            <input type="number" class="form-control" name="at_tarm" value="{{ $at_tarm ?? '' }}"
                                placeholder="เทอม" />
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
                            <a href="{{ route('report') }}" class="btn btn-warning">
                                <i class="fa-solid fa-rotate-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-primary">
                        <u>จำนวนการทำ</u>แบบประเมิน จำแนกตาม ห้องเรียน
                    </h5>
                    <div id="chart_1" style="width: 100%; height: 300px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-primary">
                        <u>จำนวนการทำ</u>แบบประเมิน จำแนกตาม ประเภทผู้ประเมิน
                    </h5>
                    <div id="chart_2" style="width: 100%; height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-primary">
                        <u>จำนวนคะแนน</u>แบบประเมิน จำแนกตาม ห้องเรียน
                    </h5>
                    <div id="chart_3" style="width: 100%; height: 300px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-primary">
                        <u>จำนวนการทำ</u>แบบประเมิน จำแนกตาม ห้องเรียนและระดับคะแนน
                    </h5>
                    <div id="chart_4" style="width: 100%; height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.report_chart')
@endsection
