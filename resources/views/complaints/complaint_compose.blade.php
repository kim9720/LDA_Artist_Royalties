@extends('layouts.app')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
          <div class=" container-xxl " id="kt_content_container">
            <div class="d-flex flex-column flex-lg-row">
                @include('complaints.includes.complaint_side_menu')

                <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h2 class="card-title m-0">
                                Compose Message
                            </h2>
                        </div>
                        <div class="card-body p-0">
                            <form id="kt_inbox_compose_form" data-route="{{ route('complaints.store') }}">
                                <div class="d-block">
                                    <div class="d-flex align-items-center border-bottom px-8 min-h-50px">
                                        <div class="text-gray-900 fw-bold w-75px">
                                            Subject:
                                        </div>
                                        <div class="border-bottom">
                                            <input
                                                class="form-control form-control-transparent border-0 px-8 min-h-45px"
                                                name="compose_subject" placeholder="Write your Subject" />
                                        </div>
                                    </div>

                                    <div id="kt_inbox_form_editor"
                                        class="bg-transparent border-0 h-350px px-3">
                                    </div>

                                    <div class="dropzone dropzone-queue px-8 py-4"
                                        id="kt_inbox_reply_attachments" data-kt-inbox-form="dropzone">
                                        <div class="dropzone-items">
                                            <div class="dropzone-item" style="display:none">
                                                <div class="dropzone-file">
                                                    <div class="dropzone-filename"
                                                        title="some_image_file_name.jpg">
                                                        <span data-dz-name>some_image_file_name.jpg</span>
                                                        <strong>(<span data-dz-size>340kb</span>)</strong>
                                                    </div>
                                                    <div class="dropzone-error" data-dz-errormessage></div>
                                                </div>

                                                <div class="dropzone-progress">
                                                    <div class="progress bg-gray-300">
                                                        <div class="progress-bar bg-primary"
                                                            role="progressbar" aria-valuemin="0"
                                                            aria-valuemax="100" aria-valuenow="0"
                                                            data-dz-uploadprogress></div>
                                                    </div>
                                                </div>

                                                <div class="dropzone-toolbar">
                                                    <span class="dropzone-delete" data-dz-remove>
                                                        <i class="ki-duotone ki-cross fs-2"><span
                                                                class="path1"></span><span
                                                                class="path2"></span></i> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-stack flex-wrap gap-2 py-5 ps-8 pe-5 border-top">
                                    <div class="d-flex align-items-center me-3">
                                        <div class="btn-group me-4">
                                            <span class="btn btn-primary fs-bold px-6"
                                                data-kt-inbox-form="send">
                                                <span class="indicator-label">
                                                    Send
                                                </span>
                                                <span class="indicator-progress">
                                                    Please wait... <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </span>
                                        </div>

                                        <span
                                            class="btn btn-icon btn-sm btn-clean btn-active-light-primary me-2"
                                            id="kt_inbox_reply_attachments_select"
                                            data-kt-inbox-form="dropzone_upload">
                                            <i class="fa fa-paperclip fs-2 m-0"></i> </span>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <span
                                            class="btn btn-icon btn-sm btn-clean btn-active-light-primary me-2"
                                            data-toggle="tooltip" title="More actions">
                                            <i class="ki-duotone ki-setting-2 fs-2"><span
                                                    class="path1"></span><span class="path2"></span></i>
                                        </span>

                                        <span class="btn btn-icon btn-sm btn-clean btn-active-light-primary"
                                            data-inbox="dismiss" data-toggle="tooltip"
                                            title="Dismiss reply">
                                            <i class="ki-duotone ki-trash fs-2"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span><span class="path4"></span><span
                                                    class="path5"></span></i> </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>




        </div>
    </div>
@endsection
