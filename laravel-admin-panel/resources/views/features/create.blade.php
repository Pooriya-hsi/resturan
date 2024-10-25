@extends('layout.master')
@section('title', 'Feature Create')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">ایجاد ویژگی</h4>
    </div>

    <form action="{{ route('feature.store') }}" method="POST" class="row gy-4">
        @csrf
        <div class="col-md-6">
            <label class="form-label">عنوان</label>
            <input name="title" value="{{ old('title') }}" type="text" class="form-control" />
            <div class="form-text text-danger">@error('title') {{ $message }} @enderror</div>
        </div>
        <div class="col-md-3">
            <label class="form-label">آیکون</label>
            <input name="icon" value="{{ old('icon') }}" type="text" class="form-control" />
            <div class="form-text text-danger">@error('icon') {{ $message }} @enderror</div>
        </div>
        <div class="col-md-12">
            <label class="form-label">متن</label>
            <textarea name="body" class="form-control" rows="3">{{ old('body') }}</textarea>
            <div class="form-text text-danger">@error('body') {{ $message }} @enderror</div>
        </div>

        <div>
            <button type="submit" class="btn btn-outline-dark mt-3">
                ایجاد ویژگی
            </button>
        </div>
    </form>
@endsection
