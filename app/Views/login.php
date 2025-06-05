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
            <h6>Esqueceu sua Senha? <a href="http://localhost/deucerto/phpup/Model_View_Controller/Alterarsenha">Clique aqui</a></h6>
            <center>
                <p id="mensagemErro" class="alert alert-danger" style="display:none"></p>
            </center><br>
            <input type="submit" value="enviar" class="btn btn-secondary" id="confirm">
        </div>
    </form>
</div>