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

                                <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary delete-complaints"
                                    data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-placement="top" title="Delete">
                                    <i class="fa fa-trash fs-2"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span><span class="path5"></span></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <table
                                class="table  align-middle border rounded table-row-dashed  table-responsive table-hover fs-6 gy-5 my-0 p-3"
                                id="kt_complaints_listing" data-ajax-url="{{ route('complaints.datatable') }}">
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
        document.addEventListener('DOMContentLoaded', function() {
    // Handle delete button click
    document.querySelector('.delete-complaints').addEventListener('click', function(e) {
        e.preventDefault();

        // Get all selected checkboxes
        const selectedComplaints = document.querySelectorAll('#kt_complaints_listing tbody .form-check-input:checked');

        if (selectedComplaints.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'No Selection',
                text: 'Please select at least one complaint to delete',
                confirmButtonColor: '#3085d6',
            });
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: `You are about to delete ${selectedComplaints.length} complaint(s). This action cannot be undone.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Collect IDs of selected complaints
                const complaintIds = [];
                selectedComplaints.forEach(checkbox => {
                    // Assuming each checkbox has a data-id attribute with the complaint ID
                    complaintIds.push(checkbox.dataset.id);
                });

                // Send AJAX request to delete
                fetch('/complaints/delete', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ ids: complaintIds })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire(
                            'Deleted!',
                            'The selected complaints have been deleted.',
                            'success'
                        ).then(() => {
                            // Reload the table or remove the deleted rows
                            location.reload(); // or your table refresh logic
                        });
                    } else {
                        Swal.fire(
                            'Error!',
                            'There was a problem deleting the complaints.',
                            'error'
                        );
                    }
                })
                .catch(error => {
                    Swal.fire(
                        'Error!',
                        'There was a problem deleting the complaints.',
                        'error'
                    );
                });
            }
        });
    });
});
    </script>
@endsection
