<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link 
                {{ request()->is('/') ? 'active' : '' }}
                " aria-current="page" href="{{ route('dashboard') }}">
                    <i class="fs-5 bi bi-grid me-2 text-warning"></i>
                    داشبورد
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fs-5 bi bi-people me-2 text-primary"></i>
                    کاربران
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link
                {{ request()->is('products*') ? 'active' : ''}}
                " href="{{ route('product.index') }}">
                    <i style="color: brown;" class="bi bi-box-seam me-2"></i>
                    محصولات
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link
                {{ request()->is('categories*') ? 'active' : ''}}
                " href="{{ route('category.index') }}">
                    <i style="color: tomato" class="bi bi-grid-3x3-gap me-2"></i>
                    دسته بندی
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fs-5 bi bi-basket me-2 text-info"></i>
                    سفارشات
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fs-5 bi bi-currency-dollar me-2 text-success"></i>
                    تراکنش ها
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link
                {{ request()->is('coupons*') ? 'active' : ''}}
                " href="{{ route('coupon.index') }}">
                    <i style="color: #b4b406" class="bi bi-percent me-2"></i>
                    تخفیف ها
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link
                {{ request()->is('contact-us*') ? 'active' : ''}}
                " href="{{ route('contact.index') }}">
                    <i class="fs-5 bi bi-chat-left-text me-2 text-primary"></i>
                    پیام های ارتباط با ما
                </a>
            </li>

            <li class="nav-item dropdown-center">
                <a class="nav-link dropdown-toggle 
                {{ request()->is('sliders*') ? 'active' : '' }}
                {{ request()->is('features*') ? 'active' : '' }}
                {{ request()->is('about-us*') ? 'active' : '' }}
                {{ request()->is('footer*') ? 'active' : '' }}
                " href="#" role="button" data-bs-toggle="dropdown">
                    <i class="fs-5 bi bi-gear text-danger me-2"></i>
                    تنظیمات سایت
                </a>
                <ul class="dropdown-menu sidebar-menu">
                    <li>
                        <a class="dropdown-item" href="{{ route('slider.index') }}">اسلایدر صفحه اصلی</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('feature.index') }}">بخش ویژگی ها</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('about.index') }}">بخش درباره ما</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('footer.index') }}">بخش فوتر</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>