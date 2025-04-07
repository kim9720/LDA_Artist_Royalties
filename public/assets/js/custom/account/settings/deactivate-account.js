"use strict";
var KTAccountSettingsDeactivateAccount = (function () {
    var initValidation = function(form) {
        return FormValidation.formValidation(form, {
            fields: {
                deactivate: {
                    validators: {
                        notEmpty: {
                            message: "Please check the box to deactivate your account",
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
        });
    };

    var showPasswordConfirmation = function(form) {
        Swal.fire({
            title: "Confirm Account Deletion",
            html: `
                <div class="mb-4">
                    <p>This action cannot be undone. All your data will be permanently deleted.</p>
                    <input type="password" id="password-confirm" class="form-control mt-3" name="passowrd"
                           placeholder="Enter your password to confirm" autocomplete="current-password">
                </div>
            `,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Delete Account",
            cancelButtonText: "Cancel",
            buttonsStyling: false,
            focusConfirm: false,
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-secondary",
            },
            preConfirm: function() {
                var password = $('#password-confirm').val();
                if (!password) {
                    Swal.showValidationMessage("Please enter your password");
                    return false;
                }
                return { password: password };
            }
        }).then(function(result) {
            if (result.isConfirmed) {
                deleteAccount(form, result.value.password);
            }
        });
    };

    var deleteAccount = function(form, password) {
        KTApp.showPageLoading();

        $.ajax({
            url: $(form).attr('action'),
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                _method: 'DELETE',
                password: password
            },
            dataType: 'json',
            success: function(response) {
                KTApp.hidePageLoading();
                if (response.success) {
                    Swal.fire({
                        title: "Account Deleted",
                        text: response.message || "Your account has been permanently deleted.",
                        icon: "success",
                        confirmButtonText: "OK",
                        buttonsStyling: false,
                        allowOutsideClick: false,
                        customClass: {
                            confirmButton: "btn btn-light-primary",
                        },
                    }).then(function() {
                        window.location.href = response.redirect || '/';
                    });
                } else {
                    showError(response.message || "Failed to delete account");
                }
            },
            error: function(xhr) {
                KTApp.hidePageLoading();
                var errorMessage = "An error occurred while deleting your account";
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                showError(errorMessage);
            }
        });
    };

    var showError = function(message) {
        Swal.fire({
            title: "Error",
            text: message,
            icon: "error",
            confirmButtonText: "OK",
            buttonsStyling: false,
            customClass: {
                confirmButton: "btn btn-light-primary",
            },
        });
    };

    return {
        init: function() {
            var form = $('#kt_account_deactivate_form');
            var submitButton = $('#kt_account_deactivate_account_submit');

            if (form.length) {
                var validator = initValidation(form[0]);

                submitButton.on('click', function(e) {
                    e.preventDefault();

                    validator.validate().then(function(status) {
                        if (status !== 'Valid') {
                            Swal.fire({
                                text: "Please check the box to confirm account deletion",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "OK",
                                customClass: {
                                    confirmButton: "btn btn-light-primary",
                                },
                            });
                            return;
                        }

                        showPasswordConfirmation(form);
                    });
                });
            }
        }
    };
})();

$(document).ready(function() {
    KTAccountSettingsDeactivateAccount.init();
});
