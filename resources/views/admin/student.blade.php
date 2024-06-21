@extends('layout.app')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">หน้าหลัก /</span> ข้อมูลนักศึกษา
    </h4>
    <div class="card mb-4">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_form">
                เพิ่มข้อมูลนักศึกษา
            </button>
            <div class="modal fade" id="add_form" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('add_student') }}" method="post">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel3">เพิ่มข้อมูลนักศึกษา</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col mb-3">
                                    <label class="form-label">รหัสนักศึกษา</label>
                                    <input type="text" class="form-control" required name="student_code"
                                        placeholder="กรุณากรอก::รหัสนักศึกษา" />
                                </div>
                                <div class="col mb-3">
                                    <label class="form-label">ชื่อ-สกุล</label>
                                    <input type="text" class="form-control" required name="student_firstname"
                                        placeholder="กรุณากรอก::ชื่อ-สกุล" />
                                </div>
                                <div class="col mb-3">
                                    <label class="form-label">E-mail</label>
                                    <input type="email" class="form-control" required name="student_email"
                                        placeholder="กรุณากรอก::E-mail" />
                                </div>
                                <div class="col mb-3">
                                    <label class="form-label">ที่อยู่</label>
                                    <input type="text" class="form-control" required name="student_address"
                                        placeholder="กรุณากรอก::ที่อยู่" />
                                </div>
                                <div class="col mb-3">
                                    <label class="form-label">เบอร์โทรศัพท์</label>
                                    <input type="text" class="form-control" required name="student_numeber"
                                        placeholder="กรุณากรอก::เบอร์โทรศัพท์" />
                                </div>
                                <div class="col mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" required name="username"
                                        placeholder="กรุณากรอก::Username" />
                                </div>
                                <div class="col mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" required name="password"
                                        placeholder="กรุณากรอก::password" />
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#upload_form">
                อัพโหลดข้อมูลนักศึกษา
            </button>
            <div class="modal fade" id="upload_form" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('up_student') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel3">อัพโหลดข้อมูลนักศึกษา</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col mb-3">
                                    <label class="form-label">ไฟล์อัพโหลดข้อมูลนักศึกษา</label>
                                    <input type="file" class="form-control" required name="file"
                                        placeholder="กรุณากรอก::ไฟล์อัพโหลดข้อมูลนักศึกษา" />
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
            <a href="{{ asset('resources/file/รายชื่อนักศึกษา.xlsx') }}" class="btn btn-warning">ตัวอย่างไฟล์อัพโหลด</a>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered table-hover data-table" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th>จัดการ</th>
                            <th style="text-align: left">รหัสนักศึกษา</th>
                            <th>ชื่อ-สกุล</th>
                            <th>E-mail</th>
                            <th>ที่อยู่</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>Username</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php($i = 1)
                        @foreach ($student as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <a data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" title=""
                                        data-bs-original-title="<span>แก้ไขข้อมูล</span>">
                                        <button type="button" class="btn rounded-pill btn-icon btn-warning text-white"
                                            data-bs-toggle="modal" data-bs-target="#edit_form{{ $item->student_id }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </a>
                                    <a href="{{ url('del_student/' . base64_encode($item->student_id)) }}"
                                        class="btn rounded-pill btn-icon btn-danger text-white delete"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" title=""
                                        data-bs-original-title="<span>ลบข้อมูล</span>">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                    <div class="modal fade" id="edit_form{{ $item->student_id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('edit_student') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="student_id"
                                                        value="{{ $item->student_id }}">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel3">
                                                            แก้ไขข้อมูลนักศึกษา
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col mb-3">
                                                            <label class="form-label">รหัสนักศึกษา</label>
                                                            <input type="text" class="form-control" required
                                                                name="student_code" value="{{ $item->student_code }}"
                                                                placeholder="กรุณากรอก::รหัสนักศึกษา" />
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label class="form-label">ชื่อ-สกุล</label>
                                                            <input type="text" class="form-control" required
                                                                name="student_firstname"
                                                                value="{{ $item->student_firstname }}"
                                                                placeholder="กรุณากรอก::ชื่อ-สกุล" />
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label class="form-label">E-mail</label>
                                                            <input type="email" class="form-control" required
                                                                value="{{ $item->student_email }}" name="student_email"
                                                                placeholder="กรุณากรอก::E-mail" />
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label class="form-label">ที่อยู่</label>
                                                            <input type="text" class="form-control" required
                                                                name="student_address"
                                                                value="{{ $item->student_address }}"
                                                                placeholder="กรุณากรอก::ที่อยู่" />
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label class="form-label">เบอร์โทรศัพท์</label>
                                                            <input type="text" class="form-control" required
                                                                name="student_numeber"
                                                                value="{{ $item->student_numeber }}"
                                                                placeholder="กรุณากรอก::เบอร์โทรศัพท์" />
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label class="form-label">Username</label>
                                                            <input type="text" class="form-control" required
                                                                value="{{ $item->username }}" name="username"
                                                                placeholder="กรุณากรอก::Username" />
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label class="form-label">Password</label>
                                                            <input type="password" class="form-control" value=""
                                                                name="password" placeholder="กรุณากรอก::password" />
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">
                                                            ปิด
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">บันทึก</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td style="text-align: left">{{ $item->student_code }}</td>
                                <td>{{ $item->student_firstname }}</td>
                                <td>{{ $item->student_email }}</td>
                                <td>{{ $item->student_address }}</td>
                                <td>{{ $item->student_numeber }}</td>
                                <td>{{ $item->username }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
