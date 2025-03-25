@extends('layouts.app')

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class=" container-xxl " id="kt_content_container">
            <!--begin::Card-->
            <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10"
                style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('../../assets/media/illustrations/sigma-1/4.png')">

                <!--begin::Card header-->
                <div class="card-header pt-10">
                    <div class="d-flex align-items-center">
                        <!--begin::Icon-->
                        <div class="symbol symbol-circle me-5">
                            <div class="symbol-label bg-transparent text-primary border border-secondary border-dashed">
                                <i class="fa fa-music fs-2x text-primary"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </div>
                        </div>
                        <!--end::Icon-->

                        <!--begin::Title-->
                        <div class="d-flex flex-column">
                            <h2 class="mb-1">Music Management</h2>
                            <div class="text-muted fw-bold">
                                <a href="{{ route('dashboard') }}">Dashboard</a> <span class="mx-3">|</span> <a href="{{ route('all_song') }}">Music Management
                                  </a>
                            </div>
                        </div>
                        <!--end::Title-->
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pb-0">
                    <!--begin::Navs-->
                    <div class="d-flex overflow-auto h-55px">
                        {{-- <ul
                            class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-semibold flex-nowrap">
                            <!--begin::Nav item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary me-6 active" href="folders.html">
                                    Files
                                </a>
                            </li>
                            <!--end::Nav item-->

                            <!--begin::Nav item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary me-6" href="settings.html">
                                    Settings
                                </a>
                            </li>
                            <!--end::Nav item-->
                        </ul> --}}
                    </div>
                    <!--begin::Navs-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
            <!--begin::Card-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header pt-8">
                    <div class="card-title">

                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-filemanager-table-toolbar="base">

                                <button type="button" class="btn btn-flex btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_upload">
                                    <i class="fa fa-upload fs-2"><span class="path1"></span><span
                                            class="path2"></span></i> Upload Music
                                </button>
                                <!--end::Add customer-->
                            </div>

                            <!--end::Group actions-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <span class="svg-icon fs-1 position-absolute ms-4">...</span>
                                <input type="text" data-kt-filter="search"
                                    class="form-control form-control-solid w-250px ps-14" placeholder="Search Report" />
                            </div>
                            <!--end::Search-->
                            <!--begin::Export buttons-->
                            <div id="kt_datatable_example_1_export" class="d-none"></div>
                            <!--end::Export buttons-->
                        </div>
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <!--begin::Export dropdown-->
                            <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end">
                                <i class="fa-solid fa-file-export fs-2"> </i><span class="path1"></span><span
                                        class="path2"></span>
                                Export
                            </button>
                            <!--begin::Menu-->
                            <div id="kt_datatable_example_export_menu"
                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-export="copy">
                                        Copy to clipboard
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-export="excel">
                                        Export as Excel
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-export="csv">
                                        Export as CSV
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-export="pdf">
                                        Export as PDF
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                            <!--end::Export dropdown-->

                            <!--begin::Hide default export buttons-->
                            <div id="kt_datatable_example_buttons" class="d-none"></div>

                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table align-middle border rounded table-row-dashed fs-6 g-5"
                            id="kt_datatable_example">
                            <thead>

                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase">
                                    <th class="min-w-100px">Customer Name</th>
                                    <th class="min-w-100px">Email</th>
                                    <th class="min-w-100px">Status</th>
                                    <th class="min-w-100px">Date Joined</th>
                                    <th class="text-end min-w-75px">No. Orders</th>
                                    <th class="text-end min-w-75px">No. Products</th>
                                    <th class="text-end min-w-100px pe-5">Total</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                <tr class="odd">
                                    <td>
                                        <a href="#" class="text-gray-900 text-hover-primary">Emma Smith</a>
                                    </td>
                                    <td>
                                        <a href="#" class="text-gray-900 text-hover-primary">e.smith@kpmg.com.au</a>
                                    </td>
                                    <td>
                                        <div class="badge badge-light-success">Active</div>
                                    </td>
                                    <td data-order="2022-03-10T14:40:00+05:00">10 Mar 2022, 2:40 pm</td>
                                    <td class="text-end pe-0">94</td>
                                    <td class="text-end pe-0">103</td>
                                    <td class="text-end">$500.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end::Card header-->

        </div>
        <!--end::Card-->


        <!--begin::Modal - Upload File-->
        <div class="modal fade" id="kt_modal_upload" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Form-->
                    <form method="POST" action="{{ route('music.upload') }}" enctype="multipart/form-data">

                        <!--begin::Modal header-->
                        <div class="modal-header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bold">Upload files</h2>
                            <!--end::Modal title-->

                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                data-bs-dismiss="modal">
                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->

                        <!--begin::Modal body-->
                        <div class="modal-body pt-10 pb-15 px-lg-17">
                            <!--begin::Input group-->
                            <div class="form-group">
                                <!--begin::Dropzone-->
                                <div class="dropzone dropzone-queue mb-2" id="kt_modal_upload_dropzone">
                                    <!--begin::Controls-->
                                    <div class="dropzone-panel mb-4">
                                        <a class="dropzone-select btn btn-sm btn-primary me-2">Attach
                                            files</a>
                                                @csrf
                                                <input type="file" name="music" accept="audio/*" required>
                                                <button type="submit">Upload Music</button>
                                            </form>

                                    </div>
                                    <!--end::Controls-->

                                    <!--begin::Items-->
                                    <div class="dropzone-items wm-200px">
                                        <div class="dropzone-item p-5" style="display:none">
                                            <!--begin::File-->
                                            <div class="dropzone-file">
                                                <div class="dropzone-filename text-gray-900"
                                                    title="some_image_file_name.jpg">
                                                    <span data-dz-name>some_image_file_name.jpg</span>
                                                    <strong>(<span data-dz-size>340kb</span>)</strong>
                                                </div>

                                                <div class="dropzone-error mt-0" data-dz-errormessage>
                                                </div>
                                            </div>
                                            <!--end::File-->

                                            <!--begin::Progress-->
                                            <div class="dropzone-progress">
                                                <div class="progress bg-gray-300">
                                                    <div class="progress-bar bg-primary"
                                                        role="progressbar" aria-valuemin="0"
                                                        aria-valuemax="100" aria-valuenow="0"
                                                        data-dz-uploadprogress>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Progress-->

                                            <!--begin::Toolbar-->
                                            <div class="dropzone-toolbar">
                                                <span class="dropzone-start">
                                                    <i class="ki-duotone ki-to-right fs-1"></i> </span>
                                                <span class="dropzone-cancel" data-dz-remove
                                                    style="display: none;">
                                                    <i class="ki-duotone ki-cross fs-2"><span
                                                            class="path1"></span><span
                                                            class="path2"></span></i> </span>
                                                <span class="dropzone-delete" data-dz-remove>
                                                    <i class="ki-duotone ki-cross fs-2"><span
                                                            class="path1"></span><span
                                                            class="path2"></span></i> </span>
                                            </div>
                                            <!--end::Toolbar-->
                                        </div>
                                    </div>
                                    <!--end::Items-->
                                </div>
                                <!--end::Dropzone-->

                                <!--begin::Hint-->
                                <span class="form-text fs-6 text-muted">Max file size is 1MB per
                                    file.</span>
                                <!--end::Hint-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Modal body-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
        <!--end::Modal - Upload File-->



    </div>
    <!--end::Content-->
@endsection
