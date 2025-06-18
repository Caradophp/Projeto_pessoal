$(document).ready( function() {

    $("#codeModel").hide();
    $("#pass-form").submit(function(event) {

        event.preventDefault();

        var email = $("#emailForPass");
        var message = $("#message");

        var temErro = false;

        if (email.val().trim() === "") {
            message.text("Por favor informe o email para receber o código");
            temErro = true;
        }

        if (temErro) {
            return;
        }

        $.ajax({
            url: "http://localhost/deucerto/phpup/Model_View_Controller/login/changePass",
            type: "POST",
            data: {
                email: email.val()
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
                if (response.success) {
                    message
                        .css("display", "block")    
                        .text(response.message);
                    $("#senhaModel").hide();
                    $("#codeModel").show();
                } else {
                    message
                        .css("display", "block")
                        .text(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
                console.log(xhr);
                message
                    .css("display", "block")
                    .text("Erro ao processar requisição: " + error);
            }
        })
    })

    $("#code-form").submit( function (event) {

        event.preventDefault();

        var codigo = $("#codigo");

        $.ajax({
            url: "http://localhost/deucerto/phpup/Model_View_Controller/login/confirmarCodigo",
            type: "POST",
            data: {
                codigo: codigo.val()
            },
            dataType: "json",
            success: function(response) {
                console.log(response.success);
                if (response.success) {
                    window.location.href = "http://localhost/deucerto/phpup/Model_View_Controller/alterarsenha";
                } else {
                    console.log("DEU ERRADO");
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
                console.log(xhr);
                message
                    .css("display", "block")
                    .text("Erro ao processar requisição: " + error);
            }
        })
    });
});