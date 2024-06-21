@extends('layout.app')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">หน้าหลัก /</span> ข้อมูลประเภทอุปกรณ์อิเล็กทรอนิกส์
    </h4>
    <div class="card mb-4">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_form">
                เพิ่มข้อมูลประเภทอุปกรณ์อิเล็กทรอนิกส์
            </button>
            <div class="modal fade" id="add_form" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('add_ed_type') }}" method="post">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel3">เพิ่มข้อมูลประเภทอุปกรณ์อิเล็กทรอนิกส์</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col mb-3">
                                    <label class="form-label">ชื่อประเภทอุปกรณ์อิเล็กทรอนิกส์</label>
                                    <input type="text" class="form-control" required name="ed_type_name"
                                        placeholder="กรุณากรอก::ชื่อประเภทอุปกรณ์อิเล็กทรอนิกส์" />
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
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered table-hover data-table" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th>ชื่อประเภทอุปกรณ์อิเล็กทรอนิกส์</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php($i = 1)
                        @foreach ($ed_type as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->ed_type_name }}</td>
                                <td>
                                    <a data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" title=""
                                        data-bs-original-title="<span>แก้ไขข้อมูล</span>">
                                        <button type="button" class="btn rounded-pill btn-icon btn-warning text-white"
                                            data-bs-toggle="modal" data-bs-target="#edit_form{{ $item->ed_type_id }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </a>
                                    <a href="{{ url('del_ed_type/' . base64_encode($item->ed_type_id)) }}"
                                        class="btn rounded-pill btn-icon btn-danger text-white delete"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" title="" data-bs-original-title="<span>ลบข้อมูล</span>">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                    <div class="modal fade" id="edit_form{{ $item->ed_type_id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('edit_ed_type') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="ed_type_id" value="{{ $item->ed_type_id }}">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel3">
                                                            แก้ไขข้อมูลประเภทอุปกรณ์อิเล็กทรอนิกส์
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col mb-3">
                                                            <label
                                                                class="form-label">ชื่อประเภทอุปกรณ์อิเล็กทรอนิกส์</label>
                                                            <input type="text" class="form-control" required
                                                                name="ed_type_name" value="{{ $item->ed_type_name }}"
                                                                placeholder="กรุณากรอก::ชื่อประเภทอุปกรณ์อิเล็กทรอนิกส์" />
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
