<div class = "le">
            <h2 style="text-align: center;">Relatório de Transações</h2>
            <br>
            <div class="container">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Usuário</th>
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th>Data</th>
                        <th>Status</th>
                    </tr>
                    {% for item in dados %}
                    <tr>
                        <td>{{ item.id }}</td>
                        <td>{{ item.usuario_id }}</td>
                        <td>{{ item.descricao }}</td>
                        <td>R$ {{ item.valor }}</td>
                        <td>{{ item.data_debito }}</td>
                        <td>{{ item.status }}</td>
                    </tr>
                    {% endfor %}
                </table>
            </div>

            <br>
            <!-- Botão para baixar o relatório -->
            <center>
            <a href="http://localhost/deucerto/phpup/Model_View_Controller/adminpainel/gerarPDF" target="_blank" class="btn btn-danger">Baixar PDF</a>
            </center>

            <br>

            <div>
                <center>
                    <h2>Lista de Usuarios</h2>
                </center>
                <div id="mensagemErro" style="color:red;"></div>
                <ul id="resultadoBusca" class="list-group"></ul>
            </div>  
        </div>
    </nav>
 <div id="transacoesTela" style="display:none;">
       <form action="http://localhost/deucerto/phpup/Model_View_Controller/adminpainel/transacao" method="post">
              <label for="">Origem:</label>
              <input type="text" class="form-control" name="transacoesOrigem">
              <label for="">Destino:</label>
              <input type="text" class="form-control" name="transacoesDestino">
              <label for="">Tipo:</label>
              <select  class="form-select">
                   <option value="0">Selecione...</option>
                   <option value="0">teste</option>
              </select><br>
              <center>
                 <input type="submit" value="Enviar" class="btn btn-info">
              </center>
       </form>
       <br>
       <center>
          <button onclick="transacoesTelaFechar()" id="fecharPagina" class="btn btn-danger">Fechar</button>
       </center>
 </div>

 <div id="debitosTela" style="display:none;">
        <form action="http://localhost/deucerto/phpup/Model_View_Controller/adminpainel/debitosInserir" method="post">
        <label for="usuario_id">Usuário ID:</label>
            <select  class="form-select" name="usuario_id">
                    <option value="0">Selecione...</option>
                    {% for user in listaUsuario %}
                        <option value="{{ user.id }}">{{ user.nome }}</option>
                    {% endfor %}
            </select>

            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" class="form-control">

            <label for="valor">Valor:</label>
            <input type="number" step="0.01" name="valor" class="form-control">

            <label for="data_debito">Data de Débito:</label>
            <input type="date" name="data_debito" class="form-control">

            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria" class="form-control">

            <label for="forma_pagamento">Forma de Pagamento:</label>
            <input type="text" name="forma_pagamento" class="form-control">

            <label for="referencia">Referência:</label>
            <input type="text" name="referencia" class="form-control">

            <label for="status">Status:</label>
            <select name="status" class="form-select">
                <option value="0">Selecione...</option>
                <option value="pendente">Pendente</option>
                <option value="pago">Pago</option>
            </select>

            <label for="observacao">Observação:</label>
            <textarea name="observacao" class="form-control"></textarea>

            <br>
            <center>
                <input type="submit" value="Enviar" class="btn btn-info">
            </center>
        </form>
        
        <br>
        <center>
            <button onclick="debitosTelaFechar()" id="fecharPagina" class="btn btn-danger">Fechar</button>
        </center>
    </div>

 <div id="dividasTela" style="display:none;">
    <form action="http://localhost/deucerto/phpup/Model_View_Controller/adminpainel/dividaListar" method="post">
        <label for="usuario_id">Usuário ID:</label>
        <select  class="form-select" name="usuario_id">
                   <option value="0">Selecione...</option>
                   {% for user in listaUsuario %}
                    <option value="{{ user.id }}">{{ user.nome }}</option>
                   {% endfor %}
         </select>
        <!-- <input type="text" name="usuario_id" class="form-control"> -->
        <label for="categoria">Categoria:</label>
        <input type="text" name="categoria" class="form-control">
        <label for="statusDivida">Status:</label>
        <input type="text" name="statusDivida" class="form-control">
        <label for="forma_pagamento">Forma de Pagamento:</label>
        <input type="text" name="forma_pagamento" class="form-control"><br>
        <!-- <label for="">Tipo:</label>
              <select  class="form-select" name="statusDivida">
                   <option value="0">Selecione...</option>
                   <option value="1">Confirmado</option>
                   <option value="2">Pendente</option>
              </select> Corrigido para passar o nome correto -->
        
        <center>
            <input type="submit" value="Enviar" class="btn btn-info">
        </center>
    </form>
    <br>
    <center>
        <button onclick="dividasTelaFechar()" id="fecharPagina" class="btn btn-danger">Fechar</button>
    </center>
</div>


 <div id="prestacaoTela" style="display:none;">
       <form action="teste">
              <label for="">Origem:</label>
              <input type="text" class="form-control">
              <label for="">Destino:</label>
              <input type="text" class="form-control">
              <label for="">Tipo:</label>
              <select  class="form-select">
                   <option value="0">Selecione...</option>
                   <option value="0">teste</option>
              </select><br>
              <center>
              <button type="submit" class="btn btn-info">
                 <span class="glyphicon glyphicon-search"></span> Search
              </button>
                 
              </center>
       </form>
       <br>
       <center>
          <button onclick="prestacaoTelaFechar()" id="fecharPagina" class="btn btn-danger">Fechar</button>
       </center>
 </div>

 <div id="pendenciasTela" style="display:none;">
       <form action="teste">
              <label for="">Origem:</label>
              <input type="text" class="form-control">
              <label for="">Destino:</label>
              <input type="text" class="form-control">
              <label for="">Tipo:</label>
              <select  class="form-select">
                   <option value="0">Selecione...</option>
                   <option value="0">teste</option>
              </select><br>
              <center>
                 <input type="submit" value="Enviar" class="btn btn-info">
              </center>
       </form>
       <br>
       <center>
          <button onclick="pendenciasTelaFechar()" id="fecharPagina" class="btn btn-danger">Fechar</button>
       </center>
 </div>

 <div id="relatoriosTela" style="display:none;">
       <form action="http://localhost/deucerto/phpup/Model_View_Controller/adminpainel/relatorio" method="post" target="_blank">
              <label for="">Origem:</label>
              <input type="text" class="form-control">
              <label for="">Destino:</label>
              <input type="text" class="form-control">
              <label for="">Tipo:</label>
              <select  class="form-select">
                   <option value="0">Selecione...</option>
                   <option value="0">teste</option>
              </select><br>
              <center>
                 <input type="submit" value="Enviar" class="btn btn-info">
              </center>
       </form>
       <br>
       <center>
          <button onclick="relatoriosTelaFechar()" id="fecharPagina" class="btn btn-danger">Fechar</button>
       </center>
 </div>

 <div id="alterarDados" style="display: none;">
    <h1>Alterar dados</h1>
    <form action="">
        <label for="id">id:</label>
        <input type="number" name="id" id="id" value="1" class="form-control" disabled><br><br>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" class="form-control"><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control"><br><br>
    </form>
    <br>
       <center>
          <button onclick="alterarTelaFechar()" id="fecharPagina" class="btn btn-danger">Fechar</button>
       </center>
 </div>