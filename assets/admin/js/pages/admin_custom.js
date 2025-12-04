$(document).ready(function () {

    $('.contact_us_table').DataTable({
        aaSorting: [[5, 'desc']]
    });
    $('.category_table').DataTable({
        aaSorting: [[5, 'desc']]
    });
    $('.testimonials_table').DataTable({
        aaSorting: [[6, 'desc']]
    });
    $('.slider_table').DataTable({
        aaSorting: [[1, 'asc']]
    });

    /** Edit record **/
    $(document).on("click", "[data-toggle=ajax-modal]", function (e) {
        e.preventDefault();
        var link = $(this).attr('href');
        $.get(link, function (data) {
            $('#myModal').html(data).modal({ backdrop: 'static', keyboard: false });
            // $('#myModal').html(data).modal('show');
        });
    });

    /** Delete record **/
    $(document).on("click", "[data-toggle=delete-modal]", function (e) {
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this record",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: link,
                    dataType: "json",
                    success: function (response) {
                        if (response.status == true) {
                            Swal.fire('Deleted!', response.message, 'success').then(function () {
                                location.reload();
                            });
                        } else {
                            Swal.fire('', response.message, 'error');
                        }
                    }
                });
            }
        });
    });
    $('#login_form').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: 'Enter email address.',
                email: 'Enter valid email address.'
            },
            password: {
                required: 'Enter password.'
            }
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent('div'));
        }
    });
    $('#forgot_password_form').validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            email: {
                required: 'Enter email address.',
                email: 'Enter valid email address.'
            }
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent('div'));
        }
    });
    $('#reset_password_form').validate({
        rules: {
            password: {
                required: true,
                minlength: 8
            },
            confirm_password: {
                required: true,
                minlength: 8,
                equalTo: "#new_password"
            }
        },
        messages: {
            password: {
                required: 'Enter new password.',
                minlength: 'Enter minimum 8 characters.'
            },
            confirm_password: {
                required: 'Enter confirm password.',
                minlength: 'Enter minimum 8 characters.',
                equalTo: 'Confirm password does not match with password.'
            }
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent('div'));
        }
    });
    $('#edit_profile_form').validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            name: {
                required: 'Enter your name.',
            },
            email: {
                required: 'Enter your email address.',
                email: 'Enter valid email address.'
            }
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent('div'));
        }
    });
    $('#change_profile_password_form').validate({
        rules: {
            password: {
                required: true,
                minlength: 8
            },
            confirm_password: {
                required: true,
                minlength: 8,
                equalTo: "#new_profile_password"
            }
        },
        messages: {
            password: {
                required: 'Enter new password.',
                minlength: 'Enter minimum 8 characters.'
            },
            confirm_password: {
                required: 'Enter confirm password.',
                minlength: 'Enter minimum 8 characters.',
                equalTo: 'Confirm password does not match with password.'
            }
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent('div'));
        }
    });
    $('#edit_company_form').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            contact_no: {
                required: true,
            },
            whatsapp_no: {
                required: true,
            },
            address: {
                required: true,
            },
            // facebook: {
            //     required: true,
            // },
            instagram: {
                required: true,
            },
            linkedin: {
                required: true,
            },
            // google: {
            //     required: true,
            // },
            company_map: {
                required: true,
            },
            // meta_keywords: {
            //     required: true,
            // },
            // meta_description: {
            //     required: true,
            // }
        },
        messages: {
            email: {
                required: 'Enter company email.',
                email: 'Enter valid email.'
            },
            contact_no: {
                required: 'Enter company no.',
            },
            whatsapp_no: {
                required: 'Enter company whatsapp no.',
            },
            address: {
                required: 'Enter company address.',
            },
            // facebook: {
            //     required: 'Enter company facebook link.',
            // },
            instagram: {
                required: 'Enter company instagram link.',
            },
            linkedin: {
                required: 'Enter company linkedin link.',
            },
            // google: {
            //     required: 'Enter company google link.',
            // },
            company_map: {
                required: 'Enter location map iFrame.',
            },
            // meta_keywords: {
            //     required: 'Enter meta keywords.',
            // },
            // meta_description: {
            //     required: 'Enter meta description.',
            // }
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent('div'));
        }
    });

    $('#edit_homepage_aboutus_form').validate({
        rules: {
            title: {
                required: true
            },
            description: {
                required: true
            }
        },
        messages: {
            title: {
                required: 'Enter title.'
            },
            description: {
                required: 'Enter description.'
            }
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent('div'));
        }
    });
    $('#edit_homepage_why_choose_us_form').validate({
        rules: {
            title: {
                required: true
            },
            description: {
                required: true
            }
        },
        messages: {
            title: {
                required: 'Enter title.'
            },
            description: {
                required: 'Enter description.'
            }
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent('div'));
        }
    });

    CKEDITOR.on('instanceReady', function () {
        addAboutpageValidation();
    });

    function addAboutpageValidation() {
        $.validator.addMethod("ckeditor_required", function (value, element) {
            var editor = CKEDITOR.instances[element.name];
            if (editor) {
                return editor.getData().trim().length > 0;
            }
            return false;
        }, "Please enter a description.");
        $('#edit_aboutpage_form').validate({
            ignore: [],
            rules: {
                title: {
                    required: true
                },
                aboutus_description: {
                    ckeditor_required: true
                }
            },
            messages: {
                title: {
                    required: 'Enter title.'
                },
                aboutus_description: {
                    ckeditor_required: 'Enter description.'
                }
            },
            errorElement: 'div',
            errorPlacement: function (error, element) {
                if (element.attr("name") === "aboutus_description") {
                    error.insertAfter("#aboutus_description_error");
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                for (var instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
                form.submit();
            }
        });
        $('#edit_aboutpage_our_vision_form').validate({
            ignore: [],
            rules: {
                our_vision_description: {
                    ckeditor_required: true
                }
            },
            messages: {
                our_vision_description: {
                    ckeditor_required: 'Enter description.'
                }
            },
            errorElement: 'div',
            errorPlacement: function (error, element) {
                if (element.attr("name") === "our_vision_description") {
                    error.insertAfter("#our_vision_description_error");
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                for (var instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
                form.submit();
            }
        });
        $('#edit_aboutpage_our_mission_form').validate({
            ignore: [],
            rules: {
                our_mission_description: {
                    ckeditor_required: true
                }
            },
            messages: {
                our_mission_description: {
                    ckeditor_required: 'Enter description.'
                }
            },
            errorElement: 'div',
            errorPlacement: function (error, element) {
                if (element.attr("name") === "our_mission_description") {
                    error.insertAfter("#our_mission_description_error");
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                for (var instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
                form.submit();
            }
        });
        $('#edit_aboutpage_our_product_form').validate({
            ignore: [],
            rules: {
                our_product_description: {
                    ckeditor_required: true
                }
            },
            messages: {
                our_product_description: {
                    ckeditor_required: 'Enter description.'
                }
            },
            errorElement: 'div',
            errorPlacement: function (error, element) {
                if (element.attr("name") === "our_product_description") {
                    error.insertAfter("#our_product_description_error");
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                for (var instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
                form.submit();
            }
        });
        $('#edit_aboutpage_our_design_process_form').validate({
            ignore: [],
            rules: {
                our_design_process_description: {
                    ckeditor_required: true
                }
            },
            messages: {
                our_design_process_description: {
                    ckeditor_required: 'Enter description.'
                }
            },
            errorElement: 'div',
            errorPlacement: function (error, element) {
                if (element.attr("name") === "our_design_process_description") {
                    error.insertAfter("#our_design_process_description_error");
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                for (var instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
                form.submit();
            }
        });
        $('#edit_invoice_settings_form').validate({
            ignore: [],
            rules: {
                company_name: {
                    required: true,
                },
                city: {
                    required: true,
                },
                country: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                address: {
                    required: true,
                },
                state: {
                    required: true,
                },
                zipcode: {
                    required: true,
                },
                phone_no: {
                    required: true,
                },
                terms_condition: {
                    ckeditor_required: true
                }
            },
            messages: {
                company_name: {
                    required: 'Enter company name.',
                },
                city: {
                    required: 'Enter city.',
                },
                country: {
                    required: 'Enter country.',
                },
                email: {
                    required: 'Enter email.',
                    email: 'Enter valid email address.'
                },
                address: {
                    required: 'Enter address.',
                },
                state: {
                    required: 'Enter state.',
                },
                zipcode: {
                    required: 'Enter zipcode.',
                },
                phone_no: {
                    required: 'Enter phone no.',
                },
                terms_condition: {
                    ckeditor_required: 'Enter terms & condition.'
                }
            },
            errorElement: 'div',
            errorPlacement: function (error, element) {
                if (element.attr("name") === "terms_condition") {
                    error.insertAfter("#terms_condition_error");
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                for (var instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
                form.submit();
            }
        });

    }

});

/** Alert Message **/
function showNotification(msgtype, message) {
    var text = (message != "") ? message : "";
    var colorName = "";
    if ((msgtype) && (msgtype == 'success')) {
        colorName = 'alert-success';
    } else if (msgtype == 'error') {
        colorName = 'alert-danger';
    }
    var allowDismiss = true;
    var animateEnter = 'animated fadeInDown';
    var animateExit = 'animated fadeOutUp';
    $.notify({
        message: text
    },
        {
            type: colorName,
            allow_dismiss: allowDismiss,
            newest_on_top: true,
            timer: 1000,
            placement: {
                from: 'top',
                align: 'right'
            },
            animate: {
                enter: animateEnter,
                exit: animateExit
            },
            template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-35" : "") + '" role="alert"> ' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
        }
    );
}