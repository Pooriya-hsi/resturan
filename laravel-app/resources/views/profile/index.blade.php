@extends('profile.layout.master')
@section('title', 'Profile Page')

@section('main')
    <div class="col-sm-12 col-lg-9">
        <form action="{{ route('profile.update', ['user' => $user->id]) }}" method="POST" class="vh-70">
            @csrf
            @method('PUT')
            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <label class="form-label">نام و نام خانوادگی</label>
                    <input name="name" type="text" class="form-control" value="{{ $user->name }}" />
                    <div class="form-text text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label">ایمیل</label>
                    <input name="email" type="text" class="form-control" value="{{ $user->email }}" />
                    <div class="form-text text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label">شماره تلفن</label>
                    <input type="text" disabled class="is-valid form-control" value="{{ $user->cellphone }}" />
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">ویرایش</button>
        </form>
    </div>
@endsection
