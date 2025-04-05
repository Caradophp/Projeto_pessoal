<div style="padding-top: 50px;">
    <div class="alert alert-info" style="text-align:center;"><strong>Faça seu Cadastro</strong></div>
    <form action="http://localhost/deucerto/phpup/Model_View_Controller/cadastrar/cadastrar" method="post" id="form">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" class="form-control"><br><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" class="form-control"><br><br>
        <center>
        {% if error %}
            <div style="color: red; font-weight: bold;">
                {{ error }}
            </div>
        {% endif %}
            <div id="Message" style="color:red;"></div>
        <div class="loader" style="display:none;" id="loader"></div>
        </center>
        <input type="submit" value="enviar" class="btn btn-info" id="confirm">
    </form>
</div>