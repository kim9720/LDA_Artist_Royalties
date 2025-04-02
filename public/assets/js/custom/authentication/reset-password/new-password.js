"use strict";
var KTAuthNewPassword = (function () {
    var form,
        submitButton,
        validator,
        passwordMeter;

    var isPasswordStrong = function () {
        return passwordMeter.getScore() > 50;
    };

    return {
        init: function () {
            form = document.getElementById("kt_new_password_form");
            submitButton = document.getElementById("kt_new_password_submit");

            passwordMeter = KTPasswordMeter.getInstance(
                form.querySelector('[data-kt-password-meter="true"]')
            );

            validator = FormValidation.formValidation(form, {
                fields: {
                    password: {
                        validators: {
                            notEmpty: {
                                message: "The password is required",
                            },
                            callback: {
                                message: "Please enter a valid password",
                                callback: function (input) {
                                    if (input.value.length > 0) {
                                        return isPasswordStrong();
                                    }
                                    return false;
                                },
                            },
                        },
                    },
                    password_confirmation: {
                        validators: {
                            notEmpty: {
                                message: "The password confirmation is required",
                            },
                            identical: {
                                compare: function () {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: "The password and its confirmation do not match",
                            },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: "",
                    }),
                },
            });

            form.querySelector('input[name="password"]').addEventListener("input", function () {
                if (this.value.length > 0) {
                    validator.updateFieldStatus("password", "NotValidated");
                }
            });

            submitButton.addEventListener("click", function (e) {
                e.preventDefault();

                validator.revalidateField("password");
                validator.validate().then(function (status) {
                    if (status !== "Valid") {
                        Swal.fire({
                            text: "Please fix the errors in the form",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        });
                        return;
                    }

                    // Show loading state
                    submitButton.setAttribute("data-kt-indicator", "on");
                    submitButton.disabled = true;

                    // Prepare form data
                    var formData = new FormData(form);

                    // Debug: Check form data before sending
                    for (var pair of formData.entries()) {
                        console.log(pair[0] + ': ' + pair[1]);
                    }
alert(form.action);
                    // Submit via AJAX
                    $.ajax({
                        url: form.action,
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            Swal.fire({
                                text: "Your password has been successfully updated!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            }).then(function() {
                                form.reset();
                                passwordMeter.reset();
                                var redirectUrl = form.getAttribute("data-kt-redirect-url");
                                if (redirectUrl) {
                                    window.location.href = redirectUrl;
                                }
                            });
                        },
                        error: function(xhr) {
                            var errorMessage = "An error occurred while updating your password.";

                            // Try to get server error message
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMessage = xhr.responseJSON.message;
                            } else if (xhr.statusText) {
                                errorMessage += " (" + xhr.statusText + ")";
                            }

                            Swal.fire({
                                text: errorMessage,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            });
                            console.error("Error details:", xhr);
                        },
                        complete: function() {
                            submitButton.removeAttribute("data-kt-indicator");
                            submitButton.disabled = false;
                        }
                    });
                });
            });
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTAuthNewPassword.init();
});
