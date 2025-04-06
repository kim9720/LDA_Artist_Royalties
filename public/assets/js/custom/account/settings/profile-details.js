"use strict";
var KTAccountSettingsProfileDetails = (function () {
    var e, t, n;
    return {
        init: function () {
            (e = document.getElementById("kt_account_profile_details_form")) &&
                (n = e.querySelector("#kt_account_profile_details_submit"),
                (t = FormValidation.formValidation(e, {
                    fields: {
                        fname: {
                            validators: {
                                notEmpty: { message: "First name is required" },
                            },
                        },
                        lname: {
                            validators: {
                                notEmpty: { message: "Last name is required" },
                            },
                        },
                        mname: {
                            validators: {
                                notEmpty: { message: "Middle name is required" },
                            },
                        },
                        phone: {
                            validators: {
                                notEmpty: {
                                    message: "Contact phone number is required",
                                },
                            },
                        },
                        country: {
                            validators: {
                                notEmpty: {
                                    message: "Please select a country",
                                },
                            },
                        },
                        artist: {
                            validators: {
                                notEmpty: {
                                    message: "Artist Name is required",
                                },
                            },
                        },
                        "communication[]": {
                            validators: {
                                notEmpty: {
                                    message: "Please select at least one communication method",
                                },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: "",
                        }),
                    },
                })),

                n.addEventListener("click", function (i) {
                    i.preventDefault();

                    t.validate().then(function (status) {
                        if (status === "Valid") {
                            // Show loading state
                            n.setAttribute("data-kt-indicator", "on");
                            n.disabled = true;

                            // Prepare form data
                            let formData = new FormData(e);

                            // AJAX request
                            $.ajax({
                                url: e.action,
                                type: "POST",
                                data: formData,
                                processData: false,
                                contentType: false,
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(response) {
                                    // Show success message
                                    Swal.fire({
                                        title: "Success!",
                                        text: "Profile updated successfully",
                                        icon: "success",
                                        confirmButtonText: "OK",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.reload(); 
                                        }
                                    });
                                },
                                error: function(xhr) {
                                    let errorMessage = "An error occurred";
                                    if (xhr.responseJSON && xhr.responseJSON.message) {
                                        errorMessage = xhr.responseJSON.message;
                                    }

                                    Swal.fire({
                                        title: "Error!",
                                        text: errorMessage,
                                        icon: "error",
                                        confirmButtonText: "OK",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    });
                                },
                                complete: function() {
                                    // Remove loading state
                                    n.removeAttribute("data-kt-indicator");
                                    n.disabled = false;
                                }
                            });
                        } else {
                            Swal.fire({
                                text: "Please fix the errors in the form",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "OK",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            });
                        }
                    });
                }),

                // Field change handlers
                $(e.querySelector('[name="country"]')).on("change", function () {
                    t.revalidateField("country");
                }),
                $(e.querySelector('[name="language"]')).on("change", function () {
                    t.revalidateField("language");
                }),
                $(e.querySelector('[name="timezone"]')).on("change", function () {
                    t.revalidateField("timezone");
                }));
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTAccountSettingsProfileDetails.init();
});
