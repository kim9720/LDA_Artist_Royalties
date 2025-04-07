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
                                <i class="fa fa-users fs-2x text-primary"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <h2 class="mb-1">Users Management</h2>
                            <div class="text-muted fw-bold">
                                <a href="{{ route('dashboard') }}">Dashboard</a> <span class="mx-3">|</span> <a
                                    href="{{ route('admin.show_users') }}">users Management
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
            <div class="card  mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_notifications" aria-expanded="true"
                    aria-controls="kt_account_notifications">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">List of Users</h3>
                    </div>
                </div>

                <div class="collapse show">
                    <form class="form">
                        <div class="card-body border-top px-9 pt-3 pb-4">
                            <div class="table-responsive">
                                <table class="table table-row-dashed border-gray-300 align-middle gy-6" id="user_table">
                                    <thead class="fs-6 fw-semibold"> <!-- Changed from tbody to thead for proper header -->
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody> <!-- Added empty tbody for DataTables -->
                                </table>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn-group .btn {
            margin-right: 5px;
        }

        .btn-group .btn:last-child {
            margin-right: 0;
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#user_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.get_users') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'role_id',
                        name: 'role_id'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `
                        <div class="btn-group">
                           <a href="{{ route('admin.user_profile_show', '') }}/${row.id}"
                            class="btn btn-sm btn-primary"
                            title="View Profile">
                                <i class="fas fa-eye"></i>
                            </a>

                            <button class="btn btn-sm btn-danger delete-btn" data-id="${row.id}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    `;
                        }
                    }
                ]
            });

            
            $(document).on('click', '.delete-btn', function(e) {
                e.preventDefault();
                e.stopPropagation();

                var userId = $(this).data('id');
                var button = $(this);
                var row = button.closest('tr');

                Swal.fire({
                    title: 'Confirm Deletion',
                    html: `Are you sure you want to delete user #${userId}?<br><small>This action cannot be undone.</small>`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel',
                    customClass: {
                        confirmButton: 'btn btn-danger mx-2',
                        cancelButton: 'btn btn-secondary mx-2'
                    },
                    buttonsStyling: false,
                    focusCancel: true,
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        button.prop('disabled', true).html(
                            '<i class="fas fa-spinner fa-spin"></i> Deleting...');

                        $.ajax({
                            url: "{{ route('admin.users_destroy', '') }}/" + userId,
                            type: 'POST',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "_method": "POST"
                            },
                            success: function(response) {
                                row.fadeOut(300, function() {
                                    table.row(row).remove().draw();
                                });

                                Toast.fire({
                                    icon: 'success',
                                    title: response.message ||
                                        'User deleted successfully'
                                });
                            },
                            error: function(xhr) {
                                button.prop('disabled', false).html(
                                    '<i class="fas fa-trash"></i>');

                                Swal.fire(
                                    'Error!',
                                    xhr.responseJSON?.message ||
                                    'Deletion failed. Please try again.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });
        });
    </script>
@endsection
