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

            // Form Validation Rules (Front-end)
            validator = FormValidation.formValidation(form, {
                fields: {
                    name: { validators: { notEmpty: { message: "First Name is required" } } },
                    mname: { validators: {} }, // Optional
                    lname: { validators: { notEmpty: { message: "Last Name is required" } } },
                    artistName: { validators: {} }, // Optional
                    phone: { validators: { notEmpty: { message: "Phone Number is required" } } },
                    email: {
                        validators: {
                            notEmpty: { message: "Email is required" },
                            regexp: {
                                regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                message: "Enter a valid email address",
                            },
                        },
                    },
                    bank_name: { validators: {} }, // Optional
                    account_number: { validators: {} }, // Optional
                    password: {
                        validators: {
                            notEmpty: { message: "Password is required" },
                            callback: {
                                message: "Please enter a strong password",
                                callback: function (input) {
                                    if (input.value.length > 0) return isPasswordStrong();
                                    return false;
                                },
                            },
                        },
                    },
                    password_confirmation: {
                        validators: {
                            notEmpty: { message: "Password confirmation is required" },
                            identical: {
                                compare: function () {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: "Passwords do not match",
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

            // Password live validation
            form.querySelector('input[name="password"]').addEventListener("input", function () {
                if (this.value.length > 0) {
                    validator.updateFieldStatus("password", "NotValidated");
                }
            });

            // Submit button handler
            submitButton.addEventListener("click", function (e) {
                e.preventDefault(); // Prevent default form submission

                validator.revalidateField("password");

                validator.validate().then(function (status) {
                    if (status === "Valid") {
                        submitButton.setAttribute("data-kt-indicator", "on");
                        submitButton.disabled = true;

                        // Clear old errors
                        form.querySelectorAll('.text-danger').forEach(el => el.remove());

                        // AJAX request
                        fetch(form.getAttribute('action'), {
                            method: 'POST',
                            body: new FormData(form),
                            headers: { 'X-Requested-With': 'XMLHttpRequest' },
                        })
                        .then(response => {
                            if (response.status === 422) {
                                return response.json().then(data => {
                                    displayErrors(data.errors); // Laravel validation errors
                                    throw new Error('Validation failed');
                                });
                            }
                            if (response.ok) return response.json();
                            throw new Error('Network response was not ok');
                        })
                        .then(data => {
                            Swal.fire({
                                text: "Registration successful!",
                                icon: "success",
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn btn-primary" },
                            }).then(function () {
                                form.reset();
                                passwordMeter.reset();
                                const redirectUrl = form.getAttribute("data-kt-redirect-url");
                                if (redirectUrl) window.location.href = redirectUrl;
                            });
                        })
                        .catch(error => {
                            console.error(error);
                            if (error.message !== 'Validation failed') {
                                Swal.fire({
                                    text: "Something went wrong. Please try again.",
                                    icon: "error",
                                    confirmButtonText: "Ok, got it!",
                                    customClass: { confirmButton: "btn btn-primary" },
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
                            confirmButtonText: "Ok, got it!",
                            customClass: { confirmButton: "btn btn-primary" },
                        });
                    }
                });
            });
        },
    };
})();

// Function to display backend validation errors
function displayErrors(errors) {
    Object.keys(errors).forEach(field => {
        const input = form.querySelector(`[name="${field}"]`);
        if (input) {
            const errorEl = document.createElement('div');
            errorEl.classList.add('text-danger', 'mt-2');
            errorEl.innerText = errors[field][0];
            input.parentNode.appendChild(errorEl);
        }
    });
}

// Example password strength function (customize if needed)
function isPasswordStrong() {
    const password = form.querySelector('input[name="password"]').value;
    // Example strength check: minimum 8 characters
    return password.length >= 8;
}

// Initialize on DOM ready
KTUtil.onDOMContentLoaded(function () {
    KTSignupGeneral.init();
});
