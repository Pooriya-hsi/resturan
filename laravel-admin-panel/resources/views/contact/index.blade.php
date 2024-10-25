@extends('layout.master')
@section('title', 'About Us')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">پیام های ارتباط با ما</h4>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th>موضوع پیام</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->subject }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('contact.show', ['contact' => $message->id]) }}"
                                    class="btn btn-sm btn-outline-info me-2">نمایش</a>

                                <form action="{{ route('contact.destroy', ['contact' => $message->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
