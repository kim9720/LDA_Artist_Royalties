"use strict";
var KTAppInboxCompose = (function () {
    // Initialize Quill editor variable
    let quillEditor;
    let dropzoneInstance;

    const t = (e) => {
        const sendButton = $(e).find('[data-kt-inbox-form="send"]');

        sendButton.on('click', function (event) {
            event.preventDefault();

            // Show loading indicator
            sendButton.attr("data-kt-indicator", "on");

            // Collect form data
            const formData = new FormData();
            formData.append('subject', $(e).find('[name="compose_subject"]').val());
            formData.append('content', quillEditor.root.innerHTML);

            // Add attachments if any
            if (dropzoneInstance.files.length > 0) {
                dropzoneInstance.files.forEach((file, index) => {
                    formData.append(`attachments[${index}]`, file);
                });
            }

            const routeUrl = $(e).data('route');

            // Add CSRF token
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

            // Send to backend using jQuery AJAX
            $.ajax({
                url: routeUrl,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    sendButton.removeAttr("data-kt-indicator");

                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Complaint submitted successfully!'
                        }).then((result) => {
                            window.location.href = '/complaints_list';
                        });

                        $(e).find('[name="compose_subject"]').val('');
                        quillEditor.root.innerHTML = '';
                        dropzoneInstance.removeAllFiles(true);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message || 'Submission failed'
                        });
                    }
                },
                error: function(xhr) {
                    sendButton.removeAttr("data-kt-indicator");
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseJSON?.message || 'An error occurred'
                    });
                }
            });
        });
    },

    a = (e) => {
        // ... (keep your existing Tagify implementation) ...
    },

    n = (e) => {
        quillEditor = new Quill("#kt_inbox_form_editor", {
            modules: {
                toolbar: [
                    [{ header: [1, 2, !1] }],
                    ["bold", "italic", "underline"],

                ],
            },
            placeholder: "Type your text here...",
            theme: "snow",
        });
        const toolbar = $(e).find(".ql-toolbar");
        if (toolbar.length) {
            toolbar.addClass("px-5 border-top-0 border-start-0 border-end-0");
        }
    },

    o = (e) => {
        const dropzoneElement = $(e).find('[data-kt-inbox-form="dropzone"]')[0];
        const uploadButton = $(e).find('[data-kt-inbox-form="dropzone_upload"]')[0];

        const dropzoneItem = $(dropzoneElement).find(".dropzone-item")[0];
        dropzoneItem.id = "";
        const previewTemplate = dropzoneItem.parentNode.innerHTML;
        dropzoneItem.parentNode.removeChild(dropzoneItem);

        dropzoneInstance = new Dropzone(dropzoneElement, {
            url: "https://preview.keenthemes.com/api/dropzone/void.php", // Replace with your endpoint
            parallelUploads: 20,
            maxFilesize: 1,
            previewTemplate: previewTemplate,
            previewsContainer: dropzoneElement.querySelector(".dropzone-items"),
            clickable: uploadButton,
        });

        dropzoneInstance.on("addedfile", function() {
            $(dropzoneElement).find(".dropzone-item").show();
        });

        dropzoneInstance.on("totaluploadprogress", function(progress) {
            $(dropzoneElement).find(".progress-bar").css("width", progress + "%");
        });

        dropzoneInstance.on("sending", function() {
            $(dropzoneElement).find(".progress-bar").css("opacity", "1");
        });

        dropzoneInstance.on("complete", function() {
            setTimeout(function() {
                $(dropzoneElement).find(".dz-complete .progress-bar, .dz-complete .progress").css("opacity", "0");
            }, 300);
        });
    };

    return {
        init: function() {
            (function() {
                const form = $("#kt_inbox_compose_form");
                const tagifyElements = form.find('[data-kt-inbox-form="tagify"]');

                t(form[0]);
                tagifyElements.each(function() {
                    a(this);
                });
                n(form[0]);
                o(form[0]);
            })();
        }
    };
})();

$(document).ready(function() {
    KTAppInboxCompose.init();
});
