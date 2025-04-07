"use strict";
var KTAccountSettingsSigninMethods = (function () {
    var t, e, n, o, i, s, r, a, l;

    var d = function () {
        e.classList.toggle("d-none"),
        s.classList.toggle("d-none"),
        n.classList.toggle("d-none");
    };

    var c = function () {
        o.classList.toggle("d-none"),
        a.classList.toggle("d-none"),
        i.classList.toggle("d-none");
    };

    // AJAX submit function for email change form
    var submitEmailForm = function(form, validator) {
        var formData = new FormData(form);

        $.ajax({
            url: form.action,
            type: form.method,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                KTApp.showPageLoading();
            },
            success: function(response) {
                swal.fire({
                    text: response.message || "Email updated successfully!",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-primary",
                    },
                }).then(function() {
                    form.reset();
                    validator.resetForm();
                    d();
                });
            },
            error: function(xhr) {
                var message = xhr.responseJSON?.message || "Sorry, something went wrong. Please try again.";
                swal.fire({
                    text: message,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-primary",
                    },
                });
            },
            complete: function() {
                KTApp.hidePageLoading();
            }
        });
    };

    // AJAX submit function for password change form
    var submitPasswordForm = function(form, validator) {
        var formData = new FormData(form);

        $.ajax({
            url: form.action,
            type: form.method,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                KTApp.showPageLoading();
            },
            success: function(response) {
                swal.fire({
                    text: response.message || "Password updated successfully!",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-primary",
                    },
                }).then(function() {
                    form.reset();
                    validator.resetForm();
                    c();
                });
            },
            error: function(xhr) {
                var message = xhr.responseJSON?.message || "Sorry, something went wrong. Please try again.";
                swal.fire({
                    text: message,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-primary",
                    },
                });
            },
            complete: function() {
                KTApp.hidePageLoading();
            }
        });
    };

    return {
        init: function () {
            var m;
            (t = document.getElementById("kt_signin_change_email")),
            (e = document.getElementById("kt_signin_email")),
            (n = document.getElementById("kt_signin_email_edit")),
            (o = document.getElementById("kt_signin_password")),
            (i = document.getElementById("kt_signin_password_edit")),
            (s = document.getElementById("kt_signin_email_button")),
            (r = document.getElementById("kt_signin_cancel")),
            (a = document.getElementById("kt_signin_password_button")),
            (l = document.getElementById("kt_password_cancel")),

            e && (
                s.querySelector("button").addEventListener("click", function () {
                    d();
                }),
                r.addEventListener("click", function () {
                    d();
                }),
                a.querySelector("button").addEventListener("click", function () {
                    c();
                }),
                l.addEventListener("click", function () {
                    c();
                })
            ),

            t && (
                (m = FormValidation.formValidation(t, {
                    fields: {
                        email: {
                            validators: {
                                notEmpty: { message: "Email is required" },
                                emailAddress: {
                                    message: "The value is not a valid email address",
                                },
                            },
                        },
                        confirmemailpassword: {
                            validators: {
                                notEmpty: {
                                    message: "Password is required",
                                },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                        }),
                    },
                })),

                t.querySelector("#kt_signin_submit").addEventListener("click", function (e) {
                    e.preventDefault();
                    m.validate().then(function (status) {
                        if (status === "Valid") {
                            submitEmailForm(t, m);
                        } else {
                            swal.fire({
                                text: "Sorry, looks like there are some errors detected, please try again.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary",
                                },
                            });
                        }
                    });
                })
            ),

            (function () {
                var n = document.getElementById("kt_signin_change_password");
                if (!n) return;

                var e = FormValidation.formValidation(n, {
                    fields: {
                        currentpassword: {
                            validators: {
                                notEmpty: {
                                    message: "Current Password is required",
                                },
                            },
                        },
                        newpassword: {
                            validators: {
                                notEmpty: {
                                    message: "New Password is required",
                                },
                            },
                        },
                        confirmpassword: {
                            validators: {
                                notEmpty: {
                                    message: "Confirm Password is required",
                                },
                                identical: {
                                    compare: function () {
                                        return n.querySelector('[name="newpassword"]').value;
                                    },
                                    message: "The password and its confirm are not the same",
                                },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                        }),
                    },
                });

                n.querySelector("#kt_password_submit").addEventListener("click", function (t) {
                    t.preventDefault();
                    e.validate().then(function (status) {
                        if (status === "Valid") {
                            submitPasswordForm(n, e);
                        } else {
                            swal.fire({
                                text: "Sorry, looks like there are some errors detected, please try again.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary",
                                },
                            });
                        }
                    });
                });
            })();
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTAccountSettingsSigninMethods.init();
});
