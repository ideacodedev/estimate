@extends('layout.app')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">หน้าหลัก /</span> ข้อมูลอุปกรณ์อิเล็กทรอนิกส์
    </h4>
    <div class="row">
        <div class="col-xl-12">

            <h6 class="text-muted">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_form">
                    เพิ่มข้อมูลอุปกรณ์อิเล็กทรอนิกส์
                </button>
                <div class="modal fade" id="add_form" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="{{ route('add_ed') }}" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel3">เพิ่มข้อมูลอุปกรณ์อิเล็กทรอนิกส์</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col mb-3">
                                        <label class="form-label">ชื่ออุปกรณ์อิเล็กทรอนิกส์</label>
                                        <input type="text" class="form-control" required name="ed_device"
                                            placeholder="กรุณากรอก::ชื่ออุปกรณ์อิเล็กทรอนิกส์" />
                                    </div>
                                    <div class="col mb-3">
                                        <label class="form-label">ประเภทอุปกรณ์อิเล็กทรอนิกส์</label>
                                        <select name="ed_type_id" required class="form-control">
                                            <option value="" disabled selected>เลือก::ประเภทอุปกรณ์อิเล็กทรอนิกส์
                                            </option>
                                            @foreach ($ed_type as $for)
                                                <option value="{{ $for->ed_type_id }}">{{ $for->ed_type_name }}</option>
                                            @endforeach
                                        </select>
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

            </h6>
            <div class="nav-align-top mb-4">
                <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                    @foreach ($ed_type as $key => $item)
                        <li class="nav-item">
                            <button type="button" class="nav-link {{ $key == 0 ? 'active' : '' }}" role="tab"
                                data-bs-toggle="tab" data-bs-target="#navs-pills-justified-{{ $item->ed_type_id }}"
                                aria-controls="navs-pills-justified-{{ $item->ed_type_id }}" aria-selected="true">
                                <i class="tf-icons bx bx-message-square"></i> ประเภท::{{ $item->ed_type_name }}
                            </button>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach ($ed_type as $key => $for)
                        <div class="tab-pane fade  {{ $key == 0 ? 'active show' : '' }}"
                            id="navs-pills-justified-{{ $for->ed_type_id }}" role="tabpanel">
                            <table class="table table-bordered table-hover" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">#</th>
                                        <th>ชื่ออุปกรณ์อิเล็กทรอนิกส์</th>
                                        <th>ประเภทอุปกรณ์อิเล็กทรอนิกส์</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @php($i = 1)
                                    @foreach ($for->ed as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->ed_device }}</td>
                                            <td>{{ $item->ed_type?->ed_type_name }}</td>
                                            <td>
                                                <a data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                                    data-bs-html="true" title=""
                                                    data-bs-original-title="<span>แก้ไขข้อมูล</span>">
                                                    <button type="button"
                                                        class="btn rounded-pill btn-icon btn-warning text-white"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#edit_form{{ $item->ed_id }}">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ url('del_ed/' . base64_encode($item->ed_id)) }}"
                                                    class="btn rounded-pill btn-icon btn-danger text-white delete"
                                                    data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                                    data-bs-html="true" title=""
                                                    data-bs-original-title="<span>ลบข้อมูล</span>">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                                <div class="modal fade" id="edit_form{{ $item->ed_id }}" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form action="{{ route('edit_ed') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="ed_id"
                                                                    value="{{ $item->ed_id }}">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel3">
                                                                        แก้ไขข้อมูลอุปกรณ์อิเล็กทรอนิกส์
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="col mb-3">
                                                                        <label
                                                                            class="form-label">ชื่ออุปกรณ์อิเล็กทรอนิกส์</label>
                                                                        <input type="text" class="form-control"
                                                                            required name="ed_device"
                                                                            value="{{ $item->ed_device }}"
                                                                            placeholder="กรุณากรอก::ชื่ออุปกรณ์อิเล็กทรอนิกส์" />
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <label
                                                                            class="form-label">ประเภทอุปกรณ์อิเล็กทรอนิกส์</label>
                                                                        <select name="ed_type_id" required
                                                                            class="form-control">
                                                                            <option value="" disabled selected>
                                                                                เลือก::ประเภทอุปกรณ์อิเล็กทรอนิกส์</option>
                                                                            @foreach ($ed_type as $for)
                                                                                <option value="{{ $for->ed_type_id }}"
                                                                                    {{ $for->ed_type_id == $item->ed_type_id ? 'selected' : '' }}>
                                                                                    {{ $for->ed_type_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-outline-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        ปิด
                                                                    </button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">บันทึก</button>
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
