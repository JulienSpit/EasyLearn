$(function () {
    $(".ui.negative.button").click(
        function () {
            $('.ui.modal')
                .modal({
                    closable: false,
                    onDeny: function () {
                        //Ne rien faire
                    },
                    onApprove: function () {
                        $.post(
                            "site/listes.php",
                            {
                                action: "supprimer",
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