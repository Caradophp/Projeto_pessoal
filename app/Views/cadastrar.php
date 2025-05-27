<div style="padding-top: 50px;" id="cad-form">
    <div class="alert alert-info" style="text-align:center; margin:50px;"><strong>Faça seu Cadastro</strong></div>
    <form method="post" id="form" class="row" style="margin: 50px;">
        <div class="col-6">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control">
        </div>
        <div class="col-6">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control">
        </div>
        <div id="form-footer">
            <div id="mensagemErro"></div>
            <input type="submit" value="enviar" class="btn btn-info" id="confirm">
        </div>
    </form>
</div>