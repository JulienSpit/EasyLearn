
$(function () {
	$("#formLogin").form({
		fields:{
			login: "empty",
			password: "empty"
		},
		onFailure: function (error, fields) {
			console.log(fields);
		},
		onSuccess: function (e, fields) {
			e.preventDefault();
			console.log(fields);
			$.post(
				 "login.php",
				 {
				 	login: fields.login,
				 	password: fields.password
				 },
				function (data) {
					alert ("oui ");
					console.log(data);
				},
				"json"
			 );

		}
	});



});