@extends('layout.app')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">หน้าหลัก /</span> แบบประเมิน
    </h4>
    <div class="row mb-4">
        @foreach ($room as $item)
            <div class="col-md-4">
                <div class="card text-center mb-3">
                    <div class="card-body">
                        <h5 class="card-title">ห้อง: {{ $item->room_name }} <span
                                class="badge bg-warning">{{ $item->building?->building_name }} (ชั้น {{ $item->room_floor }})</span></h5>
                        <p class="card-text">
                            การบริการสิ่งสนับสนุนการเรียนรู้มี {{ $item->room_ed->count() }} อุปกรณ์อิเล็กทรอนิกส์ คือ <br>
                            @foreach ($item->room_ed as $key => $for)
                                {{ $key > 0 ? ',' : '' }}
                                {{ $for->ed?->ed_device }}
                            @endforeach
                        </p>
                        @if ($item->room_user?->count() > 0)
                            <button type="button" class="btn btn-danger" disabled>ประเมินเรียบร้อย</button>
                        @else
                            <a href="{{ url('at_form/' . base64_encode($item->room_id)) }}"
                                class="btn btn-primary">ทำแบบประเมิน</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
