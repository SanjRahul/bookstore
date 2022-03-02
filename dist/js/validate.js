$('#loginForm').validate({
	rules: {
	  email: {
		required: true,
		email: true,
	  },
	  password: {
		required: true,
		minlength: 8
	  },
	  terms: {
		required: true
	  },
	},
	messages: {
	  email: {
		required: "Please enter a email address",
		email: "Please enter a vaild email address"
	  },
	  password: {
		required: "Please provide a password",
		minlength: "Password must be at least 8 characters long"
	  },
	  terms: "Please accept our terms"
	},
	errorElement: 'span',
	errorPlacement: function (error, element) {
	  error.addClass('invalid-feedback');
	  element.closest('.input-group').append(error);
	},
	highlight: function (element, errorClass, validClass) {
	  $(element).addClass('is-invalid');
	},
	unhighlight: function (element, errorClass, validClass) {
	  $(element).removeClass('is-invalid');
	}
  });


  
$('#regform').validate({
	rules: {
		name: {
		required: true,
	  },
	  email: {
		required: true,
		email: true,
	  },
	  password: {
		required: true,
		minlength: 8
	  },
	  
	  confirmpassword: {
		required: true,
		minlength: 8,
		equalTo: "#exampleInput_Password1"
	  },
	  terms: {
		required: true
	  },
	},
	messages: {
	  email: {
		required: "Please enter a email address",
		email: "Please enter a vaild email address"
	  },
	  password: {
		required: "Please provide a password",
		minlength: "Password must be at least 8 characters long"
	  },
	  confirmpassword: {
		required : "Please Provide a Confirm Password"
	  },
	  terms: "Please accept our terms"
	},
	errorElement: 'span',
	errorPlacement: function (error, element) {
	  error.addClass('invalid-feedback');
	  element.closest('.input-group').append(error);
	},
	highlight: function (element, errorClass, validClass) {
	  $(element).addClass('is-invalid');
	  $(element).removeClass('is-valid');
	},
	unhighlight: function (element, errorClass, validClass) {
	  $(element).removeClass('is-invalid');
	  $(element).addClass('is-valid');
	}
  });