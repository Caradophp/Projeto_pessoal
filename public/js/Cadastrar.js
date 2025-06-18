$(document).ready(function() {
    $("#form").submit(function(event) {
        event.preventDefault(); // Impede o reload da página

        var nome = $("#nome").val();
        var email = $("#email").val();
        var senha = $("#senha").val();
        var telefone = $("#telefone").val();
        var tipo_pessoa = $("#tipo_pessoa").val();
        var cpf = $("#cpf").val();
        var cnpj = $("#cnpj").val();
        
        $.ajax({
            url: "http://localhost/deucerto/phpup/Model_View_Controller/cadastrar/cadastrar",
            type: "POST",
            data: { 
                    nome: nome,
                    email: email,
                    senha: senha,
                    telefone: telefone,
                    tipo_pessoa: tipo_pessoa,
                    cpf: cpf,
                    cnpj: cnpj
                  },
            dataType: "json",
            success: function(response) {
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