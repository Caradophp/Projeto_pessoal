<div class="container" id="login-form">
    <form id="loginForm">
        <div class="logo-img">
            <img src="http://localhost/deucerto/phpup/Model_View_Controller/public/img/logoPrincipal.png" alt="logo" class="img-form" width="80px" height="80px">
            <h2>FinanTech</h2>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control">
            <p id="emailEmpty" class="error"></p>
        </div>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control">
            <p id="senhaEmpty" class="error"></p>
        </div>
        <div class="footer">
            <h6>Esqueceu sua Senha? <p onclick="openModel()">Clique aqui</p></h6>
            <br>
            <h6>Ainda não é cadastrado? <a href="http://localhost/deucerto/phpup/Model_View_Controller/cadastrar">Cadastrar</a></h6>
            <center>
                <p id="mensagemErro" class="alert alert-danger" style="display:none"></p>
            </center><br>
            <input type="submit" value="enviar" class="btn btn-secondary" id="confirm">
        </div>
    </form>
</div>

<!--Models-->

<div id="senhaModel">
    <div class="dec">
        <legend>Recuperar Senha</legend>
        <form id="pass-form">
            <p>Digite o email cadastrado para podermos enviar o código de recuperação de senha</p>
            <label for="email">Email:</label>
            <input type="email" id="emailForPass" class="form-control" name="email" placeholder="Digite seu email">
            <p id="message"></p>
            <br>
            <button type="submit" class="btn btn-info" id="repass">Enviar</button>
            <button type="button" class="btn btn-danger" id="repass-close"><i class="fa-solid fa-xmark"></i>&nbsp;Fechar</button>
        </form>
    </div>
</div>

<div id="codeModel">
    <div class="dec">
        <form id="code-form">
            <p>Digite o código enviado para seu email</p>
            <label for="codigo">Código:</label>
            <input type="text" name="codigo" id="codigo" class="form-control">
            <br>
            <button type="submit" class="btn btn-info" id="verifique">Verificar</button>
            <button type="button" class="btn btn-danger" id="close-verifique"><i class="fa-solid fa-xmark"></i>&nbsp;Fechar</button>
        </form>
    </div>
</div>

<script>
    const open = document.getElementById("senhaModel");
    const close = document.getElementById("repass-close");
    const back = document.getElementById("login-form");
    function openModel() {
        open.style.display = "flex";
        open.style.transform = "translateY(0)"
        back.style.opacity = "0.5"
    }

    close.addEventListener('click', (event) => {
        open.style.display = "none";
        back.style.opacity = "1"
    });

    $("#close-verifique").click( function() {
        $("#codeModel").hide();
    });
</script>