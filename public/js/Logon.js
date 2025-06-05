$(document).ready(function() {
    $("#loginForm").submit(function(event) {
        event.preventDefault();

        var email = $("#email");
        var senha = $("#senha");
        var messageEmail = $("#emailEmpty");
        var messageSenha = $("#senhaEmpty");
        var mensagemErro = $("#mensagemErro");

        // Limpa mensagens anteriores
        messageEmail.text("").css("color", "red");
        messageSenha.text("").css("color", "red");
        mensagemErro.text("").hide();

        var temErro = false;

        if (email.val().trim() === "") {
            messageEmail.text("O campo email é obrigatório");
            temErro = true;
        }

        if (senha.val().trim() === "") {
            messageSenha.text("O campo senha é obrigatório");
            temErro = true;
        }

        if (temErro) {
            return;
        }

        $.ajax({
            url: "http://localhost/deucerto/phpup/Model_View_Controller/login/logar",
            type: "POST",
            data: { 
                email: email.val(), 
                senha: senha.val() 
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
                if (response.success) {
                    window.location.href = "http://localhost/deucerto/phpup/Model_View_Controller/adminpainel";
                } else {
                    mensagemErro
                        .css("display", "block")
                        .text(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                mensagemErro
                    .css("display", "block")
                    .text("Erro ao processar a requisição: " + error);
            }
        });
    });
});
