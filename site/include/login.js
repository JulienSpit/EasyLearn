
$(function () {
	// par defaut on masque le boutton de deconnexion
	$("#formLogout").parent().hide();

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
				 "site/login.php",
				 {
				 	mode: "connexion",
				 	login: $("#formLogin input[name='login']").val(),
				 	password: $("#formLogin input[name='password']").val()
				 },
				function (data) {
					if(data["result"] == true){
						$("#formLogin").parent().hide();
						$("#formLogout").parent().prepend("<span>Bonjour "+data['login']+" !</span>");
						$("#formLogout input[name='login']").val(data["login"]);
						$("#formLogout").parent().show();
					}

				},
				"json"
			 );
			event.preventDefault();
		}
	});
	// formulaire de deconnexion
	$("#formLogout").form({
		on: "submit",
		onSuccess: function (event) {
			$.post(
				"site/login.php",
				{
					login: $("#formLogout input[name='login']").val()
				},
				function (data) {
					if(data["result"] == true){
						$("#formLogout").parent().hide();
						$("#formLogout").parent().find("span").remove();
						$("#formLogin").parent().show();
					}

				},
				"json"
			);
			event.preventDefault();
		}
	});

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
			verifyUsername($("#newCompte input[name='username']").val())
				$.post(
					"login.php",
					{
						mode: "creation",
						login: $("#newCompte input[name='username']").val(),
						password: $("#newCompte input[name='password']").val()
					},
					function (data) {
						if(data["result"] == true){
							alert("Création réussie");
							header.location("index.php");
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