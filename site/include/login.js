
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
});