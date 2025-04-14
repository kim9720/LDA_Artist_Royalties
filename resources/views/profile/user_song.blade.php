@extends('layouts.app')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class=" container-xxl " id="kt_content_container">
            @include('profile.includes.nav_profile')
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                <div class="card-header cursor-pointer">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">User Songs</h3>
                    </div>

                </div>

                <div class="card-body p-9">
                    <table class="table align-middle border rounded table-row-dashed fs-6 g-5 table-responsive p-5"
                    id="kt_datatable_example">
                    <thead>

                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase">
                            <th class="min-w-100px">#</th>
                            <th class="min-w-100px">Song Name</th>
                            <th class="min-w-100px">Uploaded Date</th>
                            {{-- <th class="text-end min-w-75px">No. Listiner</th> --}}
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
    </div>

    <script type="text/javascript">
    $(document).ready(function() {

            var table = $('#kt_datatable_example').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.user_song_get', $profile->id) }}",
                dom: 'lrtip',
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'song_name',
                        name: 'song_name',
                        searchable: true

                    },
                    // {
                    //     data: 'status',
                    //     name: 'status'
                    // },
                    {
                        data: 'upload_date',
                        name: 'created_at',
                        searchable: true

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
                        name: 'status',
                        searchable: true

                    }
                    // {
                    //     data: 'action',
                    //     name: 'action',
                    //     orderable: false,
                    //     searchable: false,
                    //     className: 'text-end'
                    // }
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
        })
    </script>
@endsection
