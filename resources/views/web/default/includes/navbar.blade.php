@php
    if (empty($authUser) and auth()->check()) {
        $authUser = auth()->user();
    }
@endphp

<div id="navbarVacuum"></div>
<nav id="navbar" class="navbar navbar-expand-lg navbar-light">
    <div class="{{ (!empty($isPanel) and $isPanel) ? 'container-fluid' : 'container' }}">
        <div class="d-flex align-items-center justify-content-between w-100">

            <a class="navbar-brand navbar-order mr-0" href="/">
                <img src="/store/1/logo.png" class="img-cover" alt="site logo">
            </a>

            <button class="navbar-toggler navbar-order" type="button" id="navbarToggle">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="mx-lg-30 d-none d-lg-flex flex-grow-1 navbar-toggle-content " id="navbarContent">
                <div class="navbar-toggle-header text-right d-lg-none">
                    <button class="btn-transparent" id="navbarClose">
                        <i data-feather="x" width="32" height="32"></i>
                    </button>
                </div>

                <ul class="navbar-nav mr-auto d-flex align-items-center">
                    @if (!empty($categories) and count($categories))
                        <li class="mr-lg-25">
                            <div class="menu-category">
                                <ul>
                                    <li class="cursor-pointer user-select-none d-flex xs-categories-toggle">
                                        <i data-feather="grid" width="20" height="20"
                                            class="mr-10 d-none d-lg-block"></i>
                                        Danh Mục Khóa Học
                                        <ul class="cat-dropdown-menu">
                                            @foreach ($categories as $category)
                                                <li>
                                                    <a
                                                        href="{{ (!empty($category->subCategories) and count($category->subCategories)) ? '#!' : $category->getUrl() }}">
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ $category->icon }}"
                                                                class="cat-dropdown-menu-icon mr-10"
                                                                alt="{{ $category->title }} icon">
                                                            {{ $category->title }}
                                                        </div>

                                                        @if (!empty($category->subCategories) and count($category->subCategories))
                                                            <i data-feather="chevron-right" width="20"
                                                                height="20"
                                                                class="d-none d-lg-inline-block ml-10"></i>
                                                            <i data-feather="chevron-down" width="20" height="20"
                                                                class="d-inline-block d-lg-none"></i>
                                                        @endif
                                                    </a>

                                                    @if (!empty($category->subCategories) and count($category->subCategories))
                                                        <ul class="sub-menu">
                                                            @foreach ($category->subCategories as $subCategory)
                                                                <li><a
                                                                        href="{{ $subCategory->getUrl() }}">{{ $subCategory->title }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif

                    @if (!empty($navbarPages) and count($navbarPages))
                        @foreach ($navbarPages as $navbarPage)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ $navbarPage['link'] }}">{{ $navbarPage['title'] }}</a>
                            </li>
                        @endforeach
                    @endif
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="/classes?sort=newest">khóa học test </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/classes?sort=newest">khóa học test </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/classes?sort=newest">khóa học test </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/classes?sort=newest">khóa học test </a>
                    </li> --}}
                </ul>
            </div>

            {{-- bán khóa học và trở thành giáo viên --}}
            {{-- <div class="nav-icons-or-start-live navbar-order">

                <a href="{{ empty($authUser) ? '/login' : ($authUser->isAdmin() ? '/admin/webinars/create' : ($authUser->isUser() ? '/become_instructor' : '/panel/webinars/new')) }}"
                    class="d-none d-lg-flex btn btn-sm btn-primary nav-start-a-live-btn">
                    {{ (empty($authUser) or !$authUser->isUser()) ? trans('navbar.start_a_live_class') : ($authUser->isUser() ? trans('site.become_instructor') : '') }}
                </a>

                <a href="{{ empty($authUser) ? '/login' : ($authUser->isUser() ? '/become_instructor' : '/panel/webinars/new') }}"
                    class="d-flex d-lg-none text-primary nav-start-a-live-btn font-14">
                    {{ (empty($authUser) or !$authUser->isUser()) ? trans('navbar.start_a_live_class') : ($authUser->isUser() ? trans('site.become_instructor') : '') }}
                </a>

                <div class="d-none nav-notify-cart-dropdown top-navbar ">
                    @include(getTemplate() . '.includes.shopping-cart-dropdwon')

                    <div class="border-left mx-15"></div>

                    @include(getTemplate() . '.includes.notification-dropdown')
                </div>

            </div> --}}

            {{-- avatar --}}
            <div class="xs-w-100 d-flex align-items-center justify-content-between ">
                {{-- giỏ hàng thanh toán và thông báo --}}
                {{-- <div class="d-flex">

                    @include(getTemplate() . '.includes.shopping-cart-dropdwon')

                    <div class="border-left mx-5 mx-lg-15"></div>

                    @include(getTemplate() . '.includes.notification-dropdown')
                </div> --}}

                @if (!empty($authUser))
                    <div class="dropdown">
                        <a href="#!" class="navbar-user d-flex align-items-center ml-50 dropdown-toggle"
                            type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img src="{{ $authUser->getAvatar() }}"style="width: 40px;" class="rounded-circle"
                                alt="{{ $authUser->full_name }}">
                            <span
                                class="font-16 user-name ml-10 text-dark-blue font-14">{{ $authUser->full_name }}</span>
                        </a>

                        <div class="dropdown-menu user-profile-dropdown" aria-labelledby="dropdownMenuButton"
                            style="margin-left: 25%;">
                            <div class="d-md-none border-bottom mb-20 pb-10 text-right">
                                <i class="close-dropdown" data-feather="x" width="32" height="32"
                                    class="mr-10"></i>
                            </div>

                            {{-- my panel --}}
                            {{-- <a class="dropdown-item" href="{{ $authUser->isAdmin() ? '/admin' : '/panel' }}">
                                <img src="/assets/default/img/icons/sidebar/dashboard.svg" width="25"
                                    alt="nav-icon">
                                <span class="font-14 text-dark-blue">{{ trans('public.my_panel') }}</span>
                            </a> --}}

                            {{-- my profile cua giao vien --}}
                            {{-- @if ($authUser->isTeacher() or $authUser->isOrganization())
                                <a class="dropdown-item" href="{{ $authUser->getProfileUrl() }}">
                                    <img src="/assets/default/img/icons/profile.svg" width="25" alt="nav-icon">
                                    <span class="font-14 text-dark-blue">{{ trans('public.my_profile') }}</span>
                                </a>
                            @endif --}}
                            <a class="dropdown-item" href="/logout">
                                <img src="/assets/default/img/icons/sidebar/logout.svg" width="25" alt="nav-icon">
                                <span class="font-14 text-dark-blue">{{ trans('panel.log_out') }}</span>
                            </a>
                        </div>
                    </div>
                @else
                    <div class="d-flex align-items-center ml-md-50">
                        <a href="/login" class="py-5 px-10 mr-10 text-dark-blue font-14">Đăng Nhập</a>
                        <a href="/register" class="py-5 px-10 text-dark-blue font-14">Đăng Ký</a>
                    </div>
                @endif
            </div>


        </div>
    </div>
</nav>

@push('scripts_bottom')
    <script src="/assets/default/js/parts/navbar.min.js"></script>
@endpush
