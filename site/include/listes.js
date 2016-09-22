$(function () {
    $("tr td:last .ui.negative.button").click(
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
                                if(data["result"] == true){
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
    $('.coupled.modal').modal({
        allowMultiple: false
    });
    $(".addList").click(function () {
        $('#modCrea1').modal({
                closable: false
        }).modal("show");
    });
    $("#modCrea2").modal('attach events', '#modCrea1 .positive.button');

});
