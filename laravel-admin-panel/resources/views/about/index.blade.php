@extends('layout.master')
@section('title', 'About Us')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">بخش درباره ما</h4>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>عنوان</th>
                    <th>متن</th>
                    <th>لینک</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->body }}</td>
                    <td class="dir-ltr">{{ $item->link }}</td>
                    <td>
                        <a href="{{ route('about.edit', ['about' => $item->id]) }}"
                            class="btn btn-sm btn-outline-info me-2">ویرایش</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
