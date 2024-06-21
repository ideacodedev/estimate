@extends('layout.app')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">หน้าหลัก / แบบประเมิน /</span> แบบฟอร์มประเมิน
    </h4>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('at_record') }}" class="btn btn-warning">
                ย้อนกลับ
            </a>
        </div>
        <div class="card-body">
            <?= $at_title->at_title_text ?>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            คะแนนประเมิน
        </div>
        <div class="card-body">
            <font style="font-size: 16px">
                มี {{ $at_fetch->count }} ข้อประเมิน
            </font>
            <div class="d-flex">
                <div class="progress w-50 mt-1">
                    <div class="progress-bar" role="progressbar" style="width: {{ $at_fetch->sum*100/10 }}%"
                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        {{ $at_fetch->sum }} คะแนน
                    </div>
                </div>
                <font style="font-size: 12px">
                    &nbsp;{{ $at_fetch->count * 5 }} คะแนนรวม
                </font>
            </div>
        </div>
    </div>
    <br>
    <div class="col-lg mb-4">
        <form action="{{ route('add_at') }}" method="post">
            @csrf
            <input type="hidden" name="at_id" value="{{ $at->at_id ?? '' }}">
            <div class="card mb-4 mb-lg-0">
                @foreach ($room->room_ed as $key => $item)
                    @if ($key > 0)
                        <?= '<hr class="m-0">' ?>
                    @endif
                    <h5 class="card-header">{{ $item->ed?->ed_device }}</h5>
                    <div class="card-body">
                        <input type="hidden" name="room_ed_id[]" value="{{ $item->room_ed_id }}">
                        <blockquote class="blockquote mt-1">
                            <div class="col-md">
                                <small class="fw-semibold d-block">คะแนนประเมิน</small>
                                <div class="form-check form-check-inline mt-3">
                                    <input class="form-check-input" type="radio"
                                        {{ $at_list_score[$key] == 5 ? 'checked' : 'disabled' }} name="at_list_score{{ $item->room_ed_id }}"
                                        id="radio1{{ $item->room_ed_id }}" value="5">
                                    <label class="form-check-label" for="radio1{{ $item->room_ed_id }}">มากที่สุด</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        {{ $at_list_score[$key] == 4 ? 'checked' : 'disabled' }} name="at_list_score{{ $item->room_ed_id }}"
                                        id="radio2{{ $item->room_ed_id }}" value="4">
                                    <label class="form-check-label" for="radio2{{ $item->room_ed_id }}">มาก</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        {{ $at_list_score[$key] == 3 ? 'checked' : 'disabled' }} name="at_list_score{{ $item->room_ed_id }}"
                                        id="radio3{{ $item->room_ed_id }}" value="3">
                                    <label class="form-check-label" for="radio3{{ $item->room_ed_id }}">ปานกลาง</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        {{ $at_list_score[$key] == 2 ? 'checked' : 'disabled' }} name="at_list_score{{ $item->room_ed_id }}"
                                        id="radio4{{ $item->room_ed_id }}" value="2">
                                    <label class="form-check-label" for="radio4{{ $item->room_ed_id }}">น้อย</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        {{ $at_list_score[$key] == 1 ? 'checked' : 'disabled' }} name="at_list_score{{ $item->room_ed_id }}"
                                        id="radio5{{ $item->room_ed_id }}" value="1">
                                    <label class="form-check-label" for="radio5{{ $item->room_ed_id }}">น้อยที่สุด</label>
                                </div>
                                <small class="fw-semibold d-block mt-3">ข้อเสนอแนะ</small>
                                <textarea class="form-control" name="at_list_note[]" placeholder="ข้อเสนอแนะ..." rows="3" disabled>{{ $at_list_note[$key] }}</textarea>
                            </div>
                        </blockquote>
                    </div>
                @endforeach
            </div>
        </form>
    </div>
@endsection
