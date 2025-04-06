<div style="padding-top: 50px;">
    <div class="alert alert-info" style="text-align:center;"><strong>Faça seu Cadastro</strong></div>
    <form action="" method="post" id="form">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" class="form-control"><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control"><br><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" class="form-control"><br><br>
        <div id="Message" style="color:red;"></div>
        <div class="loader" style="display:none;" id="loader"></div>
        </center>
        <input type="submit" value="enviar" class="btn btn-info" id="confirm">
    </form>
</div>
<script>
$(document).ready(function() {
    $("#form").submit(function(event) {
        event.preventDefault(); // Impede o reload da página

        var nome = $("#nome").val();
        var nome = $("#email").val();
        var senha = $("#senha").val();

        $.ajax({
            url: "http://localhost/deucerto/phpup/Model_View_Controller/cadastrar/cadastrar",
            type: "POST",
            data: { nome: nome, email: email, senha: senha },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    window.location.href = "http://localhost/deucerto/phpup/Model_View_Controller/adminpainel";
                } else {
                    $("#mensagemErro").text(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText); // Debug para ver o erro exato no console
                $("#mensagemErro").text("Erro ao processar a requisição: " + error);
            }
        });
    });
});

</script>