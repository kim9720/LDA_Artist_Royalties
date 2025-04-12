@extends('layouts.app')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
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
                                            class="path2"></span></i>
                                </a>
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
                                <h2 class="fw-bold me-3 my-1">
                                    <span class="badge badge-lg badge-secondary">SUBJECT: </span>
                                    <span style="border-bottom: 2px dashed rgb(209, 207, 207); text-decoration:black;">
                                        {{ $complaint->subject }}
                                    </span>
                                </h2>

                                <div class="collapse fade show" data-kt-inbox-message="message">
                                    <div class="py-5">
                                        {!! $complaint->content !!}
                                    </div>
                                </div>
                            </div>

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

                                @if (Auth::user()->role_id == 1)
                                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                            <a href="{{ route('complaints.mark_read', $complaint->id) }}"
                                                class="btn btn-light-primary"
                                                id="mark-read-btn"
                                                data-kt-menu-trigger="click"
                                                data-kt-menu-placement="bottom-end">
                                                <span class="indicator-label">
                                                    <i class="fa-solid fa-check fs-2"></i>
                                                    Mark as Read
                                                </span>
                                                <span class="indicator-progress d-none">
                                                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="separator my-6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('toast'))
    <div id="toast-notification"
         role="alert"
         aria-live="assertive"
         class="fixed top-5 right-5 z-50 transition-all duration-500 transform translate-x-full will-change-transform">
        <div class="flex items-center p-4 rounded-lg shadow-lg
            @if (session('toast.type') === 'success') bg-green-500 @else bg-red-500 @endif
            text-white">
            <span class="mr-2">
                @if (session('toast.type') === 'success')
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                @else
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                @endif
            </span>
            {{ session('toast.message') }}
        </div>
    </div>
    @endif


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('swal'))
                Swal.fire({
                    icon: '{{ session('swal.type') }}',
                    title: '{{ session('swal.title') }}',
                    text: '{{ session('swal.text') }}',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    toast: true,
                    background: '{{ session('swal.type') === 'success' ? '#d1e7ff' : '#f27474' }}',                    color: 'white',
                    iconColor: 'white'
                });
            @endif

            const markReadBtn = document.getElementById('mark-read-btn');
            if (markReadBtn) {
                markReadBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const url = this.href;

                    Swal.fire({
                        title: 'Confirm Action',
                        text: 'Are you sure you want to mark this complaint as read?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, mark as read!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const indicatorLabel = this.querySelector('.indicator-label');
                            const indicatorProgress = this.querySelector('.indicator-progress');

                            if (indicatorLabel && indicatorProgress) {
                                indicatorLabel.classList.add('d-none');
                                indicatorProgress.classList.remove('d-none');
                            }

                            window.location.href = url;
                        }
                    });
                });
            }
        });
    </script>
@endsection
