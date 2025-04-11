@extends('layouts.app')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class=" container-xxl " id="kt_content_container">
            <div class="d-flex flex-column flex-lg-row">
                @include('complaints.includes.complaint_side_menu')
                <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                    <div class="card">
                        <div class="card-header align-items-center py-5 gap-5">
                            <div class="d-flex">
                                <a href="{{ route('complaints.show') }}"
                                    class="btn btn-sm btn-icon btn-clear btn-active-light-primary me-3"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Back">
                                    <i class="fa fa-arrow-left fs-1 m-0"><span class="path1"></span><span
                                            class="path2"></span></i> </a>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="d-flex flex-wrap gap-2 justify-content-between mb-8">
                                <div class="d-flex align-items-center flex-wrap gap-2">

                                    <div class="d-flex flex-wrap gap-2 flex-stack cursor-pointer"
                                        data-kt-inbox-message="header">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50 me-4">
                                                <span class="symbol-label"
                                                    style="background-image:url({{ asset('storage/profile_pictures/' . $complaint->user->profile_picture) }});"></span>
                                            </div>

                                            <div class="pe-5">
                                                <div class="d-flex align-items-center flex-wrap gap-1">
                                                    <a href="#"
                                                        class="fw-bold text-gray-900 text-hover-primary">{{ $complaint->user->name }}</a>
                                                    <i class="fa fa-user fs-7 text-success mx-3"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                    <span
                                                        class="text-muted fw-bold">{{ \Carbon\Carbon::parse($complaint->created_at)->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center ms-auto">
                                            <span class="fw-semibold text-muted text-end me-3">
                                                {{ \Carbon\Carbon::parse($complaint->created_at)->format('d M Y, g:i a') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div data-kt-inbox-message="message_wrapper">

                                <h2 class="fw-bold me-3 my-1"><span class="badge badge-lg badge-secondary">SUBJECT:->
                                    </span><span
                                        style="border-bottom: 2px dashed rgb(209, 207, 207); text-decoration:black;">
                                        {{ $complaint->subject }}
                                    </span></h2>

                                <div class="collapse fade show" data-kt-inbox-message="message">
                                    <div class="py-5">
                                        {!! $complaint->content !!}
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="separator my-6"></div> --}}
                            <hr>

                            <div data-kt-inbox-message="message_wrapper">
                                <div class="d-flex flex-wrap gap-2 flex-stack cursor-pointer"
                                    data-kt-inbox-message="header">
                                    <!-- Attachments Section -->
                                    <div class="mt-4">
                                        @if ($complaint->getAttachments->count() > 0)
                                            <div class="fw-bold mb-2">Attachments
                                                ({{ $complaint->getAttachments->count() }})</div>
                                            <div class="d-flex flex-wrap gap-3">
                                                @foreach ($complaint->getAttachments as $attachment)
                                                    <div class="attachment-item">
                                                        @if (str_starts_with($attachment->mime_type, 'image/'))
                                                            <div class="symbol symbol-100px symbol-2by3">
                                                                <img src="{{ asset('storage/' . $attachment->url) }}"
                                                                    alt="{{ $attachment->original_name }}" class="rounded">
                                                            </div>
                                                        @else
                                                            <div class="symbol symbol-100px symbol-2by3 bg-light-primary">
                                                                <div class="symbol-label">
                                                                    <i class="fa fa-file fs-2x text-primary"></i>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="mt-2 text-center">
                                                            <a href="{{ asset($attachment->url) }}" target="_blank"
                                                                class="text-hover-primary d-block text-truncate"
                                                                style="max-width: 100px"
                                                                title="{{ $attachment->original_name }}">
                                                                {{ $attachment->original_name }}
                                                            </a>
                                                            <span
                                                                class="text-muted fs-8">{{ round($attachment->size / 1024, 1) }}
                                                                KB</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="text-muted">No attachments</div>
                                        @endif
                                    </div>


                                </div>


                            </div>

                            <div class="separator my-6"></div>



                        </div>
                    </div>
                    <!--end::Card-->

                </div>
                <!--end::Content-->
            </div>
        </div>
    </div>
@endsection
