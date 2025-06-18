<div style="padding-top: 50px;" id="cad-form">
     <div>
        <img src="http://localhost/deucerto/phpup/Model_View_Controller/public/img/user.png" alt="user-logo" class="img-fluid">
    </div>
        <form method="post" id="form" class="row" style="margin: 50px;">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" min="100" max="150" placeholder="Digite seu nome">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" min="100" max="150" placeholder="seuemail@gmail.com...">
            </div>
            <div>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" class="form-control" min="8" max="8" placeholder="Digite sua senha">
            </div>
            <div>
                <label for="tipo_pessoa">Tipo Pessoa:</label>
                <select class="form-select" id="tipo_pessoa">
                    <option value="FISICA" selected>FISICA</option>
                    <option value="JURIDICA">JURIDICA</option>
                </select>
            </div>
            <div id="fcpf">
                <label for="cpf">CPF:</label>
                <input type="number" name="cpf" id="cpf" class="form-control" minlength="11" maxlength="11" placeholder="Digite seu CPF">
            </div>
            <div id="fcnpj">
                <label for="cnpj">CNPJ:</label>
                <input type="number" name="cnpj" id="cnpj" class="form-control" minlength="14" maxlength="14" placeholder="Digite seu CNPJ">
            </div>
            <div id="form-footer">
                <div id="mensagemErro"></div>
                <input type="submit" value="enviar" class="btn btn-info" id="confirm">
            </div>
        </form>
    </div>
</div>