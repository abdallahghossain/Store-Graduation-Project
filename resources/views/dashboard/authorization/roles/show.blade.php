@extends('dashboard.parent')
@section('content')
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">
                Show Role</span>
        </h3>
        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title=""
            data-bs-original-title="Click to add a product">

            <a href="{{ route('roles.index') }}" class="btn btn-sm btn-light btn-active-primary">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                            transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black">
                        </rect>
                    </svg>
                </span>
                <!--end::Svg Icon-->{{ __('Back') }}
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2 class="mb-0"> {{ $role->name }}</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Permissions-->
                    <div class="d-flex flex-column text-gray-600">
                        <strong>Permissions:</strong>
                        @if (!empty($rolePermissions))
                            @foreach ($rolePermissions as $v)
                                <div class="d-flex align-items-center py-2">
                                    <span class="bullet bg-primary me-3"></span>{{ $v->name }}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!--end::Permissions-->
            </div>
            <!--end::Card body-->
            <!--begin::Card footer-->
            <div class="card-footer pt-0">
                <button type="button" class="btn btn-light btn-active-primary" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_update_role">Edit Role</button>
            </div>
            <!--end::Card footer-->
        </div>
    @endsection
