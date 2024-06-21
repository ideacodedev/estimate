@extends('layout.app')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">หน้าหลัก /</span> ข้อมูลอาจารย์
    </h4>
    <div class="card mb-4">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_form">
                เพิ่มข้อมูลอาจารย์
            </button>
            <div class="modal fade" id="add_form" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('add_lecturer') }}" method="post">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel3">เพิ่มข้อมูลอาจารย์</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col mb-3">
                                    <label class="form-label">ชื่อ-สกุล</label>
                                    <input type="text" class="form-control" required name="lecturer_firstname"
                                        placeholder="กรุณากรอก::ชื่อ-สกุล" />
                                </div>
                                <div class="col mb-3">
                                    <label class="form-label">E-mail</label>
                                    <input type="email" class="form-control" required name="lecturer_email"
                                        placeholder="กรุณากรอก::E-mail" />
                                </div>
                                <div class="col mb-3">
                                    <label class="form-label">ที่อยู่</label>
                                    <input type="text" class="form-control" required name="lecturer_address"
                                        placeholder="กรุณากรอก::ที่อยู่" />
                                </div>
                                <div class="col mb-3">
                                    <label class="form-label">เบอร์โทรศัพท์</label>
                                    <input type="text" class="form-control" required name="lecturer_numeber"
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
                อัพโหลดข้อมูลอาจารย์
            </button>
            <div class="modal fade" id="upload_form" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('up_lecturer') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel3">อัพโหลดข้อมูลอาจารย์</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col mb-3">
                                    <label class="form-label">ไฟล์อัพโหลดข้อมูลอาจารย์</label>
                                    <input type="file" class="form-control" required name="file"
                                        placeholder="กรุณากรอก::ไฟล์อัพโหลดข้อมูลอาจารย์" />
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
            <a href="{{ asset('resources/file/รายชื่ออาจารย์.xlsx') }}" class="btn btn-warning">ตัวอย่างไฟล์อัพโหลด</a>
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
                            <th>Username</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php($i = 1)
                        @foreach ($lecturer as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <a data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" title=""
                                        data-bs-original-title="<span>แก้ไขข้อมูล</span>">
                                        <button type="button" class="btn rounded-pill btn-icon btn-warning text-white"
                                            data-bs-toggle="modal" data-bs-target="#edit_form{{ $item->lecturer_id }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </a>
                                    <a href="{{ url('del_lecturer/' . base64_encode($item->lecturer_id)) }}"
                                        class="btn rounded-pill btn-icon btn-danger text-white delete"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" title=""
                                        data-bs-original-title="<span>ลบข้อมูล</span>">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                    <div class="modal fade" id="edit_form{{ $item->lecturer_id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('edit_lecturer') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="lecturer_id"
                                                        value="{{ $item->lecturer_id }}">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel3">แก้ไขข้อมูลอาจารย์
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col mb-3">
                                                            <label class="form-label">ชื่อ-สกุล</label>
                                                            <input type="text" class="form-control" required
                                                                name="lecturer_firstname"
                                                                value="{{ $item->lecturer_firstname }}"
                                                                placeholder="กรุณากรอก::ชื่อ-สกุล" />
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label class="form-label">E-mail</label>
                                                            <input type="email" class="form-control" required
                                                                value="{{ $item->lecturer_email }}" name="lecturer_email"
                                                                placeholder="กรุณากรอก::E-mail" />
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label class="form-label">ที่อยู่</label>
                                                            <input type="text" class="form-control" required
                                                                name="lecturer_address"
                                                                value="{{ $item->lecturer_address }}"
                                                                placeholder="กรุณากรอก::ที่อยู่" />
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label class="form-label">เบอร์โทรศัพท์</label>
                                                            <input type="text" class="form-control" required
                                                                name="lecturer_numeber"
                                                                value="{{ $item->lecturer_numeber }}"
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
                                <td>{{ $item->lecturer_firstname }}</td>
                                <td>{{ $item->lecturer_email }}</td>
                                <td>{{ $item->lecturer_address }}</td>
                                <td>{{ $item->lecturer_numeber }}</td>
                                <td>{{ $item->username }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
