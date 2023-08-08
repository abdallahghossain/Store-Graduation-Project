@extends('dashboard.parent')
@section('content')
    <div class="col-xl-12">
        <!--begin::Tables Widget 9-->
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">
                        Role Management</span>
                    <span class="text-muted mt-1 fw-bold fs-7">Over 500 members</span>
                </h3>
                <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                    title="" data-bs-original-title="Click to add a product">
                    @can('role-create')
                        <a href="{{ route('roles.create') }}" class="btn btn-sm btn-light btn-active-primary">
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
                            <!--end::Svg Icon-->{{ __('New Role') }}
                        </a>
                    @endcan
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                                <th class="min-w-150px">{{ __('Id') }} </th>
                                <th class="min-w-150px">{{ __('Name') }} </th>
                                <th class="min-w-150px">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input widget-9-check" type="checkbox" value="1">
                                        </div>
                                    </td>
                                    <td>
                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="#"
                                                    class="text-dark fw-bolder text-hover-primary fs-6">{{++$i  }}</a>
                                            </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#"
                                                class="text-dark fw-bolder text-hover-primary fs-6">{{$role->name}}</a>
                                        </div>
                                    </td>

                                    <td class=" d-flex gap-1">
                                        <a class="btn btn-outline-success"
                                        href="{{route('roles.show',$role->id) }}">{{ __('Show') }}</a>
                                        @can('role-edit')
                                        <a class="btn btn-outline-info"
                                        href="{{route('roles.edit',$role->id) }}">{{ __('Edit') }}</a>
                                        @endcan
                                        @can('role-delete')
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-outline-danger">{{ __('Delete') }}</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $roles->render() !!}
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
        </div>
        <!--end::Tables Widget 9-->
    @endsection
