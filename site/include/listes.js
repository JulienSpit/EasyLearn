$(function () {
    $(".ui.negative.button").click(
        function (e) {
            $('.ui.modal')
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
                                console.log(data);

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
