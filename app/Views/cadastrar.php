<div style="padding-top: 50px;" id="cad-form">
    <div class="img-div">
        <img src="http://localhost/deucerto/phpup/Model_View_Controller/public/img/user.png" alt="user-logo" class="img-fluid">
        <h2>Seja bem vindo!</h2>
        <p>Faça seu cadastro para continuar</p>
    </div>
    <form method="post" id="form" class="row" style="margin: 50px;">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu nome" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="seuemail@gmail.com" required>
        </div>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite sua senha" minlength="8" required>
        </div>
        <div>
            <label for="tipo_pessoa">Tipo Pessoa:</label>
            <select class="form-select" name="tipo_pessoa" id="tipo_pessoa" required>
                <option value="FISICA" selected>FISICA</option>
                <option value="JURIDICA">JURIDICA</option>
            </select>
        </div>
        <div id="fcpf">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" class="form-control" maxlength="11" placeholder="Digite seu CPF">
        </div>
        <div id="fcnpj" style="display:none;">
            <label for="cnpj">CNPJ:</label>
            <input type="text" name="cnpj" id="cnpj" class="form-control" maxlength="14" placeholder="Digite seu CNPJ">
        </div>
        <div id="form-footer">
            <div id="mensagemErro"></div>
            <input type="submit" value="Cadastrar" class="btn btn-info" id="confirm">
            <br><br>
            <h6>Já possuí cadastro? <a href="http://localhost/deucerto/phpup/Model_View_Controller/login">Faça login</a></h6>
        </div>
    </form>
</div>

<script>
    const tipoPessoa = document.getElementById("tipo_pessoa");
    const campoCPF = document.getElementById("fcpf");
    const campoCNPJ = document.getElementById("fcnpj");

    tipoPessoa.addEventListener("change", () => {
        if (tipoPessoa.value === "FISICA") {
            campoCPF.style.display = "block";
            campoCNPJ.style.display = "none";
        } else {
            campoCPF.style.display = "none";
            campoCNPJ.style.display = "block";
        }
    });
</script>