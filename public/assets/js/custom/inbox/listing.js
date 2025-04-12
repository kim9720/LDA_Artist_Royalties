"use strict";
var KTAppComplaintsListing = (function () {
    var dataTable;
    var checkAllCheckbox;

    return {
        init: function () {
            const table = document.querySelector("#kt_complaints_listing");
            checkAllCheckbox = document.querySelector(
                '[data-kt-check-target="#kt_complaints_listing"]'
            );

            if (!table) return;

            // Initialize DataTable
            dataTable = $(table).DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: document.getElementById("kt_complaints_listing")
                        .dataset.ajaxUrl,
                    type: "GET",
                },
                columns: [
                    // Checkbox column
                    {
                        data: "id",
                        render: function (data, type, row) {
                            return (
                                '<div class="form-check form-check-sm form-check-custom form-check-solid mt-3">' +
                                `<input class="form-check-input row-checkbox" type="checkbox" value="1" data-id="${data}" />` +
                                "</div>"
                            );
                        },
                        orderable: false,
                        searchable: false,
                    },
                    // User/Avatar column
                    {
                        data: "user",
                        render: function (data, type, row) {
                            if (type === "display") {
                                return `<a href="/complaints_show/${
                                    data.id
                                }" class="d-flex align-items-center text-gray-900">
                                    <div class="symbol symbol-35px me-3">
                                        ${
                                            data.avatar
                                                ? `<span class="symbol-label" style="background-image:url(${data.avatar})"></span>`
                                                : `<div class="symbol-label bg-light-${data.initials_color}">
                                              <span class="text-${data.initials_color}">${data.initials}</span>
                                           </div>`
                                        }
                                    </div>
                                    <span class="fw-semibold">${
                                        data.name
                                    }</span>
                                </a>`;
                            }
                            return data.name;
                        },
                        name: "user.name",
                    },
                    // Subject/Content column
                    {
                        data: null,
                        render: function (data) {
                            let badges = "";
                            if (data.status === "submitted") {
                                badges =
                                    '<div class="badge badge-light-primary">Submitted</div>';
                            } else if (data.status === "in_progress") {
                                badges =
                                    '<div class="badge badge-light-warning">In Progress</div>';
                            } else if (data.status === "resolved") {
                                badges =
                                    '<div class="badge badge-light-success">Resolved</div>';
                            }

                            return `<div class="text-gray-900 gap-1 pt-2">
                            <a href="/complaints_show/${
                                data.id
                            }" class="text-gray-900">
                                <span class="fw-bold">${data.subject}</span>
                                <span class="fw-bold d-none d-md-inline"> - </span>
                                <span class="d-none d-md-inline text-muted">
                                    ${stripHtml(data.content)
                                        .substring(0, 60)
                                        .trim()}${
                                stripHtml(data.content).length > 60 ? "..." : ""
                            }
                                </span>
                            </a>
                        </div>
                        ${badges}`;
                        },
                    },
                    // Date column
                    {
                        data: "created_at",
                        render: function (data) {
                            return (
                                '<span class="fw-semibold">' +
                                moment(data).fromNow() +
                                "</span>"
                            );
                        },
                    },
                ],
                order: [[3, "desc"]],
                dom:
                    '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                    '<"row"<"col-sm-12"tr>>' +
                    '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                language: {
                    emptyTable: "No complaints found",
                    info: "Showing _START_ to _END_ of _TOTAL_ complaints",
                    infoEmpty: "Showing 0 to 0 of 0 complaints",
                    infoFiltered: "(filtered from _MAX_ total complaints)",
                    lengthMenu: "Show _MENU_ complaints",
                    search: "Search:",
                    zeroRecords: "No matching complaints found",
                },
                drawCallback: function () {
                    // Uncheck "Check All" when table redraws
                    if (checkAllCheckbox) {
                        checkAllCheckbox.checked = false;
                    }
                },
            });

            // Search functionality
            document
                .querySelector('[data-kt-complaints-listing-filter="search"]')
                ?.addEventListener("keyup", function (e) {
                    dataTable.search(e.target.value).draw();
                });


            // Check/uncheck all functionality
            $('#checkAllComplaints').on('change', function() {
                var isChecked = $(this).prop('checked');
                table.$('.row-checkbox').prop('checked', isChecked);
            });

            // Reload table
            $('.reload-table').click(function(e) {
                e.preventDefault();
                table.ajax.reload();
            });

            // // Individual checkbox click handler
            // table.addEventListener("change", function (e) {
            //     if (e.target.classList.contains("row-checkbox")) {
            //         if (!e.target.checked && checkAllCheckbox.checked) {
            //             checkAllCheckbox.checked = false;
            //         } else {
            //             // Check if all checkboxes are now checked
            //             const allChecked = Array.from(
            //                 table.querySelectorAll(".row-checkbox")
            //             ).every((checkbox) => checkbox.checked);
            //             checkAllCheckbox.checked = allChecked;
            //         }
            //     }
            // });
        },

        // Method to get all selected complaint IDs
        getSelectedComplaintIds: function () {
            if (!dataTable) return [];

            const selectedIds = [];
            $("#kt_complaints_listing .row-checkbox:checked").each(function () {
                selectedIds.push($(this).data("id"));
            });

            return selectedIds;
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTAppComplaintsListing.init();
});

function stripHtml(html) {
    if (!html) return "";

    const txt = document.createElement("textarea");
    txt.innerHTML = html;
    const decoded = txt.value;
    return decoded.replace(/<[^>]+>/g, "");
}
