<div style="padding-top: 50px;">
    <div class="alert alert-danger" style="text-align:center;"><strong>Realize login para continuar</strong></div>
    <form id="loginForm">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" class="form-control"><br><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" class="form-control"><br><br>
        <h6>*Esqueceu sua Senha? <a href="">Clique aqui</a></h6>
        <center>
            <p id="mensagemErro" style="color: red;"></p>
            <div id="Message" style="color:red;"></div>
            <div class="loader" style="display:none;" id="loader"></div>
        </center><br>
        <input type="submit" value="enviar" class="btn btn-info" id="confirm">
    </form>
</div>