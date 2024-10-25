@extends('layout.master')
@section('title', 'Category Edit')


@section('link')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection

@section('script')
    <script type="text/javascript">
        document.addEventListener('alpine:init', () => {
            Alpine.data('checkjs', () => ({
                value: @json($category->status),
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
        <h4 class="fw-bold">ویرایش دسته بندی</h4>
    </div>

    <form action="{{ route('category.update', ['category' => $category->id]) }}" method="POST" class="row gy-4">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <label class="form-label">نام</label>
            <input name="name" value="{{ $category->name }}" type="text" class="form-control" />
            <div class="form-text text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label">وضعیت</label>
            <select name="status" class="form-select">
                <option {{ $category->status === 1 ? 'selected' : '' }} value="1">فعال</option>
                <option {{ $category->status === 0 ? 'selected' : '' }} value="0">غیر فعال</option>
            </select>
            <div class="form-text text-danger">
                @error('status')
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

        <div>
            <button type="submit" class="btn btn-outline-dark mt-3">
                ویرایش دسته بندی
            </button>
        </div>
    </form>
@endsection
