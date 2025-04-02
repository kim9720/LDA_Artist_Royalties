@extends('layouts.app')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class=" container-xxl " id="kt_content_container">
            <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10"
                style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('../../assets/media/illustrations/sigma-1/4.png')">

                <div class="card-header pt-10">
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-circle me-5">
                            <div class="symbol-label bg-transparent text-primary border border-secondary border-dashed">
                                <i class="fa fa-music fs-2x text-primary"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <h2 class="mb-1">Music Management</h2>
                            <div class="text-muted fw-bold">
                                <a href="{{ route('dashboard') }}">Dashboard</a> <span class="mx-3">|</span> <a
                                    href="{{ route('all_song') }}">Music Management
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body pb-0">
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
                </div>
            </div>
            <div class="card card-flush">
                <div class="card-header pt-8">
                    <div class="card-title">

                        <div class="card-toolbar">

                            <div class="d-flex justify-content-end" data-kt-filemanager-table-toolbar="base">

                                <button type="button" class="btn btn-flex btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_upload">
                                    <i class="fa fa-upload fs-2"><span class="path1"></span><span
                                            class="path2"></span></i> Upload Music
                                </button>
                            </div>

                        </div>
                    </div>
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">

                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end">
                                <i class="fa-solid fa-file-export fs-2"> </i><span class="path1"></span><span
                                    class="path2"></span>
                                Export
                            </button>
                            <div id="kt_datatable_example_export_menu"
                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4"
                                data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-export="copy">
                                        Copy to clipboard
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-export="excel">
                                        Export as Excel
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-export="csv">
                                        Export as CSV
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-export="pdf">
                                        Export as PDF
                                    </a>
                                </div>
                            </div>

                            <div id="kt_datatable_example_buttons" class="d-none"></div>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table align-middle border rounded table-row-dashed fs-6 g-5" id="kt_datatable_example">
                        <thead>

                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase">
                                <th class="min-w-100px">Artist</th>
                                <th class="min-w-100px">Song Name</th>
                                {{-- <th class="min-w-100px">Status</th> --}}
                                <th class="min-w-100px">Uploaded Date</th>
                                {{-- <th class="text-end min-w-75px">No. Listiner</th> --}}
                                <th class="text-end min-w-75px">Audio File</th>
                                <th class="text-end min-w-100px pe-5">Action</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            <tr class="odd">
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>


        <div class="modal fade" id="kt_modal_upload" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="fw-bold">Upload files</h2>

                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                    </div>

                    <div class="modal-body pt-10 pb-15 px-lg-17">
                        <div class="form-group">
                            <div class="dropzone dropzone-queue mb-2" id="kt_modal_upload_dropzone">
                                <div class="dropzone-panel mb-4">
                                    <form action="{{ route('music.upload') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="fv-row mb-8">
                                            <input type="text" placeholder="Song Title" name="song_title"
                                                autocomplete="off" class="form-control bg-transparent" />
                                        </div>
                                        <div class="fv-row mb-8">
                                            <input type="text" placeholder="ISRC Code" name="isrc_code"
                                                autocomplete="off" class="form-control bg-transparent" />
                                        </div>
                                        <div id="uploadFields">
                                            <input type="file" name="music[]" id="musicInput" accept="audio/*" multiple style="display: none;">
                                        </div>
                                        <div id="editFields" style="display: none;">
                                            <input type="file" name="audio_file" id="editMusicInput" accept="audio/*" style="display: none;">
                                        </div>
                                        <button type="button" class="dropzone-select btn btn-sm btn-primary me-2"
                                            onclick="document.getElementById('musicInput').click()">
                                            Attach Files
                                        </button>
                                        <div id="audioPreviews" style="margin-top: 15px;"></div>

                                        <button type="submit" class="btn btn-sm btn-success mt-3">Upload All</button>
                                    </form>
                                </div>


                            </div>
                            {{--
                                <span class="form-text fs-6 text-muted">Max file size is 1MB per
                                    file.</span> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    @if (session('success'))
        <style>
            /* SweetAlert Custom Styling */
            .swal2-popup {
                border-radius: 12px !important;
                max-width: 650px !important;
            }

            .swal2-title {
                font-size: 1.5rem !important;
                color: #2c3e50 !important;
                margin-bottom: 15px !important;
            }

            .swal2-html-container {
                text-align: left !important;
                margin: 1rem 1.5rem !important;
                font-size: 1rem !important;
                color: #34495e !important;
            }

            .swal2-html-container ul {
                padding-left: 0 !important;
                margin: 15px 0 !important;
                list-style-type: none !important;
            }

            .swal2-html-container li {
                margin-bottom: 12px !important;
                padding: 12px !important;
                background-color: #f8f9fa !important;
                border-radius: 8px !important;
                border-left: 4px solid #4e73df !important;
                transition: all 0.3s ease !important;
            }

            .swal2-html-container li:hover {
                background-color: #e9ecef !important;
                transform: translateX(3px);
            }

            .swal2-html-container li strong {
                display: block !important;
                color: #2c3e50 !important;
                font-size: 1.05rem !important;
                margin-bottom: 5px !important;
            }

            .swal2-html-container li div {
                color: #7f8c8d !important;
                font-size: 0.85rem !important;
                display: flex !important;
                flex-wrap: wrap !important;
                gap: 12px !important;
            }

            .swal2-confirm {
                background-color: #4e73df !important;
                border-radius: 6px !important;
                padding: 10px 24px !important;
                font-size: 1rem !important;
            }

            .swal2-confirm:focus {
                box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.3) !important;
            }

            /* Add this to your CSS */
            .swal2-html-container li div::before {
                font-family: 'Font Awesome 5 Free';
                margin-right: 5px;
            }

            .swal2-html-container li div span:nth-child(1)::before {
                content: '\f1c1';
                /* File icon */
            }

            .swal2-html-container li div span:nth-child(2)::before {
                content: '\f0ce';
                /* Type icon */
            }

            .swal2-html-container li div span:nth-child(3)::before {
                content: '\f017';
                /* Duration icon */
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if (session('success'))
                    const uploadedFiles = @json(session('uploaded_files', []));
                    let htmlContent = `<p>@json(session('success'))</p>`;

                    if (uploadedFiles.length > 0) {
                        htmlContent += '<ul style="text-align: left; margin-top: 15px;">';
                        uploadedFiles.forEach(file => {
                            htmlContent += `
                        <li style="margin-bottom: 10px;">
                            <strong>${file.original_name}</strong>
                            <div style="color: #6c757d; font-size: 0.85rem;">
                                Size: ${file.file_size} |
                                Type: ${file.mime_type} |
                                ${file.duration ? 'Duration: ' + file.duration : ''}
                            </div>
                        </li>`;
                        });
                        htmlContent += '</ul>';
                    }

                    Swal.fire({
                        icon: 'success',
                        title: 'Upload Successful',
                        html: htmlContent,
                        confirmButtonText: 'OK',
                        width: '600px'
                    });
                @endif

                @if (session('error_messages'))
                    Swal.fire({
                        icon: 'error',
                        title: 'Upload Errors',
                        html: `<ul>
                        @foreach (session('error_messages') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>`,
                        confirmButtonText: 'OK',
                        width: '600px'
                    });
                @endif
            });
        </script>
    @endif
    <script>
        // Handle file selection for both upload and edit modes
        function handleFileSelection(files, isEditMode = false) {
            const previewsContainer = document.getElementById('audioPreviews');
            previewsContainer.innerHTML = '';

            if (files.length > 0) {
                const heading = document.createElement('p');
                heading.textContent = isEditMode ?
                    'Selected replacement track:' :
                    `Selected ${files.length} track(s):`;
                previewsContainer.appendChild(heading);

                Array.from(files).forEach((file, index) => {
                    const audioURL = URL.createObjectURL(file);

                    const trackPreview = document.createElement('div');
                    trackPreview.className = 'track-preview';
                    trackPreview.style.marginBottom = '15px';
                    trackPreview.style.padding = '10px';
                    trackPreview.style.border = '1px solid #ddd';
                    trackPreview.style.borderRadius = '5px';

                    const fileName = document.createElement('p');
                    fileName.textContent = isEditMode ?
                        file.name :
                        `${index + 1}. ${file.name}`;
                    fileName.style.marginBottom = '5px';
                    fileName.style.fontWeight = 'bold';

                    const player = document.createElement('audio');
                    player.src = audioURL;
                    player.controls = true;
                    player.style.width = '100%';

                    player.onended = function() {
                        URL.revokeObjectURL(audioURL);
                    };

                    // For edit mode, show current file info if available
                    if (isEditMode && currentFileInfo) {
                        const currentFile = document.createElement('p');
                        currentFile.textContent = `Current: ${currentFileInfo.name}`;
                        currentFile.style.color = '#888';
                        currentFile.style.marginBottom = '5px';
                        trackPreview.insertBefore(currentFile, fileName);
                    }

                    trackPreview.appendChild(fileName);
                    trackPreview.appendChild(player);
                    previewsContainer.appendChild(trackPreview);
                });
            }
        }

        // Store current file info for edit mode
        let currentFileInfo = null;

        // Main file input handler (for upload)
        document.getElementById('musicInput')?.addEventListener('change', function(e) {
            handleFileSelection(e.target.files);
        });

        // Edit file input handler
        document.getElementById('editMusicInput')?.addEventListener('change', function(e) {
            handleFileSelection(e.target.files, true);
        });

        // When edit button is clicked (from your DataTable)
        $(document).on('click', '.edit-btn', function() {
            // Store current file info for reference
            currentFileInfo = {
                name: $(this).data('data-id'),
                url: $(this).data('audio-url')
            };

            alert(currentFileInfo.name);

            // If you want to show the current audio in the preview
            const previewsContainer = document.getElementById('audioPreviews');
            previewsContainer.innerHTML = `
        <div class="track-preview">
            <p style="margin-bottom: 5px; color: #888;">Current Track:</p>
            <p style="font-weight: bold;">${currentFileInfo.name}</p>
            <audio src="${currentFileInfo.url}" controls style="width: 100%"></audio>
        </div>
    `;
        });

        $(document).ready(function() {
            var table = $('#kt_datatable_example').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('audio_files.data') }}",
                columns: [{
                        data: 'artist',
                        name: 'artist'
                    },
                    {
                        data: 'song_name',
                        name: 'song_name'
                    },
                    // {
                    //     data: 'status',
                    //     name: 'status'
                    // },
                    {
                        data: 'upload_date',
                        name: 'created_at'
                    },
                    // {
                    //     data: 'listeners',
                    //     name: 'listeners',
                    //     className: 'text-end'
                    // },
                    {
                        data: 'audio_player',
                        name: 'audio_player',
                        className: 'text-end'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'text-end'
                    }
                ],
                order: [
                    [3, 'desc']
                ], // Default sort by upload date
                responsive: true,
                dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search songs...",
                    lengthMenu: "Show _MENU_ tracks",
                }
            });

            // Delete functionality
            $(document).on('click', '.delete-btn', function(e) {
                e.preventDefault();

                let deleteUrl = $(this).data('url'); // Get delete URL
                let row = $(this).closest('tr'); // Get the table row to remove on success

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to recover this file!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: deleteUrl,
                            type: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                Swal.fire("Deleted!", "Your file has been deleted.",
                                    "success");
                                row.remove(); // Remove row from DataTable
                            },
                            error: function(xhr) {
                                Swal.fire("Error!", "Something went wrong.", "error");
                            }
                        });
                    }
                });
            });

        });
    </script>
@endsection
