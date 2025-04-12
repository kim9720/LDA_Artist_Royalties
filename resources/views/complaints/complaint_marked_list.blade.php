@extends('layouts.app')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class=" container-xxl " id="kt_content_container">
            <div class="d-flex flex-column flex-lg-row">
                @include('complaints.includes.complaint_side_menu')
                <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                    <div class="card">
                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                            <div class="d-flex flex-wrap gap-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-4 me-lg-7">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                        data-kt-check-target="#kt_inbox_listing .form-check-input" value="1" />
                                </div>
                                <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary"
                                    data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-placement="top" title="Reload">
                                    <i class="fa fa-refresh fs-2"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </a>
                                @if(Auth::user()->role_id == 2)
                                <a href="#"
                                    class="btn btn-sm btn-icon btn-light btn-active-light-primary delete-complaints"
                                    data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-placement="top" title="Delete">
                                    <i class="fa fa-trash fs-2"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span><span class="path5"></span></i>
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <table
                                class="table  align-middle border rounded table-row-dashed  table-responsive table-hover fs-6 gy-5 my-0 p-3"
                                id="kt_complaints_listing" data-ajax-url="{{ route('complaints.marked_get') }}">
                                <thead class="d-none">
                                    <tr>
                                        <th>Checkbox</th>
                                        <th>User</th>
                                        <th>Complaint</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <input type="text" data-kt-complaints-listing-filter="search"
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search complaints...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.delete-complaints').on('click', function(e) {
                e.preventDefault();

                // Get all checked checkboxes
                var selectedComplaints = $('#kt_complaints_listing').DataTable().$(
                    '.form-check-input:checked');

                if (selectedComplaints.length === 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'No Selection',
                        text: 'Please select at least one complaint to delete',
                        confirmButtonColor: '#3085d6',
                    });
                    return;
                }

                // Collect IDs from DataTable rows
                var complaintIds = selectedComplaints.map(function() {
                    return $(this).data('id');
                }).get();

                Swal.fire({
                    title: 'Are you sure?',
                    html: 'You are about to delete <strong>' + selectedComplaints.length +
                        '</strong> complaint(s).<br><br>This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete them!',
                    showLoaderOnConfirm: true,
                    preConfirm: function() {
                        return $.ajax({
                            url: "{{ route('complaints.delete') }}",
                            type: 'POST',
                            data: {
                                ids: complaintIds,
                                _token: "{{ csrf_token() }}"
                            },
                            dataType: 'json'
                        }).fail(function(jqXHR) {
                            Swal.showValidationMessage(
                                'Request failed: ' + (jqXHR.responseJSON?.message ||
                                    jqXHR.statusText)
                            );
                        });
                    }
                }).then(function(result) {
                    if (result.isConfirmed && result.value.success) {
                        Swal.fire({
                            title: 'Deleted!',
                            html: 'Successfully deleted <strong>' + selectedComplaints
                                .length + '</strong> complaint(s).',
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                        }).then(function() {
                            $('#kt_complaints_listing').DataTable().ajax.reload();
                            location.reload();

                        });
                    }
                });
            });
        });
    </script>
@endsection
