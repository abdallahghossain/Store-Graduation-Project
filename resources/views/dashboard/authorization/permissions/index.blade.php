@extends('dashboard.parent')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start  container-xxl ">

        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">

            <!--begin::Card-->
            <div class="card card-flush ">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1 me-5">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span class="path1"></span><span
                                    class="path2"></span></i> <input type="text"
                                data-kt-permissions-table-filter="search"
                                class="form-control form-control-solid w-250px ps-13" placeholder="Search Permissions">
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">

                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div id="kt_permissions_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 dataTable no-footer"
                                id="kt_permissions_table">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_permissions_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Name: activate to sort column ascending" style="width: 245.225px;">
                                            Id</th>
                                        <th class="min-w-250px sorting_disabled" rowspan="1" colspan="1"
                                            aria-label="Assigned to" style="width: 538.45px;">Name</th>
                                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_permissions_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Created Date: activate to sort column ascending"
                                            style="width: 231.637px;">Guard</th>

                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                        @foreach ($permissions as $permission)
                                        <tr class="odd" id="role_{{ $permission->id }}">
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td><span class="badge bg-success">{{ $permission->guard_name }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$permissions->links()}}
                        </div>

                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>

        </div>
        <!--end::Post-->
    </div>
@endsection
