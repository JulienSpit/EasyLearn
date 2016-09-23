$(function () {
    $(".ui.negative.button").click(
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
    $(".ui.edit.button").click(
        function (e) {
            $('.ui.modal.modEdit')
                .modal({
                    closable: false,
                    onApprove: function () {
                        $.post(
                            "listes.php",
                            {
                                action: "modifier",
                                id: $(e.target).parents("tr").data("id")
                            },
                            function (data) {
                                if(data["result"] == true){
                                    //$(e.target).parents("tr").remove();
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
});
