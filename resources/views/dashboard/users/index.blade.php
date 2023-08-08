@extends('dashboard.parent')
@section('content')
    <div class="col-xl-12">
        <!--begin::Tables Widget 9-->
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">{{ __('Create User') }}</span>
                    <span class="text-muted mt-1 fw-bold fs-7">Over 500 members</span>
                </h3>
                <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                    title="" data-bs-original-title="Click to add a user">
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-light btn-active-primary">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                    rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                    fill="black"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->{{ __('New User') }}
                    </a>
                </div>
            </div>
            <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-alert />
                <input type="file" name="file" class="form-control">
                <button type="submit" class="btn btn-outline-info">Import</button>
                <a href="{{ route('users.export') }}" class="btn btn-outline-success">Export</a>
                <a href="{{ route('users.empty-excel') }}" class="btn btn-outline-success">Export Empty Column</a>
            </form>
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
                                <th class="w-25px">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" data-kt-check="true"
                                            data-kt-check-target=".widget-9-check">
                                    </div>
                                </th>
                                <th class="min-w-150px">{{ __('Name') }} </th>
                                <th class="min-w-140px">{{ __('Email') }}</th>
                                <th class="min-w-140px">{{ __('Phone') }}</th>
                                <th class="min-w-140px">{{ __('Address') }}</th>
                                {{-- <th class="min-w-120px">{{__('Password')}}</th> --}}
                                <th class="min-w-150px text-center">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input widget-9-check" type="checkbox" value="1">
                                        </div>
                                    </td>
                                    <td>

                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#"
                                                class="text-dark fw-bolder text-hover-primary fs-6">{{ $user->name }}</a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $user->email }}</a>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $user->mobile ?? '--' }}</a>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#"
                                                class="text-dark fw-bolder text-hover-primary fs-6">{{ $user->address ?? '--' }}</a>
                                        </div>
                                    </td>
                                    {{-- <td class="text-end ">
                                        @can('user-edit')
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">
                                                {{ __('Edit') }}
                                            </a>
                                        @endcan
                                        @can('user-delete')
                                            <form action="{{ route('users.destroy', $user->id) }}"
                                                class="btn-sm px-4 me-2 gap-2 d-inline-flex " method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="btn btn-bg-light btn-color-muted btn-active-color-danger btn-sm px-4 me-2">{{ __('Delete') }}</button>
                                            </form>
                                        @endcan
                                    </td> --}}
                                    <td class="text-end">
                                        <a href="#"
                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true" style="">
                                            <!--begin::Menu item-->
                                            <div class="menu-item">
                                                @can('user-edit')
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="btn btn-bg-light btn-color-muted btn-active-color-info btn-sm px-4 me-2">
                                                        {{ __('Edit') }}
                                                    </a>
                                                @endcan
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item">

                                                @can('user-delete')
                                                    <form action="{{ route('users.destroy', $user->id) }}"
                                                        class="btn-sm px-4 me-2 gap-2 d-inline-flex " method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="btn btn-bg-light btn-color-muted btn-active-color-danger btn-sm px-4 me-2">{{ __('Delete') }}</button>
                                                    </form>
                                                @endcan
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        <!--end::Table body-->
                    </table>
                    {{ $users->links() }}

                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
        </div>
        <!--end::Tables Widget 9-->
    @endsection
