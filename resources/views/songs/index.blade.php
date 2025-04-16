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

                    </div>
                </div>
            </div>
            <div class="card card-flush">
                @if (Auth::user()->role_id == 2)
                    <div class="card-header pt-8">
                        <div class="card-title">

                            <div class="card-toolbar">

                                <div class="d-flex justify-content-end" data-kt-filemanager-table-toolbar="base">
                                    <button type="button" class="btn btn-flex btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_upload" onclick="showUploadButton()">
                                        <i class="fa fa-upload fs-2"><span class="path1"></span><span
                                                class="path2"></span></i> Upload Music
                                    </button>
                                </div>

                            </div>
                        </div>
                      
                    </div>
                @endif
                <div class="card-body">
                    <table class="table align-middle border rounded table-row-dashed fs-6 g-5 table-responsive"
                        id="kt_datatable_example">
                        <thead>

                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase">
                                <th class="min-w-100px">Artist</th>
                                <th class="min-w-100px">Song Name</th>
                                <th class="min-w-100px">Uploaded Date</th>
                                {{-- <th class="text-end min-w-75px">No. Listiner</th> --}}
                                <th class="text-end min-w-75px">Audio File</th>
                                <th class="min-w-100px">Status</th>
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
                        <h2 class="fw-bold">Upload Your Song</h2>

                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                            <i class="fa fa-close fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                    </div>

                    <div class="modal-body pt-10 pb-15 px-lg-17">
                        <div class="form-group">
                            <div class="dropzone dropzone-queue mb-2" id="kt_modal_upload_dropzone">
                                <div class="dropzone-panel mb-4">
                                    <form id="musicUploadForm" action="{{ route('music.upload') }}" method="post"
                                        enctype="multipart/form-data" data-default-action="{{ route('music.upload') }}">
                                        @csrf
                                        <input type="hidden" id="song_id_input" name="song_id">
                                        <div class="fv-row mb-8">
                                            <input type="text" id="song_name_input" placeholder="Song Title"
                                                name="song_title" autocomplete="off" class="form-control bg-transparent"
                                                required />
                                        </div>
                                        <div class="fv-row mb-8">
                                            <input type="text" id="song_isrc_input" placeholder="ISRC Code"
                                                name="isrc_code" autocomplete="off"
                                                class="form-control bg-transparent" />
                                        </div>

                                        <div id="uploadFields">
                                            <input type="file" name="music1" id="musicInput" accept="audio/*"
                                                style="display: none;">
                                        </div>

                                        <div id="editFields" style="display: none;">
                                            <audio id="audioPreview" controls style="width: 100%; display: none;">
                                                <source id="audioPreviewSource" src="" type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>

                                            <div class="mt-3">
                                                <label for="editMusicInput" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-upload me-2"></i> Replace Audio File
                                                </label>
                                                <input type="file" name="music" id="editMusicInput"
                                                    accept="audio/*" class="d-none">
                                            </div>
                                        </div>

                                        <button type="button" id="upload_btn"
                                            class="dropzone-select btn btn-sm btn-primary me-2"
                                            onclick="document.getElementById('musicInput').click()">
                                            Attach Audio File
                                        </button>

                                        <div id="audioPreviews" style="margin-top: 15px;"></div>

                                        <button type="submit" id="uploadButton"
                                            class="btn btn-sm btn-success mt-3">Upload All</button>
                                    </form>


                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    @if (session('success'))
        <style>
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

            .swal2-html-container li div::before {
                font-family: 'Font Awesome 5 Free';
                margin-right: 5px;
            }

            .swal2-html-container li div span:nth-child(1)::before {
                content: '\f1c1';
            }

            .swal2-html-container li div span:nth-child(2)::before {
                content: '\f0ce';
            }

            .swal2-html-container li div span:nth-child(3)::before {
                content: '\f017';
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if (session('success'))
                    const uploadedFile = @json(session('uploaded_file', []));
                    let htmlContent = `<p>@json(session('success'))</p>`;

                        htmlContent += '<ul style="text-align: left; margin-top: 15px;">';
                            htmlContent += `
                        <li style="margin-bottom: 10px;">
                            <strong>${uploadedFile.original_name}</strong>
                            <div style="color: #6c757d; font-size: 0.85rem;">
                                Size: ${uploadedFile.file_size} |
                                Type: ${uploadedFile.mime_type} |
                                ${uploadedFile.duration ? 'Duration: ' + uploadedFile.duration : ''}
                            </div>
                        </li>`;
                        htmlContent += '</ul>';


                    Swal.fire({
                        icon: 'success',
                        title: 'Upload Successful',
                        html: htmlContent,
                        confirmButtonText: 'OK',
                        width: '600px'
                    });
                @endif

                @if (session('error_message'))
                    Swal.fire({
                        icon: 'error',
                        title: 'Upload Error',
                        text: @json(session('error_message')),
                        confirmButtonText: 'OK',
                        width: '600px'
                    });
                @endif
            });
        </script>
    @endif
    <script>
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

        let currentFileInfo = null;

        document.getElementById('musicInput')?.addEventListener('change', function(e) {
            handleFileSelection(e.target.files);
        });

        document.getElementById('editMusicInput')?.addEventListener('change', function(e) {
            handleFileSelection(e.target.files, true);
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
                        data: 'status',
                        name: 'status'
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
                ],

                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search songs...",
                    lengthMenu: "Show _MENU_ tracks",
                }
            });

            // Delete functionality
            $(document).on('click', '.delete-btn', function(e) {
                e.preventDefault();

                let deleteUrl = $(this).data('url');
                let row = $(this).closest('tr');
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
                                row.remove();
                            },
                            error: function(xhr) {
                                Swal.fire("Error!", "Something went wrong.", "error");
                            }
                        });
                    }
                });
            });

            // Approve functionality
            $(document).on('click', '.approve-btn', function(e) {
                e.preventDefault();

                let approveUrl = $(this).data('url');
                let row = $(this).closest('tr');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You want to Approve this Song!",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, approve it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: approveUrl,
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                Swal.fire("Approved!", "The Song has been Approved.",
                                    "success");
                                row.remove();
                            },
                            error: function(xhr) {
                                Swal.fire("Error!", "Something went wrong.", "error");
                            }
                        });
                    }
                });
            });

        });

        //edit functionality
        function editFunction(id, name = '', isrc = '', url = '', audioUrl = '') {
            document.getElementById('upload_btn').classList.add('d-none');
            try {
                const modal = document.getElementById("kt_modal_upload");
                const form = document.getElementById("musicUploadForm");

                if (!modal || !form) {
                    console.error("Modal or form element not found");
                    return;
                }

                if (url) {
                    form.action = url;
                }

                document.getElementById("song_id_input").value = id;
                document.getElementById("song_name_input").value = name;
                document.getElementById("song_isrc_input").value = isrc;

                const audioPreview = document.getElementById("audioPreview");
                const audioPreviewSource = document.getElementById("audioPreviewSource");

                if (audioUrl) {
                    audioPreviewSource.src = audioUrl;
                    audioPreview.style.display = "block";
                    audioPreview.load();
                } else {
                    audioPreview.style.display = "none";
                }

                document.getElementById("uploadFields").style.display = "none";
                document.getElementById("editFields").style.display = "block";

                document.getElementById("uploadButton").textContent = "Update Audio";

                const bsModal = new bootstrap.Modal(modal);
                bsModal.show();

            } catch (error) {
                console.error("Error in editFunction:", error);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            function initModalCleanup() {
                const modal = document.getElementById('kt_modal_upload');

                if (!modal) {
                    console.error('Modal element (#kt_modal_upload) not found');
                    return;
                }

                modal.addEventListener('hidden.bs.modal', function() {
                    console.log('Modal closed - executing cleanup');

                    try {
                        const form = document.getElementById('musicUploadForm');
                        if (form) {
                            form.reset();
                            form.action = form.getAttribute('data-default-action') || form.action;
                            console.log('Form reset complete');
                        } else {
                            console.warn('Form (#musicUploadForm) not found');
                        }

                        const songIdInput = document.getElementById('song_id_input');
                        if (songIdInput) {
                            songIdInput.value = '';
                            console.log('Song ID cleared');
                        }

                        const audioPreview = document.getElementById('audioPreview');
                        if (audioPreview) {
                            audioPreview.style.display = 'none';
                            console.log('Audio preview hidden');
                        }

                        const uploadFields = document.getElementById('uploadFields');
                        const editFields = document.getElementById('editFields');

                        if (uploadFields) uploadFields.style.display = 'block';
                        if (editFields) editFields.style.display = 'none';

                        console.log('UI sections toggled');

                        const uploadButton = document.getElementById('uploadButton');
                        if (uploadButton) {
                            uploadButton.textContent = 'Upload All';
                            console.log('Button text reset');
                        }

                    } catch (error) {
                        console.error('Cleanup error:', error);
                    }
                });

                console.log('Modal cleanup handler initialized');
            }

            initModalCleanup();
        });

        function showUploadButton() {
            document.getElementById('upload_btn').classList.remove('d-none');
        }
    </script>
@endsection
