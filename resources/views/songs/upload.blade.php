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
                            <h2 class="mb-1">Music Track</h2>
                            <div class="text-muted fw-bold">
                                <a href="{{ route('dashboard') }}">Dashboard</a> <span class="mx-3">|</span> <a
                                    href="{{ route('all_song') }}">Music track
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body pb-0">
                    <div class="d-flex overflow-auto h-55px">

                    </div>
                </div>

                <div class="card-body">
                    <table class="table align-middle border rounded table-row-dashed fs-6 g-5 table-responsive"
                        id="music_track_datatable">
                        <thead>

                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase">
                                <th class="min-w-100px">Artist</th>
                                <th class="min-w-100px">Song Name</th>
                                <th class="min-w-100px">Uploaded Date</th>
                                <th class="text-end min-w-75px">No. Listiner</th>
                                <th class="text-end min-w-75px">Audio File</th>
                                <th class="min-w-100px">Status</th>
                                {{-- <th class="text-end min-w-100px pe-5">Action</th> --}}
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

        <script type="text/javascript">
            $(document).ready(function() {
                $('#music_track_datatable').DataTable({
                    processing: true,
                    serverSide: true, // Enable server-side processing
                    ajax: {
                        url: "{{ route('approved_song.get') }}",
                        type: 'GET',
                    },
                    columns: [
                        {
                            data: 'artist',
                            name: 'artist'
                        },
                        {
                            data: 'song_name',
                            name: 'song_name'
                        },
                        {
                            data: 'uploaded_date',
                            name: 'uploaded_date'
                        },
                        {
                            data: 'listeners',
                            name: 'listeners',
                            className: 'text-end'
                        },
                        {
                            data: 'audio_file',
                            name: 'audio_file',
                            className: 'text-end',

                        },
                        {
                            data: 'status',
                            name: 'status',
                            render: function(data) {
                                // Dynamic badge based on status
                                const color = data === 'approved' ? 'success' : 'danger';
                                return `<span class="badge badge-light-${color}">${data}</span>`;
                            }
                        }
                    //     {
                    //         data: 'action',
                    //         name: 'action',
                    //         className: 'text-end',
                    //         orderable: false,
                    //         searchable: false,
                    //         render: function(data, type, row) {
                    //             // Example: Edit & Delete buttons
                    //             return `
                    //     <div class="d-flex justify-content-end gap-2">
                    //         <a href="/tracks/${row.id}/edit" class="btn btn-sm btn-light">Edit</a>
                    //         <button class="btn btn-sm btn-danger delete-btn" data-id="${row.id}">Delete</button>
                    //     </div>
                    // `;
                    //         }
                    //     }
                    ],
                    responsive: true, // Enable responsive mode
                    dom: '<"top"f>rt<"bottom"lip><"clear">', // Custom controls layout
                    language: {
                        emptyTable: "No music tracks found.",
                    }
                });
            });
        </script>
    @endsection
