$(document).ready(function() {
    $("#loginForm").submit(function(event) {
        event.preventDefault(); // Impede o reload da página

        var email = $("#email").val();
        var senha = $("#senha").val();

        $.ajax({
            url: "http://localhost/deucerto/phpup/Model_View_Controller/login/logar",
            type: "POST",
            data: { email: email, senha: senha },
            dataType: "json",
            success: function(response) {
                console.log(response);
                if (response.success) {
                    window.location.href = "http://localhost/deucerto/phpup/Model_View_Controller/adminpainel";
                } else {
                    $("#mensagemErro")
                    .css("display", "block")
                    .text(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText); // Debug para ver o erro exato no console
                $("#mensagemErro").text("Erro ao processar a requisição: " + error);
            }
        });
    });
});