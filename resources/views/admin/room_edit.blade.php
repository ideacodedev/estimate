@extends('layout.app')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">หน้าหลัก / ข้อมูลห้อง /</span> แก้ไขข้อมูลห้อง
    </h4>
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{ route('room') }}" class="btn btn-warning">
                ย้อนกลับ
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('edit_room') }}" method="post">
                @csrf
                <input type="hidden" name="room_id" value="{{ $room->room_id }}">
                <h5 class="modal-title" id="exampleModalLabel3">แก้ไขข้อมูลห้อง</h5>
                <hr>
                <div class="col mb-3">
                    <label class="form-label">ชื่อห้อง</label>
                    <input type="text" class="form-control" value="{{ $room->room_name }}" required name="room_name"
                        placeholder="กรุณากรอก::ชื่อห้อง" />
                </div>
                <div class="col mb-3">
                    <label class="form-label">อาคาร</label>
                    <select name="building_id" required class="form-control select2">
                        <option value="" disabled selected>--เลือกอาคาร--</option>
                        @foreach ($building as $for)
                            <option value="{{ $for->building_id }}"
                                {{ $room->building_id == $for->building_id ? ' selected="selected"' : '' }}>
                                {{ $for->building_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col mb-3">
                    <label class="form-label">ชั้น</label>
                    <input type="number" value="{{ $room->room_floor }}" class="form-control" required name="room_floor"
                        placeholder="กรุณากรอก::ชั้น" />
                </div>
                @php($array = [])
                @foreach ($room->room_ed as $for)
                    @php($array[] = $for->ed_id)
                @endforeach
                <div class="col mb-3">
                    <label class="form-label">อุปกรณ์อิเล็กทรอนิกส์</label>
                    <select name="ed_id[]" required class="form-control select2" multiple
                        data-placeholder="--เลือกอุปกรณ์อิเล็กทรอนิกส์--">
                        @foreach ($ed as $for)
                            <option value="{{ $for->ed_id }}"
                                {{ in_array($for->ed_id, $array) ? 'selected="selected"' : '' }}>
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
