
$(function () {

	// validation formulaire connexion
	$("#formLogin").form({
		on:"submit",
		fields:{
			login: {
				identifier: 'login',
				rules: [{
					type: 'empty'
				}]
			},
			password: {
				identifier: 'password',
				rules: [{
					type: 'empty'
				}]
			}
		},
		onFailure: function (error, fields) {
			return false;
		},
		onSuccess: function (event, fields) {
			$.post(
				 "login.php",
				 {
				 	mode: "connexion",
				 	login: $("#formLogin input[name='login']").val(),
				 	password: $("#formLogin input[name='password']").val()
				 },
				function (data) {
					if(data["result"] == true){
						if(location.pathname.indexOf("login.php")){
							location.href= "index.php";
						}
						else {
							location.reload(true);
						}

					}
					else {
						$("#formLogin .item").addClass("error");
					}
				},
				"json"
			 );
			event.preventDefault();
		}
	});

	if($("#formLogout")){
		$("#formLogout").form({
			on: "submit",
			onSuccess: function (event) {
				$.post(
					"login.php",
					{
						mode:"deconnexion"
					},
					function (data) {
						if(data["result"] == true){
							location.reload(true);
						}

					},
					"json"
				);
				event.preventDefault();
			}
		});
	}
	// formulaire de creation de compte
	$("#newCompte").form({
		on: "submit",
		fields:{
			username: {
				identifier: 'username',
				rules: [{
					type: 'empty'
				}]
			},
			password: {
				identifier: 'password',
				rules: [{
					type: 'empty'
				}]
			}
		},
		onFailure: function (error, fields) {
			return false;
		},
		onSuccess: function (event, fields) {
			verifyUsername($("#newCompte input[name='username']").val());
				$.post(
					"login.php",
					{
						mode: "creation",
						login: $("#newCompte input[name='username']").val(),
						password: $("#newCompte input[name='password']").val()
					},
					function (data) {
						if(data["result"] == true){
							location="index.php";
						}
						else {
							$("#newCompte .item").addClass("error");
						}
					},
					"json"
				);
			event.preventDefault();
		}
	});

	$("#newCompte input[name='username']").change(function () {
		verifyUsername($(this).val());
	});
});

function verifyUsername (username){
	$.post(
		"login.php",
		{
			mode: "verification",
			username: username
		},
		function (data) {
			if(data["result"] == true){
				$("#newCompte .message").show();
				$("#newCompte input[name='username']").parents(".field").addClass("error");
				$("#newCompte input[name='username']").next().addClass("remove");
				$("#newCompte .primary").addClass("disabled");
				return false;
			}
			else {
				$("#newCompte .message").fadeOut();
				$("#newCompte input[name='username']").parents(".field").removeClass("error");
				$("#newCompte input[name='username']").next().removeClass("remove");
				$("#newCompte .primary").removeClass("disabled");
			}
		},
		"json"
	);
}