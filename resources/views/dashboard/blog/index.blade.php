@extends('dashboard.parent')
@section('content')
    <div class="col-xl-12">
        <!--begin::Tables Widget 9-->
        <div class="card mb-5 mb-xl-8">

            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">{{ __('Blog List') }}</span>
                    <!--            <span class="text-muted mt-1 fw-semibold fs-7">Over 500 new members</span>-->
                </h3>
                <div class="card-toolbar">
                    <!--begin::Menu-->
                    <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="5" y="5" width="5" height="5" rx="1"
                                        fill="currentColor"></rect>
                                    <rect x="14" y="5" width="5" height="5" rx="1"
                                        fill="currentColor" opacity="0.3"></rect>
                                    <rect x="5" y="14" width="5" height="5" rx="1"
                                        fill="currentColor" opacity="0.3"></rect>
                                    <rect x="14" y="14" width="5" height="5" rx="1"
                                        fill="currentColor" opacity="0.3"></rect>
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                    <!--begin::Menu 2-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">{{ __('Actions') }} </div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator mb-3 opacity-75"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 menu-state-bg-light-success">
                            <a href="{{ route('blog.create') }}" class="menu-link px-3 bg-light-success"
                                style="color: green">{{ __('Create Post') }}</a>
                            <br>
                        </div>
                        <div class="menu-item px-3">
                            <a href="{{ route('blog.index') }}" class="menu-link px-3">{{ __('back') }}</a>
                            <br>
                        </div>
                    </div>
                    <!--end::Menu 2-->
                    <!--end::Menu-->
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bolder text-muted">
                                <th class="ps-4 min-w-300px rounded-start">{{ __('Image') }} - {{ __('Id') }} -
                                    {{ __('Name') }}</th>
                                <th class="min-w-200px">{{ __('Description') }}</th>
                                <th class="min-w-125px">{{ __('Bublished Date') }}</th>
                                <th class="min-w-125px">{{ __('Url') }}</th>
                                <th class="min-w-200px text-center">{{ __('Actions') }}</th>
                        </thead>
                        <tbody>
                            @forelse ($blog as $data)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-5">
                                                <span class="symbol-label bg-light">
                                                    <img src="{{ asset('images/blog/' . $data->image) }}" class="h-100 w-100"
                                                        alt="">
                                                </span>
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="#"
                                                    class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ $loop->index + 1 }}
                                                    - {{ $data->name }}</a>
                                                {{--                                    <span class="text-muted fw-semibold text-muted d-block fs-7">HTML, JS, ReactJS</span> --}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-info fw-bold text-hover-primary d-block mb-1 fs-6">{{ Str::limit($data->description, 15) }}</a>
                                        {{--                            <span class="text-muted fw-semibold text-muted d-block fs-7">Paid</span> --}}
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">{{ $data->date }}</a>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">{{ $data->url }}</a>
                                    </td>
                                    <td class="text-end">

                                        <a href="{{ route('blog.edit', $data->id) }}"
                                            class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">
                                            {{ __('Edit') }}
                                        </a>
                                        <form action="{{ route('blog.delete', $data->id) }}"
                                            class="btn-sm px-4 me-2 gap-2 d-inline-flex" method="post">
                                            @csrf
                                            @method('Delete')
                                            <button type="submit"
                                                class="btn btn-bg-light btn-color-muted btn-active-color-danger btn-sm px-4 me-2">{{ __('Delete') }}</button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-danger fw-boldest text-center" colspan="6">{{ __('No Post Found') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{--                    {{ $data->links() }} --}}
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
        </div>
    </div>
    <!--end::Tables Widget 9-->
@endsection
