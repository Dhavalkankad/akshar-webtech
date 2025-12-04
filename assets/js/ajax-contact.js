$(document).ready(function () {
	//custom validation rule
	$.validator.addMethod("customemail",
		function (value, element) {
			return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
		},
		"Enter valid email address."
	);
	$('#contact-form').validate({
		rules: {
			name: {
				required: true
			},
			email: {
				required: true,
				email: true,
				customemail: true
			},
			number: {
				required: true,
				number: true,
				minlength: 10,
				maxlength: 10,
			},
			subject: {
				required: true
			},
			message: {
				required: true
			}
		},
		messages: {
			name: {
				required: 'Enter name'
			},
			email: {
				required: 'Enter email',
				email: 'Enter valid email',
			},
			number: {
				required: 'Enter phone number',
				number: 'Enter number only',
				minlength: 'Enter minimum 10 digit phone number',
				maxlength: 'Enter maximum 10 digit phone number',
			},
			subject: {
				required: 'Enter subject'
			},
			message: {
				required: 'Enter message'
			}
		},
		submitHandler: function (form) {
			$.ajax({
				url: form.action,
				type: form.method,
				data: $(form).serialize(),
				dataType: "json",
				success: function (response) {
					if (response) {
						form.reset();
						$('#alert_msg').html(response.message);
						$("#alert_msg").show();
						setTimeout(function () {
							$("#alert_msg").hide();
						}, 5000);
					}
				}
			});
		}
	});
});
