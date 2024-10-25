@extends('layout.master')
@section('title', 'Product Edit')

@section('link')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.css">
    <script type="text/javascript" src="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.js"></script>
@endsection


@section('script')
    <script type="text/javascript">
        document.addEventListener('alpine:init', () => {
            Alpine.data('imageViewer', (src = '') => ({
                imageUrl: src,

                fileChosen(event) {
                    if (event.target.files.length == 0) return;

                    let file = event.target.files[0];
                    let reader = new FileReader()

                    reader.readAsDataURL(file)
                    reader.onload = e => this.imageUrl = e.target.result
                }
            }))
        });

        jalaliDatepicker.startWatch({
            time: true
        });

        document.addEventListener('alpine:init', () => {
            Alpine.data('checkjs', () => ({
                value: @json($product->status),
                statusMsg: '',

                init() {
                    if (this.value === 1) {
                        this.statusMsg = 'فعال';
                        this.value = true;
                    } else {
                        this.statusMsg = 'غیرفعال';
                        this.value = false;
                    }
                },

                statusBtn() {
                    if (this.value === true) {
                        this.value = false;
                        this.statusMsg = 'غیرفعال';
                    } else {
                        this.value = true;
                        this.statusMsg = 'فعال';
                    }
                }
            }))
        });
    </script>
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">ویرایش محصول</h4>
    </div>

    <form action="{{ route('product.update', ['product' => $product->id]) }}" enctype="multipart/form-data" method="POST"
        class="row gy-4 mb-5">
        @csrf
        @method('PUT')

        <div class="col-md-12 mb-5">
            <div class="row justify-content-center">
                <div class="col-md-4" x-data="imageViewer('{{ asset('images/products/' . $product->primary_image) }}')">
                    <label class="form-label">تصویر اصلی</label>

                    <template x-if="imageUrl">
                        <img :src="imageUrl" class="rounded" width=350 height=220 alt="primary-image">
                    </template>

                    <input name="primary_image" @change="fileChosen" type="file" class="form-control mt-3" />

                    <div class="form-text text-danger">
                        @error('primary_image')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <label class="form-label">تصاویر محصول</label>
            <input name="images[]" multiple type="file" class="form-control" />
        </div>

        <div class="col-md-3">
            <label class="form-label">نام</label>
            <input name="name" type="text" value="{{ $product->name }}" class="form-control" />
            <div class="form-text text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <label class="form-label">دسته بندی</label>
            <select name="category_id" class="form-select">
                @foreach ($categories as $category)
                    <option {{ $product->category->id == $category->id ? 'selected' : '' }} value={{ $category->id }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            <div class="form-text text-danger">
                @error('category_id')
                    {{ $message }}
                @enderror
            </div>
        </div>

        {{-- status --}}

        <div x-data="checkjs" class="col-md-3 h-100">
            <label class="form-label">وضعیت</label>
            <div class="form-check form-switch d-flex justify-content-start align-items-center">
                <input class="form-check-input me-2" name="status" style="width: 60px; height: 30px;" type="checkbox"
                    role="switch" id="flexSwitchCheckChecked" x-model="value" @click="statusBtn()"
                    {{ $category->status === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="flexSwitchCheckChecked" x-text="statusMsg"></label>
            </div>
            <div class="form-text text-danger">
                @error('status')
                    {{ $message }}
                @enderror
            </div>
        </div>

        {{-- end status --}}

        <div class="col-md-3">
            <label class="form-label">قیمت</label>
            <input name="price" type="text" value="{{ $product->price }}" class="form-control" />
            <div class="form-text text-danger">
                @error('price')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <label class="form-label">تعداد</label>
            <input name="quantity" type="text" value="{{ $product->quantity }}" class="form-control" />
            <div class="form-text text-danger">
                @error('quantity')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <label class="form-label">قیمت حراجی</label>
            <input name="sale_price" type="text" value="{{ $product->sale_price }}" class="form-control" />
            <div class="form-text text-danger">
                @error('sale_price')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <label class="form-label">تاریخ شروع حراجی</label>
            <input data-jdp name="date_on_sale_from"
                value="{{ $product->date_on_sale_from != null ? getJalaliDate($product->date_on_sale_from) : '' }}"
                type="text" class="form-control" />
            <div class="form-text text-danger">
                @error('date_on_sale_from')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <label class="form-label">تاریخ پایان حراجی</label>
            <input data-jdp name="date_on_sale_to"
                value="{{ $product->date_on_sale_to != null ? getJalaliDate($product->date_on_sale_to) : '' }}"
                type="text" class="form-control" />
            <div class="form-text text-danger">
                @error('date_on_sale_to')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <label class="form-label">توضیحات</label>
            <textarea name="description" rows="5" class="form-control">{{ $product->description }}</textarea>
            <div class="form-text text-danger">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div>
            <button type="submit" class="btn btn-outline-dark mt-3">
                ویرایش محصول
            </button>
        </div>
    </form>
@endsection
