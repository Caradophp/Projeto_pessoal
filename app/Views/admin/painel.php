 <div class="grid-container">
        <div class="box blue" onclick="transacoesTelaAbrir()">Depósitos</div>
        <div class="box yellow" onclick="debitosTelaAbrir()">Débitos</div>
        <div class="box red" onclick="dividasTelaAbrir()">Divídas</div>
        <div class="box purple" onclick="prestacaoTelaAbrir()">Prestação de contas</div>
        <div class="box orange" onclick="pendeciasTelaAbrir()">Pendências</div>
        <div class="box darkblue"  onclick="relatoriosTelaAbrir()">Relatórios</div>
        <!-- <div class="box lightblue"><a href="">Elements</a></div>
        <div class="box teal"><a href="">Calendar</a></div>
        <div class="box gold"><a href="">Errors</a></div> -->
 </div>

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
          <button onclick="debitosTelaFechar()" id="fecharPagina" class="btn btn-danger">Fechar</button>
       </center>
 </div>

 <div id="dividasTela" style="display:none;">
    <form action="http://localhost/deucerto/phpup/Model_View_Controller/adminpainel/dividaListar" method="post">
        <label for="statusDivida">Status:</label>
        <input type="text" name="statusDivida" class="form-control"><br>
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
                 <input type="submit" value="Enviar" class="btn btn-info">
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
          <button onclick="relatoriosTelaFechar()" id="fecharPagina" class="btn btn-danger">Fechar</button>
       </center>
 </div>
