@extends('layout.app')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">หน้าหลัก / ข้อมูลห้อง /</span> เพิ่มข้อมูลห้อง
    </h4>
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{ route('room') }}" class="btn btn-warning">
                ย้อนกลับ
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('add_room') }}" method="post">
                @csrf
                <h5 class="modal-title" id="exampleModalLabel3">เพิ่มข้อมูลห้อง</h5>
                <hr>
                <div class="col mb-3">
                    <label class="form-label">ชื่อห้อง</label>
                    <input type="text" class="form-control" required name="room_name"
                        placeholder="กรุณากรอก::ชื่อห้อง" />
                </div>
                <div class="col mb-3">
                    <label class="form-label">อาคาร</label>
                    <select name="building_id" required class="form-control select2">
                        <option value="" disabled selected>--เลือกอาคาร--</option>
                        @foreach ($building as $for)
                            <option value="{{ $for->building_id }}">
                                {{ $for->building_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col mb-3">
                    <label class="form-label">ชั้น</label>
                    <input type="number" class="form-control" required name="room_floor"
                        placeholder="กรุณากรอก::ชั้น" />
                </div>
                <div class="col mb-3">
                    <label class="form-label">อุปกรณ์อิเล็กทรอนิกส์</label>
                    <select name="ed_id[]" required class="form-control select2" multiple data-placeholder="--เลือกอุปกรณ์อิเล็กทรอนิกส์--">
                        @foreach ($ed as $for)
                            <option value="{{ $for->ed_id }}">
                                {{ $for->ed_device }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">บันทึก</button>
            </form>
        </div>
    </div>
@endsection
