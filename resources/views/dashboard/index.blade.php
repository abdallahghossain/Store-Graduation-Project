@extends('dashboard.parent')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Row-->
                <div class="row gy-5 g-xl-8">
                    <!--begin::Col-->
                    <div class="col-xl-12">
                        <!--begin::Mixed Widget 2-->
                        <div class="card card-xl-stretch">
                            <!--begin::Header-->
                            <div class="card-header border-0 bg-danger py-5">
                                <h3 class="card-title fw-bolder text-white">{{ __('Minishop Statistics') }}</h3>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <!--begin::Chart-->
                                <div class="mixed-widget-2-chart card-rounded-bottom bg-danger" data-kt-color="danger"
                                    style="height: 200px"></div>
                                <!--end::Chart-->
                                <!--begin::Stats-->
                                <div class="card-p mt-n20 position-relative">
                                    <!--begin::Row-->
                                    <div class="row g-0">
                                        <!--begin::Col-->
                                        <div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <path
                                                            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path
                                                            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                            fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            </span>
                                            <a href="{{ route('users.index') }}" class="text-warning fw-bold fs-6"><br>
                                                {{--                                                <h2 class="text-warning fw-bold"> {{ $totalUsers }} {{ __('Users') }} --}}
                                                {{--                                                    </h2> --}}
                                                <h2 class="text-warning fw-bold" data-kt-countup="true"
                                                    data-kt-countup-value="{{ $totalUsers }}">
                                                    0
                                                    <h2 class="text-warning fw-bold">
                                                        {{ __('Users') }}
                                                    </h2>
                                                </h2>
                                            </a>
                                        </div>
                                        <div class="col bg-light-primary px-6 py-8 rounded-2 me-7 mb-7">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                            <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24">
                                                        </rect>
                                                        <path
                                                            d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                                            fill="#000000" opacity="0.3"></path>
                                                        <path
                                                            d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                                            fill="#000000" opacity="0.3"></path>
                                                        <path
                                                            d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                                            fill="#000000" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <a href="{{ route('admins.index') }}" class="text-primary fw-bold fs-6"><br>
                                                {{--                                                <h2 class="text-primary fw-bold"> {{ $totalAdmins }} {{ __('Admins') }} --}}
                                                {{--                                                </h2> --}}
                                                <h2 class="text-primary fw-bold" data-kt-countup="true"
                                                    data-kt-countup-value="{{ $totalAdmins }}">
                                                    0
                                                    <h2 class="text-primary fw-bold">
                                                        {{ __('Admins') }}
                                                    </h2>
                                                </h2>
                                            </a>
                                        </div>
                                        <div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
                                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Box3.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M20.4061385,6.73606154 C20.7672665,6.89656288 21,7.25468437 21,7.64987309 L21,16.4115967 C21,16.7747638 20.8031081,17.1093844 20.4856429,17.2857539 L12.4856429,21.7301984 C12.1836204,21.8979887 11.8163796,21.8979887 11.5143571,21.7301984 L3.51435707,17.2857539 C3.19689188,17.1093844 3,16.7747638 3,16.4115967 L3,7.64987309 C3,7.25468437 3.23273352,6.89656288 3.59386153,6.73606154 L11.5938615,3.18050598 C11.8524269,3.06558805 12.1475731,3.06558805 12.4061385,3.18050598 L20.4061385,6.73606154 Z"
                                                            fill="#000000" opacity="0.3" />
                                                        <polygon fill="#000000"
                                                            points="14.9671522 4.22441676 7.5999999 8.31727912 7.5999999 12.9056825 9.5999999 13.9056825 9.5999999 9.49408582 17.25507 5.24126912" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <a href="{{ route('products.index') }}" class="text-warning fw-bold fs-6"><br>
                                                {{--                                                <h2 class="text-warning fw-bold">{{ $totalProd }} {{ __('Products') }} --}}
                                                {{--                                                    </h2> --}}
                                                <h2 class="text-warning fw-bold" data-kt-countup="true"
                                                    data-kt-countup-value="{{ $totalProd }}">
                                                    0
                                                    <h2 class="text-warning fw-bold">
                                                        {{ __('Products') }}
                                                    </h2>
                                                </h2>
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col bg-light-primary px-6 py-8 rounded-2 me-7 mb-7">
                                            <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Layout/Layout-grid.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24"
                                                            height="24" />
                                                        <rect fill="#000000" opacity="0.3" x="4"
                                                            y="4" width="4" height="4"
                                                            rx="1" />
                                                        <path
                                                            d="M5,10 L7,10 C7.55228475,10 8,10.4477153 8,11 L8,13 C8,13.5522847 7.55228475,14 7,14 L5,14 C4.44771525,14 4,13.5522847 4,13 L4,11 C4,10.4477153 4.44771525,10 5,10 Z M11,4 L13,4 C13.5522847,4 14,4.44771525 14,5 L14,7 C14,7.55228475 13.5522847,8 13,8 L11,8 C10.4477153,8 10,7.55228475 10,7 L10,5 C10,4.44771525 10.4477153,4 11,4 Z M11,10 L13,10 C13.5522847,10 14,10.4477153 14,11 L14,13 C14,13.5522847 13.5522847,14 13,14 L11,14 C10.4477153,14 10,13.5522847 10,13 L10,11 C10,10.4477153 10.4477153,10 11,10 Z M17,4 L19,4 C19.5522847,4 20,4.44771525 20,5 L20,7 C20,7.55228475 19.5522847,8 19,8 L17,8 C16.4477153,8 16,7.55228475 16,7 L16,5 C16,4.44771525 16.4477153,4 17,4 Z M17,10 L19,10 C19.5522847,10 20,10.4477153 20,11 L20,13 C20,13.5522847 19.5522847,14 19,14 L17,14 C16.4477153,14 16,13.5522847 16,13 L16,11 C16,10.4477153 16.4477153,10 17,10 Z M5,16 L7,16 C7.55228475,16 8,16.4477153 8,17 L8,19 C8,19.5522847 7.55228475,20 7,20 L5,20 C4.44771525,20 4,19.5522847 4,19 L4,17 C4,16.4477153 4.44771525,16 5,16 Z M11,16 L13,16 C13.5522847,16 14,16.4477153 14,17 L14,19 C14,19.5522847 13.5522847,20 13,20 L11,20 C10.4477153,20 10,19.5522847 10,19 L10,17 C10,16.4477153 10.4477153,16 11,16 Z M17,16 L19,16 C19.5522847,16 20,16.4477153 20,17 L20,19 C20,19.5522847 19.5522847,20 19,20 L17,20 C16.4477153,20 16,19.5522847 16,19 L16,17 C16,16.4477153 16.4477153,16 17,16 Z"
                                                            fill="#000000" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <!--end::Svg Icon-->
                                            <a href="{{ route('categories.index') }}"
                                                class="text-primary fw-bold fs-6"><br>
                                                {{--                                                <h2 class="text-primary fw-bold"> {{ $totalCateg }} {{ __('Categories') }} --}}
                                                {{--                                                </h2> --}}
                                                <h2 class="text-primary fw-bold" data-kt-countup="true"
                                                    data-kt-countup-value="{{ $totalCateg }}">
                                                    0
                                                    <h2 class="text-primary fw-bold">
                                                        {{ __('Categories') }}
                                                    </h2>
                                                </h2>
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <div class="row g-0">
                                        <!--begin::Col-->
                                        <div class="col bg-light-danger px-6 py-8 rounded-2 me-7 mb-7">
                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                            <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Settings.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect opacity="0.200000003" x="0" y="0"
                                                            width="24" height="24" />
                                                        <path
                                                            d="M4.5,7 L9.5,7 C10.3284271,7 11,7.67157288 11,8.5 C11,9.32842712 10.3284271,10 9.5,10 L4.5,10 C3.67157288,10 3,9.32842712 3,8.5 C3,7.67157288 3.67157288,7 4.5,7 Z M13.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L13.5,18 C12.6715729,18 12,17.3284271 12,16.5 C12,15.6715729 12.6715729,15 13.5,15 Z"
                                                            fill="#000000" opacity="0.3" />
                                                        <path
                                                            d="M17,11 C15.3431458,11 14,9.65685425 14,8 C14,6.34314575 15.3431458,5 17,5 C18.6568542,5 20,6.34314575 20,8 C20,9.65685425 18.6568542,11 17,11 Z M6,19 C4.34314575,19 3,17.6568542 3,16 C3,14.3431458 4.34314575,13 6,13 C7.65685425,13 9,14.3431458 9,16 C9,17.6568542 7.65685425,19 6,19 Z"
                                                            fill="#000000" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <a href="{{ route('slider.index') }}" class="text-danger fw-bold fs-6"><br>
                                                <h2 class="text-danger fw-bold" data-kt-countup="true"
                                                    data-kt-countup-value="{{ $totalSlid }} ">
                                                    0
                                                    <h2 class="text-danger fw-bold">
                                                        {{ __('Sliders') }}
                                                    </h2>
                                                </h2>
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col bg-light-success px-6 py-8 rounded-2 me-7 mb-7">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                                            <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24"
                                                            height="24" />
                                                        <path
                                                            d="M3,10.0500091 L3,8 C3,7.44771525 3.44771525,7 4,7 L9,7 L9,9 C9,9.55228475 9.44771525,10 10,10 C10.5522847,10 11,9.55228475 11,9 L11,7 L21,7 C21.5522847,7 22,7.44771525 22,8 L22,10.0500091 C20.8588798,10.2816442 20,11.290521 20,12.5 C20,13.709479 20.8588798,14.7183558 22,14.9499909 L22,17 C22,17.5522847 21.5522847,18 21,18 L11,18 L11,16 C11,15.4477153 10.5522847,15 10,15 C9.44771525,15 9,15.4477153 9,16 L9,18 L4,18 C3.44771525,18 3,17.5522847 3,17 L3,14.9499909 C4.14112016,14.7183558 5,13.709479 5,12.5 C5,11.290521 4.14112016,10.2816442 3,10.0500091 Z M10,11 C9.44771525,11 9,11.4477153 9,12 L9,13 C9,13.5522847 9.44771525,14 10,14 C10.5522847,14 11,13.5522847 11,13 L11,12 C11,11.4477153 10.5522847,11 10,11 Z"
                                                            fill="#000000"
                                                            transform="translate(12.500000, 12.500000) rotate(-45.000000) translate(-12.500000, -12.500000) " />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <!--end::Svg Icon-->
                                            <a href="{{ route('coupon.index') }}" class="text-success fw-bold fs-6"><br>
                                                {{--                                                <h2 class="text-success fw-bold">{{ $totalCoupon }} {{ __('Coupons') }} --}}
                                                {{--                                                </h2> --}}
                                                <h2 class="text-success fw-bold" data-kt-countup="true"
                                                    data-kt-countup-value="{{ $totalCoupon }}">
                                                    0
                                                    <h2 class="text-success fw-bold">
                                                        {{ __('Coupons') }}
                                                    </h2>
                                                </h2>
                                            </a>
                                        </div>
                                        <div class="col bg-light-danger px-6 py-8 rounded-2 me-7 mb-7">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                                            <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z"
                                                        fill="black" />
                                                    <path opacity="0.3"
                                                        d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <a href="{{ route('blog.index') }}" class="text-danger fw-bold fs-6"><br>
                                                {{--                                                <h2 class="mfp-counter text-danger fw-bold">{{ $totalBlogs }} {{ __('Blogs') }} --}}
                                                <h2 class="text-danger fw-bold" data-kt-countup="true"
                                                    data-kt-countup-value="{{ $totalBlogs }}">
                                                    0
                                                    <h2 class="text-danger fw-bold">
                                                        {{ __('Blogs') }}
                                                    </h2>
                                                </h2>
                                            </a>
                                        </div>
                                        <div class="col bg-light-success px-6 py-8 rounded-2 me-7 mb-7">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                                            {{-- <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                            </span> --}}
                                            <!--end::Svg Icon-->
                                            <a href="#" class="text-success fw-bold fs-6"><br>
                                                <h2 class="text-success fw-bold" style="font-family: monospace;">MiniShop
                                                    Project<br><br>
                                                    Supervisor UCAS
                                                </h2>
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Mixed Widget 2-->
                    </div>

                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-4">
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--end::Container-->
            </div>
            <!--end::Post-->
        </div>
    @endsection
