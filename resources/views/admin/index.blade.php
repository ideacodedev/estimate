@extends('layout.app')
@section('content')
    <h4 class="fw-bold py-3 ">หน้าหลัก
    </h4>
    <div class="row mb-4">
        <div class="col-md-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-primary">ยินดีตอนรับเข้าสู่ระบบ! 🎉</h5>
                            <p class="mb-3">
                                @if (auth()->guard('officers')->check())
                                    <div class="row">
                                        <div class="col-md-6">
                                            ชื่อ-สกุล: {{ auth()->guard('officers')->user()->officer_firstname }}
                                            <br>
                                            ที่อยู่: {{ auth()->guard('officers')->user()->officer_address }}
                                        </div>
                                        <div class="col-md-6">
                                            E-mail: {{ auth()->guard('officers')->user()->officer_email }}
                                            <br>
                                            เบอร์โทรศัพท์: {{ auth()->guard('officers')->user()->officer_number }}
                                            <br>
                                            Username: {{ auth()->guard('officers')->user()->username }}
                                            <br>
                                            @foreach (auth()->guard('officers')->user()->officer_room as $key => $for)
                                                ห้อง:
                                                {{ $for->room?->room_name }}
                                                (ชั้น {{ $for->room?->room_floor }})
                                                <br>
                                            @endforeach
                                        </div>
                                    </div>
                                @elseif (auth()->guard('students')->check())
                                    <div class="row">
                                        <div class="col-md-6">
                                            รหัสนักศึกษา: {{ auth()->guard('students')->user()->student_code }}
                                            <br>
                                            ชื่อ-สกุล: {{ auth()->guard('students')->user()->student_firstname }}
                                            <br>
                                            ที่อยู่: {{ auth()->guard('students')->user()->student_address }}
                                        </div>
                                        <div class="col-md-6">
                                            E-mail: {{ auth()->guard('students')->user()->student_email }}
                                            <br>
                                            เบอร์โทรศัพท์: {{ auth()->guard('students')->user()->student_number }}
                                            <br>
                                            Username: {{ auth()->guard('students')->user()->username }}
                                        </div>
                                    </div>
                                @elseif (auth()->guard('lecs')->check())
                                    <div class="row">
                                        <div class="col-md-6">
                                            ชื่อ-สกุล: {{ auth()->guard('lecs')->user()->lecturer_firstname }}
                                            <br>
                                            ที่อยู่: {{ auth()->guard('lecs')->user()->lecturer_address }}
                                        </div>
                                        <div class="col-md-6">
                                            E-mail: {{ auth()->guard('lecs')->user()->lecturer_email }}
                                            <br>
                                            เบอร์โทรศัพท์: {{ auth()->guard('lecs')->user()->lecturer_number }}
                                            <br>
                                            Username: {{ auth()->guard('lecs')->user()->username }}
                                        </div>
                                    </div>
                                @elseif (auth()->check())
                                    <div class="row">
                                        <div class="col-md-6">
                                            ชื่อ-สกุล: {{ auth()->user()->admin_firstname }}
                                            <br>
                                            ที่อยู่: {{ auth()->user()->admin_address }}
                                        </div>
                                        <div class="col-md-6">
                                            E-mail: {{ auth()->user()->admin_email }}
                                            <br>
                                            เบอร์โทรศัพท์: {{ auth()->user()->admin_number }}
                                            <br>
                                            Username: {{ auth()->user()->username }}
                                        </div>
                                    </div>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('resources/tem/assets/img/illustrations/man-with-laptop-light.png') }}"
                                height="140" alt="View Badge User"
                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 order-1">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class="fa-solid fa-house btn btn-info"></i>
                                </div>
                            </div>
                            <span class="d-block mb-1">จำนวนอาคาร</span>
                            <h3 class="card-title mb-2">{{ $building }} อาคาร</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class="fa-solid fa-house btn btn-info"></i>
                                </div>
                            </div>
                            <span class="d-block mb-1">จำนวนห้องเรียน</span>
                            <h3 class="card-title mb-2">{{ $room }} ห้อง</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (auth()->guard('officers')->check())
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <i class="fa-solid fa-house btn btn-info"></i>
                            </div>
                        </div>
                        <span class="d-block mb-1">จำนวนทำแบบประเมิน</span>
                        <h3 class="card-title mb-2">{{ $at }} จำนวน</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <i class="fa-solid fa-house btn btn-info"></i>
                            </div>
                        </div>
                        <span class="d-block mb-1">จำนวนอุปกรณ์อิเล็กทรอนิกส์</span>
                        <h3 class="card-title mb-2">{{ $ed }} จำนวน</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <i class="fa-solid fa-house btn btn-info"></i>
                            </div>
                        </div>
                        <span class="d-block mb-1">จำนวนประเภทอุปกรณ์อิเล็กทรอนิกส์</span>
                        <h3 class="card-title mb-2">{{ $ed_type }} จำนวน</h3>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
