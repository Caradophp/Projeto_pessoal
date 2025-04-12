<div style="padding-top: 50px;">
    <div class="alert alert-info" style="text-align:center;"><strong>Faça seu Cadastro</strong></div>
    <form method="post" id="form">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" class="form-control"><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control"><br><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" class="form-control"><br><br>
        <div id="mensagemErro" style="color:red;"></div>
        <div class="loader" style="display:none;" id="loader"></div>
        </center>
        <input type="submit" value="enviar" class="btn btn-info" id="confirm">
    </form>
</div>