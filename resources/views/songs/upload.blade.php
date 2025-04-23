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
                                {{-- <th class="min-w-100px">Status</th> --}}
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
                    serverSide: true,
                    ajax: {
                        url: "{{ route('approved_song.get') }}",
                        type: 'GET',
                    },
                    columns: [{
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
                            className: 'text-end'
                        },
                    ],
                    responsive: true,
                    dom: '<"top"f>rt<"bottom"lip><"clear">',
                    language: {
                        emptyTable: "No music tracks found.",
                    },
                    rowCallback: function(row, data, index) {
                        $(row).css('cursor', 'pointer');
                        $(row).on('click', function() {
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = "{{ route('song.track_details') }}";
                            form.style.display = 'none';

                            const csrfToken = document.createElement('input');
                            csrfToken.type = 'hidden';
                            csrfToken.name = '_token';
                            csrfToken.value = "{{ csrf_token() }}";

                            const songIdInput = document.createElement('input');
                            songIdInput.type = 'hidden';
                            songIdInput.name = 'song_id';
                            songIdInput.value = data.id;

                            form.appendChild(csrfToken);
                            form.appendChild(songIdInput);
                            document.body.appendChild(form);
                            form.submit(); 
                        });
                    }
                });
            });
        </script>
    @endsection
