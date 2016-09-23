$(function () {
	$(".ui.remove.button").click(
		function (e) {
			$('.ui.modal.modSuppr')
				.modal({
					closable: false,
					onApprove: function () {
						$.post(
							"listes.php",
							{
								action: "supprimer",
								id: $(e.target).parents("tr").data("id")
							},
							function (data) {
								if (data["result"] == true) {
									$(e.target).parents("tr").remove();
								}
							},
							"json"
						);
					}
				})
				.modal('show')
			;
		}
	);
	$(".ui.edit.button").click(function (e) {
		// on met l'id de la liste dans le formulaire
		$("#modCrea1 form input[name='listId']").val($(e.target).parents("tr").data("id"));
		resetModCreation();
		downloadListModif($(e.target).parents("tr").data("id"));
		$("#modCrea1").modal("show");
	});
	/* definiton des modal pour la creation et la modification de listes  */
	$('.coupled.modal').modal({
		allowMultiple: false
	});

	$('#modCrea1').modal({
		closable: false,
		onApprove: function () {
			if ($("#modCrea1 form").form("is valid")) {
				//sauvegarde de la liste en base
				$.post(
					"listes.php",
					{
						action: "sauvegarder",
						datas: $("#modCrea1 form").form("get values")
					},
					function (data) {
						if (data["result"]) {
							$("#modCrea1 form input[name='listId']").val(data["id"]);
							if($("#modCrea2 form input[name='listId']").val() == ""){
								$("#modCrea2 form input[name='listId']").val(data["id"]);
							}
						}
					},
					"json"
				);
				$("#modCrea2").modal("show");
			}
			else {
				return false;
			}
		}
	});

	$("#modCrea2").modal({
		closable: false,
		onDeny: function (element) {
			if ($(element).hasClass("cancel")) {
				$('#modCrea1').modal("show");
			}
			else {
				resetModCreation();
			}
		},
		onApprove: function () {
			$.post(
				"listes.php",
				{
					action: "sauvegarderCouple",
					datas: $("#modCrea2 form").form("get values")
				},
				function (data){
					if(data["result"]){
						resetModCreation();
						location.reload(true);
					}
				}
			);
		}
	});

	$("#modCrea1 form").form({
		// definiton des regles de validations du formulaire
		fields: {
			listName: {
				identifier: "listName",
				rules: [{
					type: "empty"
				}]
			},
			listPublic: {
				identifier: "listPublic",
				rules: [{
					type: "empty"
				}]
			},
			listExo: {
				identifier: "listExo",
				rules: [{
					type: "empty"
				}]
			},
			listTheme: {
				identifier: "listTheme",
				rules: [{
					type: "empty"
				}]
			}
		}
	});

	$(".addCouple").click(function (e) {
		var i = $("#modCrea2 form .fields").length + 1;
		$("#modCrea2 form").append('<div class="inline fields added"><div class="field"><label>Item n°1</label> <input type="text" name="Item' + i + '_1"/> </div> <div class="field"> <label>Item n°2</label> <input type="text" name="Item' + i + '_2"/> </div>');
		e.preventDefault();
	});

	// affichage de la fenetre de creation de liste
	$(".addList").click(function () {
		$("#modCrea1").modal("show");
	});

});

function resetModCreation() {
	//reset des formulaire
	$("#modCrea1 form").form("clear");
	$("#modCrea2 form").form("clear");
	$("#modCrea2 form .inline.fields.added").remove();
}

function downloadListModif(idListe) {
	// on insere le contenu de la liste dans le formulaire pour modification
	$.post(
		"listes.php",
		{
			action: "getListe",
			id: idListe
		},
		function (data) {
			if(data["result"]) {
				$(data["liste"]).each(function () {
					$("#modCrea1 form").form("set values", {
						listId: $(this)[0].Prk_List,
						listName: $(this)[0].Name,
						listExo: $(this)[0].FrK_Exercise,
						listTheme: $(this)[0].FrK_Theme,
						listPublic: $(this)[0].State
					});
				});
			}
		},
		"json"
	);

	//on insere le contenu des couples dans le formulaire des couples
	$.post(
		"listes.php",
		{
			action: "getCouples",
			id: idListe
		},
		function (data) {
			if(data["result"]) {
				// index du tableu des items
				var j = 0;
				$("#modCrea2 form").form("set values", {
					listId: idListe,
					Item1_1: $(data["couple"])[j].Item1,
					Item1_2: $(data["couple"])[j].Item2
				});
				// on parcours tout les couples que l'on recupere
				for(var i = 2; i <= $(data["couple"]).length; i++){
					j++;
					$("#modCrea2 form").append('<div class="inline fields added"><div class="field"><label>Item n°1</label> <input type="text" name="Item' + i + '_1" id="Item' + i + '_1"/> </div> <div class="field"> <label>Item n°2</label> <input type="text" name="Item' + i + '_2" id="Item' + i + '_2"/> </div>');
					// actualise le formulaire semantic avec new element
					$("#modCrea2 form").form();
					//on set les value des item que l'on viens de creer
					$("#modCrea2 form").form("set value", "Item"+i+"_1", $(data["couple"])[j].Item1);
					$("#modCrea2 form").form("set value", "Item"+i+"_2", $(data["couple"])[j].Item2);
				}
			}
		},
		"json"
	);
}