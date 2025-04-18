<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{title}}</title>
    <link rel="stylesheet" href="http://localhost/deucerto/phpup/Model_View_Controller/public/css/new.css">
    <link rel="stylesheet" href="http://localhost/deucerto/phpup/Model_View_Controller/public/css/telas.css">
    <link rel="stylesheet" href="http://localhost/deucerto/phpup/Model_View_Controller/public/css/Busca.css">
    <link rel="shortcut icon" href="http://localhost/deucerto/phpup/Model_View_Controller/public/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
     integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
         <div class="container-fluid">
          <a class="navbar-brand" href="http://localhost/deucerto/phpup/Model_View_Controller/home"><img src="http://localhost/deucerto/phpup/Model_View_Controller/public/img/logoPrincipal.png" alt="Logo Principal" width="48" heidth="48"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
           <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
           <ul class="navbar-nav">
             <li class="nav-item">
              <a class="nav-link" href="http://localhost/deucerto/phpup/Model_View_Controller/home">HOME</a>
             </li>
             <li class="nav-item">
              <a class="nav-link" href="http://localhost/deucerto/phpup/Model_View_Controller/contato">CONTATO</a>
             </li>
             <li class="nav-item">
              <a class="nav-link" href="http://localhost/deucerto/phpup/Model_View_Controller/cadastrar">CADASTRAR</a>
             </li>
           </ul>
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp
           <button class="btn btn-info"><a href="http://localhost/deucerto/phpup/Model_View_Controller/login/sair" style="text-decoration: none; color:black;">SAIR</a></button>
          </div>
         </div>
        </nav>
    </header>
    <main class="pcorpo">
        <div style="display: flex; flex-direction: row; gap: 200px">
            {{conteudo | raw}}
        </div>
        
        <div id="dividasTelaResultado" style="display:none;">
        <h3>Resultado da Busca</h3>
    
    {% if resultado is not empty %}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Categoria</th>
                    <th>Observação</th>
                </tr>
            </thead>
            <tbody>
                {% for item in resultado %}
                    <tr>
                        <td>{{ item.descricao }}</td>
                        <td>{{ item.valor }}</td>
                        <td>{{ item.categoria }}</td>
                        <td>{{ item.observacao }}</td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    {% else %}
        <p>Nenhum dado encontrado para o status informado.</p>
    {% endif %}
    
    <center>
        <button onclick="dividasListaTelaFechar()" id="fecharPaginaResultado" class="btn btn-danger">Fechar</button>
    </center>
</div>
<!-- 
<div>
    {{ erro }}
</div> -->

    </main>
    <footer id="pfinal">
        <ul>
            <li><i class="fa-brands fa-facebook"></i>&nbspFacebook</li>
            <li><i class="fa-brands fa-instagram"></i>&nbspInstagram</li>
            <li><i class="fa-brands fa-x-twitter"></i>&nbspTwitter</li>
        </ul>
        <div style="text-align:center;">
            <p>©Todos os direitos reservados. 2025</p>
            <p>Desenvolvido por <strong class="text-warning">Luciano Friebe Feigl</strong></p>
        </div>
    <footer>
    <script src="http://localhost/deucerto/phpup/Model_View_Controller/public/js/Pesquisar.js"></script>
    <script src="http://localhost/deucerto/phpup/Model_View_Controller/public/js/tela.js"></script>
    <script src="http://localhost/deucerto/phpup/Model_View_Controller/public/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>