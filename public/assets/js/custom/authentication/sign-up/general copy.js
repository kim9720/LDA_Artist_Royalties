"use strict";

var KTSignupGeneral = function() {
    var initValidation = function() {
        var form = $('#kt_sign_up_form');
        var submitButton = $('#kt_sign_up_submit');

        if (!form.length) return;

        // Initialize form validation
        var validator = FormValidation.formValidation(form[0], {
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'First name is required'
                        },
                        stringLength: {
                            min: 2,
                            max: 255,
                            message: 'First name must be between 2-255 characters'
                        }
                    }
                },
                lname: {
                    validators: {
                        notEmpty: {
                            message: 'Last name is required'
                        },
                        stringLength: {
                            min: 2,
                            max: 255,
                            message: 'Last name must be between 2-255 characters'
                        }
                    }
                },
                phone: {
                    validators: {
                        notEmpty: {
                            message: 'Phone number is required'
                        },
                        stringLength: {
                            max: 20,
                            message: 'Phone number must be less than 20 characters'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Email is required'
                        },
                        emailAddress: {
                            message: 'Enter a valid email address'
                        },
                        remote: {
                            url: '/check-email',
                            message: 'Email is already taken',
                            type: 'GET',
                            delay: 500
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Password is required'
                        },
                        stringLength: {
                            min: 8,
                            message: 'Password must be at least 8 characters'
                        },
                        identical: {
                            compare: function() {
                                return form.find('[name="password_confirmation"]').val();
                            },
                            message: 'Passwords do not match'
                        }
                    }
                },
                password_confirmation: {
                    validators: {
                        notEmpty: {
                            message: 'Password confirmation is required'
                        },
                        identical: {
                            compare: function() {
                                return form.find('[name="password"]').val();
                            },
                            message: 'Passwords do not match'
                        }
                    }
                },
                toc: {
                    validators: {
                        notEmpty: {
                            message: 'You must accept the terms and conditions'
                        }
                    }
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: '.fv-row',
                    eleInvalidClass: 'is-invalid',
                    eleValidClass: 'is-valid'
                })
            }
        });

        // Form submission handler
        form.on('submit', function(e) {
            e.preventDefault();

            validator.validate().then(function(status) {
                if (status === 'Valid') {
                    // Show loading state
                    submitButton.attr('data-kt-indicator', 'on');
                    submitButton.prop('disabled', true);

                    // Clear previous errors
                    form.find('.error-message').text('');

                    // AJAX submission
                    $.ajax({
                        url: form.attr('action'),
                        method: 'POST',
                        data: new FormData(form[0]),
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function(response) {
                            if (response.redirect) {
                                window.location.href = response.redirect;
                            }
                        },
                        error: function(xhr) {
                            if (xhr.status === 422) {
                                var errors = xhr.responseJSON.errors;
                                $.each(errors, function(field, messages) {
                                    var errorContainer = form.find('.error-message[data-error-for="' + field + '"]');
                                    if (errorContainer.length) {
                                        errorContainer.text(messages[0]);
                                    }
                                });
                            } else {
                                Swal.fire({
                                    text: xhr.responseJSON.message || 'An error occurred',
                                    icon: 'error',
                                    buttonsStyling: false,
                                    confirmButtonText: 'OK',
                                    customClass: {
                                        confirmButton: 'btn btn-primary'
                                    }
                                });
                            }
                        },
                        complete: function() {
                            submitButton.removeAttr('data-kt-indicator');
                            submitButton.prop('disabled', false);
                        }
                    });
                } else {
                    Swal.fire({
                        text: 'Please fix the errors in the form',
                        icon: 'error',
                        buttonsStyling: false,
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        }
                    });
                }
            });
        });
    };

    return {
        init: function() {
            initValidation();
        }
    };
}();

// Initialize on page load
jQuery(document).ready(function() {
    KTSignupGeneral.init();
});
