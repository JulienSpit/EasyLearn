/**
 * Created by julienspitaleri on 19/09/2016.
 */
$(function () {
	$("#formLogin").on('submit', function (e) {
		$("#formLogin input").each(function (){
			if($(this).val() == ""){
				$(this).addClass("has-error");
			}
		});
			/*$.post(
				"login.php",
				{
					login:
				}
			);*/
			e.preventDefault();
			console.log($(this));


	});
});