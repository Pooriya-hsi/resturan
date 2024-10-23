@extends('layout.master')
@section('title', 'Cart Page')

@section('link')
    <style>
        .img-cart {
            border-bottom-right-radius: 0px;
            border-top-right-radius: 12px;
            border-top-left-radius: 12px;
            border-bottom-left-radius: 100px;
        }

        .percentage {
            border: 1px solid #f54848;
            padding: 5px;
            border-radius: 12px
        }

        .minus-btn {
            padding: 0;
        }
        .del-btn{
            position: absolute;
            bottom: 5px;
        }
    </style>
@endsection

@section('content')
    @if ($cart == null)
        <div class="cart-empty">
            <div class="text-center">
                <div>
                    <i class="bi bi-basket-fill" style="font-size:80px"></i>
                </div>
                <h4 class="text-bold">سبد خرید شما خالی است</h4>
                <a href="{{ route('product.menu') }}" class="btn btn-outline-dark mt-3">
                    مشاهده محصولات
                </a>
            </div>
        </div>
    @else
        <section class="single_page_section layout_padding">
            <div x-data="{ addressId: null }" class="container">





                <div class="row">
                    <div class="col-md-10 offset-md-1">

                        <div class="row d-block d-lg-none">
                            @foreach ($cart as $key => $item)
                                <div class="col-12">
                                    <div class="card mb-3 w-100">
                                        <div class="row g-0">
                                            <div class="col-4">
                                                <div class="pb-3">
                                                    <img src="{{ imageUrl($item['primary_image']) }}"
                                                        class="img-fluid img-cart rounded-cart" alt="cart-image">
                                                </div>
                                                <a href="{{ route('cart.remove', ['product_id' => $key]) }}"
                                                    class="py-1 btn btn-danger bg-danger rounded-start del-btn">
                                                    حذف
                                                </a>
                                            </div>
                                            <div
                                                class="{{ $item['is_sale'] ? 'col-6 border-end' : 'col-8' }} d-flex justify-content-center align-items-center">
                                                <div class="card-body p-1">
                                                    <h6 class="card-title"><b>{{ $item['name'] }}</b></h6>
                                                    <hr>
                                                    <p class="card-text">
                                                        @if ($item['is_sale'])
                                                            <small>
                                                                <del
                                                                    class="text-danger">{{ number_format($item['price']) }}</del>
                                                                {{ number_format($item['sale_price']) }}
                                                                تومان
                                                            </small>
                                                        @else
                                                            <small>
                                                                {{ number_format($item['price']) }}
                                                                تومان
                                                            </small>
                                                        @endif
                                                    </p>
                                                    <p>
                                                    <div class="input-counter">
                                                        <a href="{{ route('cart.increment', ['product_id' => $key, 'qty' => 1]) }}"
                                                            class="plus-btn text-dark">
                                                            +
                                                        </a>
                                                        <div class="input-number">{{ $item['qty'] }}</div>
                                                        <a href="{{ route('cart.decrement', ['product_id' => $key, 'qty' => $item['qty'] - 1]) }}"
                                                            class="minus-btn text-dark">
                                                            -
                                                        </a>
                                                    </div>
                                                    </p>
                                                    <small>
                                                        <b>
                                                            قیمت کل:
                                                            @php
                                                                $price = $item['is_sale']
                                                                    ? $item['sale_price']
                                                                    : $item['price'];
                                                            @endphp
                                                            <span>{{ number_format($item['qty'] * $price) }}</span>
                                                            <span class="ms-1">تومان</span>
                                                        </b>
                                                    </small>
                                                </div>
                                            </div>
                                            @if ($item['is_sale'])
                                                <div class="col-2 d-flex justify-content-center align-items-center">
                                                    <span class="percentage text-danger">
                                                        {{ salePercent($item['price'], $item['sale_price']) }}%
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        <div class="row gy-5">
                            <div class="col-12">
                                <div class="table-responsive d-none d-lg-block">
                                    <table class="table align-middle">
                                        <thead>
                                            <tr>
                                                <th>محصول</th>
                                                <th>نام</th>
                                                <th>قیمت</th>
                                                <th>تعداد</th>
                                                <th>قیمت کل</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart as $key => $item)
                                                <tr>
                                                    <th>
                                                        <img class="rounded" src="{{ imageUrl($item['primary_image']) }}"
                                                            width="100" alt="" />
                                                    </th>
                                                    <td class="fw-bold">{{ $item['name'] }}</td>
                                                    <td>
                                                        @if ($item['is_sale'])
                                                            <div>
                                                                <del>{{ number_format($item['price']) }}</del>
                                                                {{ number_format($item['sale_price']) }}
                                                                تومان
                                                            </div>
                                                            <div class="text-danger">
                                                                {{ salePercent($item['price'], $item['sale_price']) }}%
                                                                تخفیف
                                                            </div>
                                                        @else
                                                            <div>
                                                                {{ number_format($item['price']) }}
                                                                تومان
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="input-counter">
                                                            <a href="{{ route('cart.increment', ['product_id' => $key, 'qty' => 1]) }}"
                                                                class="plus-btn">
                                                                +
                                                            </a>
                                                            <div class="input-number">{{ $item['qty'] }}</div>
                                                            <a href="{{ route('cart.decrement', ['product_id' => $key, 'qty' => $item['qty'] - 1]) }}"
                                                                class="minus-btn">
                                                                -
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @php
                                                            $price = $item['is_sale']
                                                                ? $item['sale_price']
                                                                : $item['price'];
                                                        @endphp
                                                        <span>{{ number_format($item['qty'] * $price) }}</span>
                                                        <span class="ms-1">تومان</span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('cart.remove', ['product_id' => $key]) }}">
                                                            <i class="bi bi-x text-danger fw-bold fs-4 cursor-pointer"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <a href="{{ route('cart.clear') }}" class="btn btn-danger bg-danger mb-4"> <i
                                        class="bi bi-cart-fill"></i> پاک کردن سبد خرید</a>
                            </div>
                        </div>


                        <div class="row mt-4 d-flex align-items-center">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <form action="{{ route('cart.checkCoupon') }}">
                                    <div class="input-group">
                                        @if (request()->session()->has('coupon'))
                                            <input disabled name="code" type="text" class="form-control"
                                                placeholder="کد تخفیف"
                                                value="{{ request()->session()->get('coupon')['code'] }}" />
                                            <button type="submit" class="input-group-text" id="basic-addon2">حذف کد
                                                تخفیف</button>
                                        @else
                                            <input name="code" type="text" class="form-control" placeholder="کد تخفیف"
                                                value="{{ request()->session()->get('coupon') }}" />
                                            <button type="submit" class="input-group-text" id="basic-addon2">اعمال کد
                                                تخفیف</button>
                                        @endif
                                    </div>
                                    <div class="form-text text-danger">
                                        @error('code')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </form>
                            </div>

                            <div class="col-12 col-lg-6 d-flex align-items-center">
                                @if ($addresses->isEmpty())
                                    <a href="{{ route('profile.address.create') }}" class="btn btn-primary">
                                        ایجاد آدرس
                                    </a>
                                @else
                                    <div>
                                        آدرس
                                    </div>
                                    <select x-model="addressId" class="form-select ms-3">
                                        <option value="">انتخاب آدرس</option>
                                        @foreach ($addresses as $address)
                                            <option value="{{ $address->id }}">{{ $address->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="form-text text-danger">
                                        @error('address_id')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                @endif
                            </div>
                        </div>


                        <div class="row justify-content-center mt-5">
                            <div class="col-12 col-lg-10">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-bold">مجموع سبد خرید</h5>
                                        <ul class="list-group mt-4">
                                            <li class="list-group-item d-flex justify-content-between">
                                                <div>مجموع قیمت :</div>
                                                <div>
                                                    {{ number_format($cart_total_price) }} تومان
                                                </div>
                                            </li>

                                            @php
                                                $coupnPrice = 0;
                                                if (request()->session()->has('coupon')) {
                                                    $coupon = request()->session()->get('coupon');
                                                    $couponCode = $coupon['code'];
                                                    $couponPercent = $coupon['percent'];
                                                    $coupnPrice = ($cart_total_price * $couponPercent) / 100;
                                                }
                                            @endphp

                                            @if ($coupnPrice != 0)
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <div>تخفیف :
                                                        <span class="text-danger ms-1">{{ $couponPercent }}%</span>
                                                    </div>
                                                    <div class="text-danger">
                                                        {{ number_format($coupnPrice) }} تومان
                                                    </div>
                                                </li>
                                            @endif

                                            <li class="list-group-item d-flex justify-content-between">
                                                <div>قیمت پرداختی :</div>
                                                <div>
                                                    @if ($coupnPrice != 0)
                                                        {{ number_format($cart_total_price - $coupnPrice) }}
                                                    @else
                                                        {{ number_format($cart_total_price) }}
                                                    @endif
                                                    تومان
                                                </div>
                                            </li>
                                        </ul>
                                        <form action="{{ route('payment.send') }}" method="POST">
                                            @csrf
                                            <input name="coupon_code" value="{{ $coupnPrice != 0 ? $couponCode : null }}"
                                                type="hidden">
                                            <input name="address_id" :value="addressId" type="hidden">
                                            <button type="submit" class="user_option btn-auth mt-4">پرداخت</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
