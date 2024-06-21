@extends('layout.app')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">หน้าหลัก / ข้อมูลเจ้าหน้าที่ /</span> แก้ไขข้อมูลเจ้าหน้าที่
    </h4>
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{ route('officer') }}" class="btn btn-warning">
                ย้อนกลับ
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('edit_officer') }}" method="post">
                @csrf
                <input type="hidden" name="officer_id" value="{{ $item->officer_id }}">
                <h5 class="modal-title" id="exampleModalLabel3">แก้ไขข้อมูลเจ้าหน้าที่</h5>
                <hr>
                <div class="col mb-3">
                    <label class="form-label">ชื่อ-สกุล</label>
                    <input type="text" class="form-control" required name="officer_firstname"
                        value="{{ $item->officer_firstname }}" placeholder="กรุณากรอก::ชื่อ-สกุล" />
                </div>
                <div class="col mb-3">
                    <label class="form-label">E-mail</label>
                    <input type="email" class="form-control" required value="{{ $item->officer_email }}"
                        name="officer_email" placeholder="กรุณากรอก::E-mail" />
                </div>
                <div class="col mb-3">
                    <label class="form-label">ที่อยู่</label>
                    <input type="text" class="form-control" required name="officer_address"
                        value="{{ $item->officer_address }}" placeholder="กรุณากรอก::ที่อยู่" />
                </div>
                <div class="col mb-3">
                    <label class="form-label">เบอร์โทรศัพท์</label>
                    <input type="text" class="form-control" required name="officer_number"
                        value="{{ $item->officer_number }}" placeholder="กรุณากรอก::เบอร์โทรศัพท์" />
                </div>
                @php($array = [])
                @foreach ($item->officer_room as $for)
                    @php($array[] = $for->room_id)
                @endforeach
                <div class="col mb-3">
                    <label class="form-label">ห้อง</label>
                    <select name="room_id[]" required class="form-control select2" multiple data-placeholder="เลือก::ห้อง">
                        @foreach ($room as $for)
                            <option value="{{ $for->room_id }}" {{ in_array($for->room_id, $array) ? 'selected' : '' }}>
                                {{ $for->room_name }} (ชั้น {{ $for->room_floor }})<</option>
                        @endforeach
                    </select>
                </div>
                <div class="col mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" required value="{{ $item->username }}" name="username"
                        placeholder="กรุณากรอก::Username" />
                </div>
                <div class="col mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" value="" name="password"
                        placeholder="กรุณากรอก::password" />
                </div>
                <button type="submit" class="btn btn-primary">บันทึก</button>
            </form>
        </div>
    </div>
@endsection
