@extends('layouts.app')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class=" container-xxl " id="kt_content_container">
            <div class="d-flex flex-column flex-lg-row">
                @include('complaints.includes.complaint_side_menu')

                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">

                    <!--begin::Card-->
                    <div class="card">
                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                            <!--begin::Actions-->
                            <div class="d-flex flex-wrap gap-2">
                                <!--begin::Checkbox-->
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-4 me-lg-7">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                        data-kt-check-target="#kt_inbox_listing .form-check-input" value="1" />
                                </div>
                                <!--end::Checkbox-->

                                <!--begin::Reload-->
                                <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary"
                                    data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-placement="top" title="Reload">
                                    <i class="ki-duotone ki-arrows-circle fs-2"><span class="path1"></span><span
                                            class="path2"></span></i> </a>
                                <!--end::Reload-->

                                <!--begin::Archive-->
                                <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary"
                                    data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-placement="top"
                                    title="Archive">
                                    <i class="ki-duotone ki-sms fs-2"><span class="path1"></span><span
                                            class="path2"></span></i> </a>
                                <!--end::Archive-->

                                <!--begin::Delete-->
                                <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary"
                                    data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-placement="top" title="Delete">
                                    <i class="ki-duotone ki-trash fs-2"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span><span class="path5"></span></i> </a>
                                <!--end::Delete-->

                                {{-- <!--begin::Filter-->
                                <div>
                                    <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">
                                        <i class="ki-duotone ki-down fs-2"></i> </a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-inbox-listing-filter="show_all">
                                                All
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-inbox-listing-filter="show_read">
                                                Read
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-inbox-listing-filter="show_unread">
                                                Unread
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-inbox-listing-filter="show_starred">
                                                Starred
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-inbox-listing-filter="show_unstarred">
                                                Unstarred
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Filter--> --}}

                                <!--begin::Sort-->
                                <span>
                                    <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary"
                                        data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-placement="top"
                                        title="Sort">
                                        <i class="ki-duotone ki-dots-square fs-3 m-0"><span class="path1"></span><span
                                                class="path2"></span><span class="path3"></span><span
                                                class="path4"></span></i> </a>
                                    <!--begin::Menu-->
                                    {{-- <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-inbox-listing-filter="filter_newest">
                                                Newest
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-inbox-listing-filter="filter_oldest">
                                                Oldest
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-inbox-listing-filter="filter_unread">
                                                Unread
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu--> --}}
                                </span>
                                <!--end::Sort-->
                            </div>
                            <!--end::Actions-->

                            <!--begin::Actions-->
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4"><span
                                            class="path1"></span><span class="path2"></span></i> <input type="text"
                                        data-kt-inbox-listing-filter="search"
                                        class="form-control form-control-sm form-control-solid mw-100 min-w-125px min-w-lg-150px min-w-xxl-200px ps-11"
                                        placeholder="Search inbox" />
                                </div>
                                <!--end::Search-->

                                <!--begin::Toggle-->
                                <a href="#"
                                    class="btn btn-sm btn-icon btn-color-primary btn-light btn-active-light-primary d-lg-none"
                                    data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-placement="top"
                                    title="Toggle inbox menu" id="kt_inbox_aside_toggle">
                                    <i class="ki-duotone ki-burger-menu-2 fs-3 m-0"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span><span class="path5"></span><span
                                            class="path6"></span><span class="path7"></span><span
                                            class="path8"></span><span class="path9"></span><span
                                            class="path10"></span></i> </a>
                                <!--end::Toggle-->
                            </div>
                            <!--end::Actions-->
                        </div>

                        <div class="card-body p-0">

                            <!--begin::Table-->
                            <table class="table  align-middle border rounded table-row-dashed  table-responsive table-hover fs-6 gy-5 my-0" id="kt_complaints_listing" data-ajax-url="{{ route('complaints.datatable') }}">
                                <thead class="d-none">
                                    <tr>
                                        <th>Checkbox</th>
                                        <th>User</th>
                                        <th>Complaint</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be loaded via AJAX -->
                                </tbody>
                            </table>

                            <!-- Search input -->
                            <input type="text" data-kt-complaints-listing-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search complaints...">
                            <!--end::Table-->
                        </div>
                    </div>
                    <!--end::Card-->

                </div>
                <!--end::Content-->
            </div>
            <!--end::Inbox App - Messages -->




        </div>
        <!--end::Container-->
    </div>
@endsection
