@extends('dashboard.parent')
@section('content')
    <div class="col-xl-12 ">
        <!--begin::Contacts-->
        <div class="card card-flush h-lg-100" id="kt_contacts_main">
            <!--begin::Card header-->
            <div class="card-header pt-7" id="kt_chat_contacts_header">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                    <span class="svg-icon svg-icon-1 me-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z"
                                fill="currentColor"></path>
                            <path opacity="0.3"
                                d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z"
                                fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <h2>Create New Role</h2>
                </div>
                <!--end::Card title-->
            </div>
            <div class="pull-right m-4">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back </a>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-5">
                <!--begin::Form-->
                <form action="{{ route('roles.store') }}" method="POST" id="kt_ecommerce_settings_general_form"
                    class="form fv-plugins-bootstrap5 fv-plugins-framework">
                    @csrf
                    <x-alert />
                    <div class="fv-row mb-7 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">{{ __('Name Role') }}</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                aria-label="Enter the contact's name." data-bs-original-title="Enter the contact's name."
                                data-kt-initialized="1"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" name="name" value="">
                        <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <div class="fv-row mb-7 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">{{ __('Permission') }}</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                aria-label="Enter the contact's name." data-bs-original-title="Enter the contact's name."
                                data-kt-initialized="1"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="checkbox" class="form-check-input" name="select-all" id="select-all" />
                        <label class="form-check-label" for="select-all">select all</label>
                        <div class="card">
                            <div class="card-body">
                                @foreach ($permission as $value)
                                    <div class="form-check m-2">
                                        <input type="checkbox" name="permission[{{ $value->id }}]" class="form-check-input"
                                            value="{{ $value->name }}" id="{{ $value->id }}">
                                        <label class="form-check-label" for="{{ $value->id }}">{{ $value->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--begin::Row-->

                    <div class="separator mb-6"></div>
                    <div class="d-flex justify-content-end">
                        <button type="reset" data-kt-contacts-type="cancel"
                            class="btn btn-light me-3">{{ __('Cancel') }}</button>
                        <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                            <span class="indicator-label">{{ __('Save') }}</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $('#select-all').click(function(event) {
            if (this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    </script>
@endpush
