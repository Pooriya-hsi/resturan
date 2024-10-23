<form action="{{ route('contact.store') }}" method="POST">
    @csrf
    <div>
        <input name="name" type="text" value="{{ old('name') }}" class="form-control shadow" placeholder="نام و نام خانوادگی" />
        <div class="form-text text-danger">@error('name') {{$message}} @enderror</div>
    </div>
    <div>
        <input name="email" type="text" value="{{ old('email') }}" class="form-control shadow" placeholder="ایمیل" />
        <div class="form-text text-danger">@error('email') {{$message}} @enderror</div>
    </div>
    <div>
        <input name="subject" type="text" value="{{ old('subject') }}" class="form-control shadow" placeholder="موضوع پیام" />
        <div class="form-text text-danger">@error('subject') {{$message}} @enderror</div>
    </div>
    <div>
        <textarea name="body" rows="10" style="height: 100px" class="form-control shadow" placeholder="متن پیام">{{ old('body') }}</textarea>
        <div class="form-text text-danger">@error('body') {{$message}} @enderror</div>
    </div>
    <div class="btn_box">
        <button type="submit">
            ارسال پیام
        </button>
    </div>
</form>