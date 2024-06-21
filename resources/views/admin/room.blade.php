@extends('layout.app')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">หน้าหลัก /</span> ข้อมูลห้อง
    </h4>
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{ route('room_add') }}" class="btn btn-primary">
                เพิ่มข้อมูลห้อง
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered table-hover data-table" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="text-align: left">ชื่อห้อง</th>
                            <th>อาคาร</th>
                            <th>ชั้น</th>
                            <th>อุปกรณ์อิเล็กทรอนิกส์</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php($i = 1)
                        @foreach ($room as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td style="text-align: left">{{ $item->room_name }}</td>
                                <td style="text-align: left">{{ $item->building?->building_name }}</td>
                                <td style="text-align: left">{{ $item->room_floor }}</td>
                                <td>
                                    @foreach ($item->room_ed as $key => $for)
                                        {{ $key > 0 ? ',' : '' }}
                                        {{ $for->ed?->ed_device }}
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ url('room_edit/' . base64_encode($item->room_id)) }}" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                        data-bs-placement="top" data-bs-html="true" title=""
                                        data-bs-original-title="<span>แก้ไขข้อมูล</span>"
                                        class="btn rounded-pill btn-icon btn-warning text-white">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="{{ url('del_room/' . base64_encode($item->room_id)) }}"
                                        class="btn rounded-pill btn-icon btn-danger text-white delete"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" title="" data-bs-original-title="<span>ลบข้อมูล</span>">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
