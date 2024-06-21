@extends('layout.app')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">หน้าหลัก /</span> หัวข้อแบบประเมิน
    </h4>
    <form action="{{ route('edit_at_title') }}" method="post" class="mb-4">
        @csrf
        <input type="hidden" name="at_title_id" value="{{ $at_title->at_title_id }}">
        <div class="card">
            <div class="card-header">
                <button type="submit" class="btn btn-primary">บันทึก</button>
            </div>
            <div class="card-body">
                <textarea class="form-control" id="at_title" name="at_title_text">{{ $at_title->at_title_text }}</textarea>
            </div>
        </div>
    </form>
@endsection
