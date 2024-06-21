@extends('layout.app')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">หน้าหลัก /</span> ข้อมูลเจ้าหน้าที่
    </h4>
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{ route('officer_add') }}" class="btn btn-primary">
                เพิ่มข้อมูลเจ้าหน้าที่
            </a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#upload_form">
                อัพโหลดข้อมูลเจ้าหน้าที่
            </button>
            <div class="modal fade" id="upload_form" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('up_officer') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel3">อัพโหลดข้อมูลเจ้าหน้าที่</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col mb-3">
                                    <label class="form-label">ไฟล์อัพโหลดข้อมูลเจ้าหน้าที่</label>
                                    <input type="file" class="form-control" required name="file"
                                        placeholder="กรุณากรอก::ไฟล์อัพโหลดข้อมูลเจ้าหน้าที่" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    ปิด
                                </button>
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <a href="{{ asset('resources/file/รายชื่อเจ้าหน้าที่.xlsx') }}" class="btn btn-warning">ตัวอย่างไฟล์อัพโหลด</a>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered table-hover data-table" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th>จัดการ</th>
                            <th>ชื่อ-สกุล</th>
                            <th>E-mail</th>
                            <th>ที่อยู่</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>ห้อง</th>
                            <th>Username</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php($i = 1)
                        @foreach ($officer as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <a href="{{ url('officer_edit/' . base64_encode($item->officer_id)) }}"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" title="" data-bs-original-title="<span>แก้ไขข้อมูล</span>"
                                        class="btn rounded-pill btn-icon btn-warning text-white">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="{{ url('del_officer/' . base64_encode($item->officer_id)) }}"
                                        class="btn rounded-pill btn-icon btn-danger text-white delete"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" title="" data-bs-original-title="<span>ลบข้อมูล</span>">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                                <td>{{ $item->officer_firstname }}</td>
                                <td>{{ $item->officer_email }}</td>
                                <td>{{ $item->officer_address }}</td>
                                <td>{{ $item->officer_number }}</td>
                                <td>
                                    @foreach ($item->officer_room as $key => $for)
                                        {{ $key > 0 ? ',' : '' }}
                                        {{ $for->room?->room_name }}
                                        (ชั้น {{ $for->room?->room_floor }})
                                    @endforeach
                                </td>
                                <td>{{ $item->username }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
