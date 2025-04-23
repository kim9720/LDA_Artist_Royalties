@extends('layouts.app')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class=" container-xxl " id="kt_content_container">
            @if (Auth::user()->role_id == 2)
                <div class="row gx-5 gx-xl-10">
                    <div class="col-xxl-4 mb-5 mb-xl-10">
                        <div class="card card-flush h-xl-100">
                            <div class="card-header py-7">
                                <div class="m-0">
                                    <div class="d-flex align-items-center mb-2">
                                        <span
                                            class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ $userAudioCount }}</span>

                                        <span class="badge badge-light-success fs-base">
                                            {{ $percentage }} %
                                        </span>
                                    </div>

                                    <span class="fs-6 fw-semibold text-gray-500">Media Listenigs</span>
                                </div>

                                <div class="card-toolbar">
                                    <button
                                        class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                        data-kt-menu-overflow="true">
                                        <i class="fa fa-ellipsis-h fs-1 text-gray-500 me-n1"><span
                                                class="path1"></span><span class="path2"></span><span
                                                class="path3"></span><span class="path4"></span></i>
                                    </button>


                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                        data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">
                                                Quick Actions</div>
                                        </div>

                                        <div class="separator mb-3 opacity-75"></div>

                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                New Ticket
                                            </a>
                                        </div>

                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                New Customer
                                            </a>
                                        </div>
                                        <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                            data-kt-menu-placement="right-start">
                                            <a href="#" class="menu-link px-3">
                                                <span class="menu-title">New Group</span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        Admin Group
                                                    </a>
                                                </div>

                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        Staff Group
                                                    </a>
                                                </div>

                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        Member Group
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                New Contact
                                            </a>
                                        </div>

                                        <div class="separator mt-3 opacity-75"></div>

                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3 py-3">
                                                <a class="btn btn-primary  btn-sm px-4" href="#">
                                                    Generate Reports
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- chart one  --}}
                            <div class="card-body pt-0 pb-1">
                                <div id="kt_charts_widget_27" class="min-h-auto"></div>
                            </div>
                        </div>


                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-xxl-4 mb-5 mb-xl-10">
                        <!--begin::Chart widget 28-->
                        <div class="card card-flush h-xl-100">
                            <!--begin::Header-->
                            <div class="card-header py-7">
                                <!--begin::Statistics-->
                                <div class="m-0">
                                    <!--begin::Heading-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Title-->
                                        <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">2,579</span>
                                        <!--end::Title-->

                                        <!--begin::Label-->
                                        <span class="badge badge-light-success fs-base">
                                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                                    class="path1"></span><span class="path2"></span></i>
                                            2.2%
                                        </span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Heading-->

                                    <!--begin::Description-->
                                    <span class="fs-6 fw-semibold text-gray-500">Domain External Links</span>
                                    <!--end::Description-->
                                </div>
                                <!--end::Statistics-->

                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Menu-->
                                    <button
                                        class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                        data-kt-menu-overflow="true">
                                        <i class="ki-duotone ki-dots-square fs-1 text-gray-500 me-n1"><span
                                                class="path1"></span><span class="path2"></span><span
                                                class="path3"></span><span class="path4"></span></i>
                                    </button>


                                    <!--begin::Menu 2-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">
                                                Quick Actions</div>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu separator-->
                                        <div class="separator mb-3 opacity-75"></div>
                                        <!--end::Menu separator-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                New Ticket
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                New Customer
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                            data-kt-menu-placement="right-start">
                                            <!--begin::Menu item-->
                                            <a href="#" class="menu-link px-3">
                                                <span class="menu-title">New Group</span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <!--end::Menu item-->

                                            <!--begin::Menu sub-->
                                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        Admin Group
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        Staff Group
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        Member Group
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu sub-->
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                New Contact
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu separator-->
                                        <div class="separator mt-3 opacity-75"></div>
                                        <!--end::Menu separator-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3 py-3">
                                                <a class="btn btn-primary  btn-sm px-4" href="#">
                                                    Generate Reports
                                                </a>
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu 2-->

                                    <!--end::Menu-->
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body d-flex align-items-end ps-4 pe-0 pb-4">
                                <!--begin::Chart-->
                                <div id="kt_charts_widget_28" class="h-300px w-100 min-h-auto"></div>
                                <!--end::Chart-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Chart widget 28-->


                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-xxl-4 mb-5 mb-xl-10">

                        <!--begin::List widget 9-->
                        <div class="card card-flush h-xl-100">
                            <!--begin::Header-->
                            <div class="card-header py-7">

                                <!--begin::Statistics-->
                                <div class="m-0">
                                    <!--begin::Heading-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Title-->
                                        <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">5,037</span>
                                        <!--end::Title-->

                                        <!--begin::Label-->
                                        <span class="badge badge-light-success fs-base">
                                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                                    class="path1"></span><span class="path2"></span></i>
                                            2.2%
                                        </span>
                                        <!--end::Label-->

                                    </div>
                                    <!--end::Heading-->

                                    <!--begin::Description-->
                                    <span class="fs-6 fw-semibold text-gray-500">Visits by Social
                                        Networks</span>
                                    <!--end::Description-->
                                </div>
                                <!--end::Statistics-->

                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Menu-->
                                    <button
                                        class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                        data-kt-menu-overflow="true">
                                        <i class="ki-duotone ki-dots-square fs-1 text-gray-500 me-n1"><span
                                                class="path1"></span><span class="path2"></span><span
                                                class="path3"></span><span class="path4"></span></i>
                                    </button>


                                    <!--begin::Menu 2-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">
                                                Quick Actions</div>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu separator-->
                                        <div class="separator mb-3 opacity-75"></div>
                                        <!--end::Menu separator-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                New Ticket
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                New Customer
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                            data-kt-menu-placement="right-start">
                                            <!--begin::Menu item-->
                                            <a href="#" class="menu-link px-3">
                                                <span class="menu-title">New Group</span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <!--end::Menu item-->

                                            <!--begin::Menu sub-->
                                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        Admin Group
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        Staff Group
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        Member Group
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu sub-->
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                New Contact
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu separator-->
                                        <div class="separator mt-3 opacity-75"></div>
                                        <!--end::Menu separator-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3 py-3">
                                                <a class="btn btn-primary  btn-sm px-4" href="#">
                                                    Generate Reports
                                                </a>
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu 2-->

                                    <!--end::Menu-->
                                </div>
                                <!--end::Toolbar-->

                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body card-body d-flex justify-content-between flex-column pt-3">

                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Flag-->
                                    <img src="https://preview.keenthemes.com/metronic8/demo9/assets/media/svg/brand-logos/dribbble-icon-1.svg"
                                        class="me-4 w-30px" style="border-radius: 4px" alt="" />
                                    <!--end::Flag-->

                                    <!--begin::Section-->
                                    <div
                                        class="d-flex align-items-center flex-stack flex-wrap flex-row-fluid d-grid gap-2">
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <a href="#"
                                                class="text-gray-800 fw-bold text-hover-primary fs-6">Dribbble</a>
                                            <!--end::Title-->

                                            <!--begin::Desc-->
                                            <span
                                                class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Community</span>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Content-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Number-->
                                            <span class="text-gray-800 fw-bold fs-4 me-3">579</span>

                                            <!--end::Number-->

                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <!--begin::Label-->
                                                <span class="badge badge-light-success fs-base">
                                                    <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                    2.6%
                                                </span>
                                                <!--end::Label-->

                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->


                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-3"></div>
                                <!--end::Separator-->


                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Flag-->
                                    <img src="https://preview.keenthemes.com/metronic8/demo9/assets/media/svg/brand-logos/linkedin-1.svg"
                                        class="me-4 w-30px" style="border-radius: 4px" alt="" />
                                    <!--end::Flag-->

                                    <!--begin::Section-->
                                    <div
                                        class="d-flex align-items-center flex-stack flex-wrap flex-row-fluid d-grid gap-2">
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Linked
                                                In</a>
                                            <!--end::Title-->

                                            <!--begin::Desc-->
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Social
                                                Media</span>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Content-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Number-->
                                            <span class="text-gray-800 fw-bold fs-4 me-3">1,088</span>

                                            <!--end::Number-->

                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <!--begin::Label-->
                                                <span class="badge badge-light-danger fs-base">
                                                    <i class="ki-duotone ki-arrow-down fs-5 text-danger ms-n1"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                    0.4%
                                                </span>
                                                <!--end::Label-->

                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->


                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-3"></div>
                                <!--end::Separator-->


                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Flag-->
                                    <img src="https://preview.keenthemes.com/metronic8/demo9/assets/media/svg/brand-logos/slack-icon.svg"
                                        class="me-4 w-30px" style="border-radius: 4px" alt="" />
                                    <!--end::Flag-->

                                    <!--begin::Section-->
                                    <div
                                        class="d-flex align-items-center flex-stack flex-wrap flex-row-fluid d-grid gap-2">
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <a href="#"
                                                class="text-gray-800 fw-bold text-hover-primary fs-6">Slack</a>
                                            <!--end::Title-->

                                            <!--begin::Desc-->
                                            <span
                                                class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Messanger</span>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Content-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Number-->
                                            <span class="text-gray-800 fw-bold fs-4 me-3">794</span>

                                            <!--end::Number-->

                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <!--begin::Label-->
                                                <span class="badge badge-light-success fs-base">
                                                    <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                    0.2%
                                                </span>
                                                <!--end::Label-->

                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->


                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-3"></div>
                                <!--end::Separator-->


                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Flag-->
                                    <img src="https://preview.keenthemes.com/metronic8/demo9/assets/media/svg/brand-logos/youtube-3.svg"
                                        class="me-4 w-30px" style="border-radius: 4px" alt="" />
                                    <!--end::Flag-->

                                    <!--begin::Section-->
                                    <div
                                        class="d-flex align-items-center flex-stack flex-wrap flex-row-fluid d-grid gap-2">
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <a href="#"
                                                class="text-gray-800 fw-bold text-hover-primary fs-6">YouTube</a>
                                            <!--end::Title-->

                                            <!--begin::Desc-->
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Video
                                                Channel</span>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Content-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Number-->
                                            <span class="text-gray-800 fw-bold fs-4 me-3">978</span>

                                            <!--end::Number-->

                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <!--begin::Label-->
                                                <span class="badge badge-light-success fs-base">
                                                    <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                    4.1%
                                                </span>
                                                <!--end::Label-->

                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->


                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-3"></div>
                                <!--end::Separator-->


                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Flag-->
                                    <img src="https://preview.keenthemes.com/metronic8/demo9/assets/media/svg/brand-logos/instagram-2-1.svg"
                                        class="me-4 w-30px" style="border-radius: 4px" alt="" />
                                    <!--end::Flag-->

                                    <!--begin::Section-->
                                    <div
                                        class="d-flex align-items-center flex-stack flex-wrap flex-row-fluid d-grid gap-2">
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <a href="#"
                                                class="text-gray-800 fw-bold text-hover-primary fs-6">Instagram</a>
                                            <!--end::Title-->

                                            <!--begin::Desc-->
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Social
                                                Network</span>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Content-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Number-->
                                            <span class="text-gray-800 fw-bold fs-4 me-3">1,458</span>

                                            <!--end::Number-->

                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <!--begin::Label-->
                                                <span class="badge badge-light-success fs-base">
                                                    <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                    8.3%
                                                </span>
                                                <!--end::Label-->

                                            </div>
                                            <!--end::Info-->
                                        </div>







                                    </div>
                                    <!--end::Container-->
                                </div>
                                <!--end::Content-->


                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Page-->
                    </div>
                    <!--end::Root-->




                    <!--end::Menu item-->
                </div>
            @elseif (Auth::user()->role_id == 1)
                <div class="row gx-5 gx-xl-10 mb-xl-10">
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-10">

                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center border-0 h-md-50 mb-5 mb-xl-10"
                            style="background-color: #080655">
                            <div class="card-header pt-5">
                                <div class="card-title d-flex flex-column">
                                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ $totalAudioCount }}</span>

                                    <span class="text-white opacity-50 pt-1 fw-semibold fs-6">Uploaded Songs</span>
                                </div>
                            </div>

                            <div class="card-body d-flex align-items-end pt-0">
                                <div class="d-flex align-items-center flex-column mt-3 w-100">
                                    <div
                                        class="d-flex justify-content-between fw-bold fs-6 text-white opacity-50 w-100 mt-auto mb-2">
                                        <span>{{ $notAprovedSong }} Pending for Approval</span>
                                        <span>{{ $percentage_not_approved_song }}%</span>
                                    </div>

                                    <div class="h-8px mx-3 w-100 bg-light-danger rounded">
                                        <div class="bg-danger rounded h-8px" role="progressbar"
                                            style="width: {{ $percentage_not_approved_song }}%;" aria-valuenow="50"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                            <div class="card-header pt-5">
                                <div class="card-title d-flex flex-column">
                                    <span
                                        class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ $total_artist->count() }}</span>
                                    <span class="text-gray-500 pt-1 fw-semibold fs-6">Artists</span>
                                </div>
                            </div>

                            <div class="card-body d-flex flex-column justify-content-end pe-0">
                                <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Active Artists</span>

                                <div class="symbol-group symbol-hover flex-nowrap">
                                    @foreach ($total_artist->take(6) as $artist)
                                    <a href="{{route('admin.user_profile_show', $artist->id)}}">
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                            title="{{ $artist->artist_name }}">
                                            @if ($artist->profile_picture)
                                                <img alt="{{ $artist->artist_name }}"
                                                    src="{{ asset('storage/profile_pictures/' . $artist->profile_picture) }}" />
                                            @else
                                                <span
                                                    class="symbol-label bg-{{ collect(['primary', 'warning', 'danger', 'success', 'info'])->random() }}
                                                  text-inverse-{{ collect(['primary', 'warning', 'danger', 'success', 'info'])->random() }} fw-bold">
                                                    {{ substr($artist->artist_name, 0, 1) }}
                                                </span>
                                            @endif
                                        </div>
                                    </a>
                                    @endforeach

                                    @if ($total_artist->count() > 6)
                                        <a href="{{ route('admin.show_users') }}"
                                            class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-dark text-gray-300 fs-8 fw-bold">
                                                +{{ $total_artist->count() - 6 }}
                                            </span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-10">

                        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                            <div class="card-header pt-5">
                                <div class="card-title d-flex flex-column">
                                    <div class="d-flex align-items-center">
                                        <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start">TZS</span>

                                        <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">69,700</span>

                                        <span class="badge badge-light-success fs-base">
                                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                                    class="path1"></span><span class="path2"></span></i>
                                            2.2%
                                        </span>
                                    </div>

                                    <span class="text-gray-500 pt-1 fw-semibold fs-6">Artists Earnings in
                                        April</span>
                                </div>
                            </div>

                            <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
                                <div class="d-flex flex-center me-5 pt-2">
                                    <div id="kt_card_widget_17_chart" style="min-width: 70px; min-height: 70px"
                                        data-kt-size="70" data-kt-line="11">
                                    </div>
                                </div>

                                <div class="d-flex flex-column content-justify-center flex-row-fluid">
                                    <div class="d-flex fw-semibold align-items-center">
                                        <div class="bullet w-8px h-3px rounded-2 bg-success me-3"></div>

                                        <div class="text-gray-500 flex-grow-1 me-4">Radio</div>

                                        <div class="fw-bolder text-gray-700 text-xxl-end">Tzs 7,660</div>
                                    </div>

                                    <div class="d-flex fw-semibold align-items-center my-3">
                                        <div class="bullet w-8px h-3px rounded-2 bg-primary me-3"></div>

                                        <div class="text-gray-500 flex-grow-1 me-4">TV</div>

                                        <div class="fw-bolder text-gray-700 text-xxl-end">Tzs 2,820</div>
                                    </div>

                                    <div class="d-flex fw-semibold align-items-center">
                                        <div class="bullet w-8px h-3px rounded-2 me-3" style="background-color: #E4E6EF">
                                        </div>

                                        <div class="text-gray-500 flex-grow-1 me-4">Others</div>

                                        <div class=" fw-bolder text-gray-700 text-xxl-end">Tzs 45,257</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-flush h-lg-50">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <h3 class="card-title text-gray-800">Highlights</h3>
                                <!--end::Title-->

                                <!--begin::Toolbar-->
                                <div class="card-toolbar d-none">
                                    <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
                                    <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left"
                                        class="btn btn-sm btn-light d-flex align-items-center px-4">
                                        <!--begin::Display range-->
                                        <div class="text-gray-600 fw-bold">
                                            Loading date range...
                                        </div>
                                        <!--end::Display range-->

                                        <i class="ki-duotone ki-calendar-8 fs-1 ms-2 me-0"><span
                                                class="path1"></span><span class="path2"></span><span
                                                class="path3"></span><span class="path4"></span><span
                                                class="path5"></span><span class="path6"></span></i>
                                    </div>
                                    <!--end::Daterangepicker-->
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-5">
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Section-->
                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Avg. Client Rating</div>
                                    <!--end::Section-->

                                    <!--begin::Statistics-->
                                    <div class="d-flex align-items-senter">
                                        <i class="ki-duotone ki-arrow-up-right fs-2 text-success me-2"><span
                                                class="path1"></span><span class="path2"></span></i>

                                        <!--begin::Number-->
                                        <span class="text-gray-900 fw-bolder fs-6">7.8</span>
                                        <!--end::Number-->

                                        <span class="text-gray-500 fw-bold fs-6">/10</span>
                                    </div>
                                    <!--end::Statistics-->
                                </div>
                                <!--end::Item-->

                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-3"></div>
                                <!--end::Separator-->

                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Section-->
                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Avg. Quotes</div>
                                    <!--end::Section-->

                                    <!--begin::Statistics-->
                                    <div class="d-flex align-items-senter">
                                        <i class="ki-duotone ki-arrow-down-right fs-2 text-danger me-2"><span
                                                class="path1"></span><span class="path2"></span></i>

                                        <!--begin::Number-->
                                        <span class="text-gray-900 fw-bolder fs-6">730</span>
                                        <!--end::Number-->


                                    </div>
                                    <!--end::Statistics-->
                                </div>
                                <!--end::Item-->

                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-3"></div>
                                <!--end::Separator-->

                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Section-->
                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Avg. Agent Earnings</div>
                                    <!--end::Section-->

                                    <!--begin::Statistics-->
                                    <div class="d-flex align-items-senter">
                                        <i class="ki-duotone ki-arrow-up-right fs-2 text-success me-2"><span
                                                class="path1"></span><span class="path2"></span></i>

                                        <!--begin::Number-->
                                        <span class="text-gray-900 fw-bolder fs-6">$2,309</span>
                                        <!--end::Number-->


                                    </div>
                                    <!--end::Statistics-->
                                </div>
                                <!--end::Item-->



                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::LIst widget 25-->


                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-lg-12 col-xl-12 col-xxl-6 mb-10 mb-xl-0">

                        <!--begin::Timeline widget 3-->
                        <div class="card h-md-100">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-900">What’s up Today</span>

                                    <span class="text-muted mt-1 fw-semibold fs-7">Total 424,567
                                        deliveries</span>
                                </h3>

                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-sm btn-light">Report Cecnter</a>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-7 px-0">
                                <!--begin::Nav-->
                                <ul
                                    class="nav nav-stretch nav-pills nav-pills-custom nav-pills-active-custom d-flex justify-content-between mb-8 px-5">
                                    <!--begin::Nav item-->
                                    <li class="nav-item p-0 ms-0">
                                        <!--begin::Date-->
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger "
                                            data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_1">
                                            <span class="fs-7 fw-semibold">Fr</span>
                                            <span class="fs-6 fw-bold">20</span>
                                        </a>
                                        <!--end::Date-->
                                    </li>
                                    <!--end::Nav item-->
                                    <!--begin::Nav item-->
                                    <li class="nav-item p-0 ms-0">
                                        <!--begin::Date-->
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger "
                                            data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_2">
                                            <span class="fs-7 fw-semibold">Sa</span>
                                            <span class="fs-6 fw-bold">21</span>
                                        </a>
                                        <!--end::Date-->
                                    </li>
                                    <!--end::Nav item-->
                                    <!--begin::Nav item-->
                                    <li class="nav-item p-0 ms-0">
                                        <!--begin::Date-->
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger "
                                            data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_3">
                                            <span class="fs-7 fw-semibold">Su</span>
                                            <span class="fs-6 fw-bold">22</span>
                                        </a>
                                        <!--end::Date-->
                                    </li>
                                    <!--end::Nav item-->
                                    <!--begin::Nav item-->
                                    <li class="nav-item p-0 ms-0">
                                        <!--begin::Date-->
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger active"
                                            data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_4">
                                            <span class="fs-7 fw-semibold">Tu</span>
                                            <span class="fs-6 fw-bold">23</span>
                                        </a>
                                        <!--end::Date-->
                                    </li>
                                    <!--end::Nav item-->
                                    <!--begin::Nav item-->
                                    <li class="nav-item p-0 ms-0">
                                        <!--begin::Date-->
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger "
                                            data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_5">
                                            <span class="fs-7 fw-semibold">Tu</span>
                                            <span class="fs-6 fw-bold">24</span>
                                        </a>
                                        <!--end::Date-->
                                    </li>
                                    <!--end::Nav item-->
                                    <!--begin::Nav item-->
                                    <li class="nav-item p-0 ms-0">
                                        <!--begin::Date-->
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger "
                                            data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_6">
                                            <span class="fs-7 fw-semibold">We</span>
                                            <span class="fs-6 fw-bold">25</span>
                                        </a>
                                        <!--end::Date-->
                                    </li>
                                    <!--end::Nav item-->
                                    <!--begin::Nav item-->
                                    <li class="nav-item p-0 ms-0">
                                        <!--begin::Date-->
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger "
                                            data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_7">
                                            <span class="fs-7 fw-semibold">Th</span>
                                            <span class="fs-6 fw-bold">26</span>
                                        </a>
                                        <!--end::Date-->
                                    </li>
                                    <!--end::Nav item-->
                                    <!--begin::Nav item-->
                                    <li class="nav-item p-0 ms-0">
                                        <!--begin::Date-->
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger "
                                            data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_8">
                                            <span class="fs-7 fw-semibold">Fri</span>
                                            <span class="fs-6 fw-bold">27</span>
                                        </a>
                                        <!--end::Date-->
                                    </li>
                                    <!--end::Nav item-->
                                    <!--begin::Nav item-->
                                    <li class="nav-item p-0 ms-0">
                                        <!--begin::Date-->
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger "
                                            data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_9">
                                            <span class="fs-7 fw-semibold">Sa</span>
                                            <span class="fs-6 fw-bold">28</span>
                                        </a>
                                        <!--end::Date-->
                                    </li>
                                    <!--end::Nav item-->
                                    <!--begin::Nav item-->
                                    <li class="nav-item p-0 ms-0">
                                        <!--begin::Date-->
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger "
                                            data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_10">
                                            <span class="fs-7 fw-semibold">Su</span>
                                            <span class="fs-6 fw-bold">29</span>
                                        </a>
                                        <!--end::Date-->
                                    </li>
                                    <!--end::Nav item-->
                                    <!--begin::Nav item-->
                                    <li class="nav-item p-0 ms-0">
                                        <!--begin::Date-->
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger "
                                            data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_11">
                                            <span class="fs-7 fw-semibold">Mo</span>
                                            <span class="fs-6 fw-bold">30</span>
                                        </a>
                                        <!--end::Date-->
                                    </li>
                                    <!--end::Nav item-->

                                </ul>
                                <!--end::Nav-->

                                <!--begin::Tab Content (ishlamayabdi)-->
                                <div class="tab-content mb-2 px-9">
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade " id="kt_timeline_widget_3_tab_content_1">

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-success"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Peter
                                                        Marcus</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Dashboard UI/UX Design Review </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Lead
                                                        by Bob</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        PM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Lead
                                                        by Mark Morris</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade " id="kt_timeline_widget_3_tab_content_2">

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        PM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Lead
                                                        by Mark Morris</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Peter
                                                        Marcus</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-success"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Peter
                                                        Marcus</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade " id="kt_timeline_widget_3_tab_content_3">

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-primary"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Peter
                                                        Marcus</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Lead
                                                        by Bob</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        PM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Lead
                                                        by Mark Morris</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade show active" id="kt_timeline_widget_3_tab_content_4">

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Peter
                                                        Marcus</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        PM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Dashboard UI/UX Design Review </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Lead
                                                        by Bob</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-success"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Lead
                                                        by Mark Morris</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade " id="kt_timeline_widget_3_tab_content_5">

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-danger"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Dashboard UI/UX Design Review </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Lead
                                                        by Bob</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Lead
                                                        by Mark Morris</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        PM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Peter
                                                        Marcus</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade " id="kt_timeline_widget_3_tab_content_6">

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Lead
                                                        by Mark Morris</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-primary"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        PM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Peter
                                                        Marcus</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Dashboard UI/UX Design Review </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Lead
                                                        by Bob</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade " id="kt_timeline_widget_3_tab_content_7">

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Lead
                                                        by Bob</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-danger"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Dashboard UI/UX Design Review </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Peter
                                                        Marcus</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-success"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        PM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Lead
                                                        by Mark Morris</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade " id="kt_timeline_widget_3_tab_content_8">

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-success"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        PM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Peter
                                                        Marcus</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Lead
                                                        by Mark Morris</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-danger"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Dashboard UI/UX Design Review </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Lead
                                                        by Bob</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade " id="kt_timeline_widget_3_tab_content_9">

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Lead
                                                        by Bob</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-primary"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        PM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Lead
                                                        by Mark Morris</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-success"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Dashboard UI/UX Design Review </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Peter
                                                        Marcus</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade " id="kt_timeline_widget_3_tab_content_10">

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-danger"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Peter
                                                        Marcus</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Dashboard UI/UX Design Review </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Lead
                                                        by Bob</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        PM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Lead
                                                        by Mark Morris</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade " id="kt_timeline_widget_3_tab_content_11">

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        PM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Dashboard UI/UX Design Review </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Lead
                                                        by Mark Morris</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-danger"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Peter
                                                        Marcus</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Bullet-->
                                            <span data-kt-element="bullet"
                                                class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-primary"></span>
                                            <!--end::Bullet-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 me-5">
                                                <!--begin::Time-->
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7">
                                                        AM </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Description-->
                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting </div>
                                                <!--end::Description-->

                                                <!--begin::Link-->
                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="text-primary opacity-75-hover fw-semibold">Lead
                                                        by Bob</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_create_project">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Tap pane-->

                                </div>
                                <!--end::Tab Content-->

                                <!--begin::Action-->
                                <div class="float-end d-none">
                                    <a href="#" class="btn btn-sm btn-light me-2" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_create_project">Add Lesson</a>

                                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_create_app">Call Sick for Today</a>
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end: Card Body-->
                        </div>
                        <!--end::Timeline widget 3-->




                        <!--begin::Timeline widget 3-->
                        <div class="card card-flush d-none h-md-100">
                            <!--begin::Card header-->
                            <div class="card-header mt-6">
                                <!--begin::Card title-->
                                <div class="card-title flex-column">
                                    <h3 class="fw-bold mb-1">What's on the road?</h3>

                                    <div class="fs-6 text-gray-500">Total 482 participants</div>
                                </div>
                                <!--end::Card title-->

                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Select-->
                                    <select name="status" data-control="select2" data-hide-search="true"
                                        class="form-select form-select-solid form-select-sm fw-bold w-100px">
                                        <option value="1" selected>Options</option>
                                        <option value="2">Option 1</option>
                                        <option value="3">Option 2</option>
                                        <option value="4">Option 3</option>
                                    </select>
                                    <!--end::Select-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->

                            <!--begin::Card body-->
                            <div class="card-body p-0">
                                <!--begin::Dates-->
                                <ul class="nav nav-pills d-flex flex-nowrap hover-scroll-x py-2 ms-4">

                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                            data-bs-toggle="tab" href="#kt_schedule_day_0">

                                            <span class="text-gray-500 fs-7 fw-semibold">Fr</span>
                                            <span class="fs-6 text-gray-800 fw-bold">20</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->

                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                            data-bs-toggle="tab" href="#kt_schedule_day_1">

                                            <span class="text-gray-500 fs-7 fw-semibold">Sa</span>
                                            <span class="fs-6 text-gray-800 fw-bold">21</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->

                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                            data-bs-toggle="tab" href="#kt_schedule_day_2">

                                            <span class="text-gray-500 fs-7 fw-semibold">Su</span>
                                            <span class="fs-6 text-gray-800 fw-bold">22</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->

                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger active"
                                            data-bs-toggle="tab" href="#kt_schedule_day_3">

                                            <span class="text-gray-500 fs-7 fw-semibold">Mo</span>
                                            <span class="fs-6 text-gray-800 fw-bold">23</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->

                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                            data-bs-toggle="tab" href="#kt_schedule_day_4">

                                            <span class="text-gray-500 fs-7 fw-semibold">Tu</span>
                                            <span class="fs-6 text-gray-800 fw-bold">24</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->

                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                            data-bs-toggle="tab" href="#kt_schedule_day_5">

                                            <span class="text-gray-500 fs-7 fw-semibold">We</span>
                                            <span class="fs-6 text-gray-800 fw-bold">25</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->

                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                            data-bs-toggle="tab" href="#kt_schedule_day_6">

                                            <span class="text-gray-500 fs-7 fw-semibold">Th</span>
                                            <span class="fs-6 text-gray-800 fw-bold">26</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->

                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                            data-bs-toggle="tab" href="#kt_schedule_day_7">

                                            <span class="text-gray-500 fs-7 fw-semibold">Fr</span>
                                            <span class="fs-6 text-gray-800 fw-bold">27</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->

                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                            data-bs-toggle="tab" href="#kt_schedule_day_8">

                                            <span class="text-gray-500 fs-7 fw-semibold">Sa</span>
                                            <span class="fs-6 text-gray-800 fw-bold">28</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->

                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                            data-bs-toggle="tab" href="#kt_schedule_day_9">

                                            <span class="text-gray-500 fs-7 fw-semibold">Su</span>
                                            <span class="fs-6 text-gray-800 fw-bold">29</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->

                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                            data-bs-toggle="tab" href="#kt_schedule_day_10">

                                            <span class="text-gray-500 fs-7 fw-semibold">Mo</span>
                                            <span class="fs-6 text-gray-800 fw-bold">30</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->

                                    <!--begin::Date-->
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                            data-bs-toggle="tab" href="#kt_schedule_day_11">

                                            <span class="text-gray-500 fs-7 fw-semibold">Tu</span>
                                            <span class="fs-6 text-gray-800 fw-bold">31</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->
                                </ul>
                                <!--end::Dates-->

                                <!--begin::Tab Content-->
                                <div class="tab-content px-9">
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_0" class="tab-pane fade show ">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Weekly Team Stand-Up </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">David Stevenson</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    16:30 - 17:30

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Lunch & Learn Catch Up </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">David Stevenson</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    16:30 - 17:30

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Weekly Team Stand-Up </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Michael Walters</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_1" class="tab-pane fade show active">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    11:00 - 11:45

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Team Backlog Grooming Session </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Yannis Gloverson</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    12:00 - 13:00

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Team Backlog Grooming Session </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Karina Clarke</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    9:00 - 10:00

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Sales Pitch Proposal </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">David Stevenson</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_2" class="tab-pane fade show ">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Project Review & Testing </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Walter White</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    9:00 - 10:00

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Development Team Capacity Review </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Terry Robins</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    13:00 - 14:00

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Lunch & Learn Catch Up </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Sean Bean</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_3" class="tab-pane fade show ">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    11:00 - 11:45

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Committee Review Approvals </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Bob Harris</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    10:00 - 11:00

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Sales Pitch Proposal </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Mark Randall</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Weekly Team Stand-Up </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Michael Walters</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_4" class="tab-pane fade show ">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    12:00 - 13:00

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Sales Pitch Proposal </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Walter White</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    16:30 - 17:30

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Sales Pitch Proposal </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Yannis Gloverson</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Creative Content Initiative </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Bob Harris</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_5" class="tab-pane fade show ">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    12:00 - 13:00

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Lunch & Learn Catch Up </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Kendell Trevor</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Committee Review Approvals </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Caleb Donaldson</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    12:00 - 13:00

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Sales Pitch Proposal </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Kendell Trevor</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_6" class="tab-pane fade show ">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Creative Content Initiative </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Mark Randall</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    13:00 - 14:00

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Team Backlog Grooming Session </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Michael Walters</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    11:00 - 11:45

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Project Review & Testing </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Sean Bean</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_7" class="tab-pane fade show ">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    11:00 - 11:45

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Project Review & Testing </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Naomi Hayabusa</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    16:30 - 17:30

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Lunch & Learn Catch Up </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">David Stevenson</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    12:00 - 13:00

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Weekly Team Stand-Up </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Michael Walters</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_8" class="tab-pane fade show ">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    13:00 - 14:00

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Marketing Campaign Discussion </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Sean Bean</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Development Team Capacity Review </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Terry Robins</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    11:00 - 11:45

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Weekly Team Stand-Up </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Michael Walters</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_9" class="tab-pane fade show ">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    11:00 - 11:45

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    9 Degree Project Estimation Meeting </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Peter Marcus</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    12:00 - 13:00

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Development Team Capacity Review </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Yannis Gloverson</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    9:00 - 10:00

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Development Team Capacity Review </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Kendell Trevor</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_10" class="tab-pane fade show ">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    16:30 - 17:30

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Sales Pitch Proposal </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Yannis Gloverson</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Creative Content Initiative </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Kendell Trevor</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    16:30 - 17:30

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Dashboard UI/UX Design Review </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Mark Randall</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_11" class="tab-pane fade show ">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    10:00 - 11:00

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Development Team Capacity Review </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Karina Clarke</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    9:00 - 10:00

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Lunch & Learn Catch Up </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Naomi Hayabusa</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                            </div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    10:00 - 11:00

                                                    <span class="fs-7 text-gray-500 text-uppercase">
                                                        am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                    Committee Review Approvals </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">
                                                    Lead by <a href="#">Yannis Gloverson</a>
                                                </div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                </div>
                                <!--end::Tab Content-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Timeline widget-3-->
                    </div>
                    <!--end::Col-->
                </div>
            @endif
            <!--end::Menu-->
        </div>
        <!--end::View menu-->
    </div>
    <!--end::Modal header-->
@endsection
