<div class="col-12 col-lg-3 mb-5 mb-lg-0">
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ route('profile.index') }}"><i class="bi bi-info-lg text-info fs-4"></i>
                اطلاعات کاربر</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('profile.address') }}"><i style="color: #95148a;" class="bi bi-geo-fill fs-4"></i>
                آدرس ها</a>
        </li>
        <li class="list-group-item"><i style="color: #3200e8;" class="bi bi-list-ul fs-2"></i>
            <a href="./orders.html">سفارشات</a>
        </li>
        <li class="list-group-item">
            <a href="./transactions.html"><i class="text-primary bi bi-credit-card-2-back-fill fs-4"></i>
                تراکنش ها</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('profile.wishlist') }}"><i class="bi bi-star-fill fs-4 text-warning"></i>
                لیست علاقه مندی ها</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('auth.logout') }}"><i class="bi bi-box-arrow-left fs-4"></i>
                خروج</a>
        </li>
    </ul>
</div>
