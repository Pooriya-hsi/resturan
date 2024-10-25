@extends('layout.master')
@section('title', 'Product Create')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">نمایش محصول</h4>
    </div>

    <div class="row gy-4 mb-5">

        <div class="col-md-12 mb-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <img src="{{ asset('images/products/' . $product->primary_image) }}" class="rounded" width=350 height=220 alt="primary-image">
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <label class="form-label">نام</label>
            <input disabled type="text" value="{{ $product->name }}" class="form-control" />
        </div>

        <div class="col-md-3">
            <label class="form-label">دسته بندی</label>
            <input disabled type="text" value="{{ $product->category->name }}" class="form-control" />
        </div>

        <div class="col-md-3">
            <label class="form-label">وضعیت</label>
            <input disabled type="text" value="{{ $product->status ? 'فعال' : 'غیر فعال' }}" class="form-control" />
        </div>

        <div class="col-md-3">
            <label class="form-label">قیمت</label>
            <input disabled type="text" value="{{ number_format($product->price) }}" class="form-control" />
        </div>
    
        <div class="col-md-3">
            <label class="form-label">تعداد</label>
            <input disabled type="text" value="{{ $product->quantity }}" class="form-control" />
        </div>

        <div class="col-md-3">
            <label class="form-label">قیمت حراجی</label>
            <input disabled type="text" value="{{ number_format($product->sale_price) }}" class="form-control" />
        </div>

        <div class="col-md-3">
            <label class="form-label">تاریخ شروع حراجی</label>
            <input disabled type="text" value="{{ $product->date_on_sale_from != null ? getJalaliDate($product->date_on_sale_from) : '' }}" class="form-control" />
        </div>

        <div class="col-md-3">
            <label class="form-label">تاریخ پایان حراجی</label>
            <input disabled type="text" value="{{ $product->date_on_sale_to != null ? getJalaliDate($product->date_on_sale_to) : '' }}" class="form-control" />
        </div>

        <div class="col-md-12">
            <label class="form-label">توضیحات</label>
            <textarea disabled rows="5" class="form-control">{{ $product->description }}</textarea>
        </div>

        <div class="col-md-12">
            @foreach ($product->images as $image)
                <img class="rounded" width="200" src="{{ asset('/images/products/' . $image->image) }}" alt="images">
            @endforeach
        </div>
    </div>
@endsection
