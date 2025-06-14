<div style="padding-top: 50px;" id="cad-form">
    <div class="alert alert-info" style="text-align:center; margin:50px;"><strong>Faça seu Cadastro</strong></div>
    <form method="post" id="form" class="row" style="margin: 50px;">
        <div class="col-6">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" min="100" max="150" placeholder="Digite seu nome">
        </div>
        <div class="col-6">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" min="100" max="150" placeholder="seuemail@gmail.com...">
        </div>
        <div class="col-6">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control" min="8" max="8" placeholder="Digite sua senha">
        </div>
        <div class="col-6">
            <label for="tipo_pessoa">Tipo Pessoa:</label>
            <select class="form-select">
                <option value="FISICA" selected>FISICA</option>
                <option value="JURIDICA">JURIDICA</option>
            </select>
        </div>
        <div class="col-6">
            <label for="telefone">Telefone:</label>
            <input type="password" name="telefone" id="telefone" class="form-control" min="11" max="11" placeholder="Digite seu telefone">
        </div>
        <div id="fcpf" class="col-6">
            <label for="cpf">CPF:</label>
            <input type="number" name="cpf" id="cpf" class="form-control" min="11" max="11" placeholder="Digite seu CPF">
        </div>
        <div id="fcnpj" class="col-6">
            <label for="cnpj">CNPJ:</label>
            <input type="number" name="cnpj" id="cnpj" class="form-control" min="14" max="14" placeholder="Digite seu CNPJ">
        </div>
        <div id="form-footer">
            <div id="mensagemErro"></div>
            <input type="submit" value="enviar" class="btn btn-info" id="confirm">
        </div>
    </form>
</div>