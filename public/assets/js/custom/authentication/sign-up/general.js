"use strict";

var KTSignupGeneral = (function () {
    var form, submitButton, validator, passwordMeter;

    return {
        init: function () {
            form = document.querySelector("#kt_sign_up_form");
            submitButton = document.querySelector("#kt_sign_up_submit");
            passwordMeter = KTPasswordMeter.getInstance(
                form.querySelector('[data-kt-password-meter="true"]')
            );

            // Form Validation
            validator = FormValidation.formValidation(form, {
                fields: {
                    name: {
                        validators: {
                            notEmpty: { message: "First Name is required" }
                        }
                    },
                    mname: {
                        validators: {}
                    },
                    lname: {
                        validators: {
                            notEmpty: { message: "Last Name is required" }
                        }
                    },
                    artistName: {
                        validators: {}
                    },
                    phone: {
                        validators: {
                            notEmpty: { message: "Phone Number is required" }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: { message: "Email is required" },
                            regexp: {
                                regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                message: "Enter a valid email address"
                            }
                        }
                    },
                    bank_name: {
                        validators: {}
                    },
                    account_number: {
                        validators: {}
                    },
                    password: {
                        validators: {
                            notEmpty: { message: "Password is required" },
                            callback: {
                                message: "Please enter a valid password",
                                callback: function (input) {
                                    if (input.value.length > 0) {
                                        return isPasswordStrong(input.value);
                                    }
                                    return false;
                                }
                            }
                        }
                    },
                    password_confirmation: {
                        validators: {
                            notEmpty: { message: "Password confirmation is required" },
                            identical: {
                                compare: function () {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: "Passwords do not match"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            });

            // Password live strength check
            form.querySelector('input[name="password"]').addEventListener("input", function () {
                if (this.value.length > 0) {
                    validator.updateFieldStatus("password", "NotValidated");
                }
            });

            // Submit button handler
            submitButton.addEventListener("click", function (e) {
                e.preventDefault();

                validator.revalidateField("password");

                validator.validate().then(function (status) {
                    if (status === "Valid") {
                        submitButton.setAttribute("data-kt-indicator", "on");
                        submitButton.disabled = true;

                        fetch(form.getAttribute('action'), {
                            method: 'POST',
                            body: new FormData(form),
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => {
                            if (response.ok) return response.json();
                            return response.json().then(data => { throw data; });
                        })
                        .then(data => {
                            Swal.fire({
                                text: "Registration successful!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn btn-primary" }
                            }).then(function () {
                                form.reset();
                                passwordMeter.reset();
                                const redirectUrl = form.getAttribute("data-kt-redirect-url");
                                if (redirectUrl) {
                                    window.location.href = redirectUrl;
                                }
                            });
                        })
                        .catch(error => {
                            console.error(error);
                            if (error.errors) {
                                let messages = '';
                                for (const field in error.errors) {
                                    messages += `${error.errors[field][0]}<br>`;
                                }
                                Swal.fire({
                                    html: messages,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: { confirmButton: "btn btn-primary" }
                                });
                            } else {
                                Swal.fire({
                                    text: "Something went wrong. Please try again.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: { confirmButton: "btn btn-primary" }
                                });
                            }
                        })
                        .finally(() => {
                            submitButton.removeAttribute("data-kt-indicator");
                            submitButton.disabled = false;
                        });
                    } else {
                        Swal.fire({
                            text: "Please fix the errors in the form and try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: { confirmButton: "btn btn-primary" }
                        });
                    }
                });
            });
        }
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTSignupGeneral.init();
});

// Simple password strength checker (customize as needed)
function isPasswordStrong(password) {
    const strongRegex = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$/;
    return strongRegex.test(password);
}
