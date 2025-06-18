<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>{{title}}</title>

  <!-- Font Awesome -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>

   <link rel="stylesheet" href="http://localhost/deucerto/phpup/Model_View_Controller/public/css/cadastrar.css">
   <!-- <link rel="stylesheet" href="http://localhost/deucerto/phpup/Model_View_Controller/public/css/Login.css"> -->

   <link rel="shortcut icon" href="http://localhost/deucerto/phpup/Model_View_Controller/public/img/logo.png" type="image/x-icon">

  <style>
    /* === estilo do dropdown de usuário === */
    .dropdown-user {
      position: relative;
    }
    .user-menu {
      display: none;
      position: absolute;
      right: 0;
      background: white;
      box-shadow: 0 0.25rem 0.5rem rgba(0,0,0,0.3);
      z-index: 1000;
      min-width: 8rem;
    }
    .user-menu.show {
      display: block;
    }
    .user-menu .btn {
      display: block;
      width: 100%;
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-sm bg-white">
      <div class="container-fluid">
        <a class="navbar-brand"
           href="http://localhost/deucerto/phpup/Model_View_Controller/home">
          <img src="http://localhost/deucerto/phpup/Model_View_Controller/public/img/logoPrincipal.png"
               alt="Logo Principal" width="48" height="48">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div id="collapsibleNavbar" class="">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/deucerto/phpup/Model_View_Controller/home">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/deucerto/phpup/Model_View_Controller/contato">CONTATO</a>
            </li>

            <!-- dropdown de usuário -->
            <li class="nav-item dropdown-user">
              <i id="userIcon" class="fa-solid fa-user nav-link" style="cursor: pointer; font-size:3vh"></i>
              <div id="userMenu" class="user-menu">
                <a href="http://localhost/deucerto/phpup/Model_View_Controller/login"
                   class="btn btn-sm btn-outline-info">Login</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class="pcorpo">
    {{conteudo | raw}}
  </main>

  <footer id="pfinal" class="mt-auto py-3 bg-light text-dark" style="position: relative; bottom: 0; width: 100%; height: 100%;">
    <div class="container text-center">
      <ul class="list-inline mb-2">
        <li class="list-inline-item"><i class="fa-brands fa-facebook"></i>&nbsp;Facebook</li>
        <li class="list-inline-item"><i class="fa-brands fa-instagram"></i>&nbsp;Instagram</li>
        <li class="list-inline-item"><i class="fa-brands fa-x-twitter"></i>&nbsp;Twitter</li>
      </ul>
      <p class="mb-0">© Todos os direitos reservados. 2025</p>
      <p class="mb-0">Desenvolvido por <strong class="text-warning">Luciano Friebe Feigl</strong></p>
    </div>
  </footer>

  <!-- jQuery (necessário para nosso script) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Scripts necessários para o funcionamento -->
   <script src="http://localhost/deucerto/phpup/Model_View_Controller/public/js/Cadastrar.js"></script>
   <script src="http://localhost/deucerto/phpup/Model_View_Controller/public/js/Logon.js"></script>
   <script src="http://localhost/deucerto/phpup/Model_View_Controller/public/js/login.js"></script>
   <script src="http://localhost/deucerto/phpup/Model_View_Controller/public/js/script.js"></script>
   <script src="http://localhost/deucerto/phpup/Model_View_Controller/public/js/validate.js"></script>

  <script>
    $(function() {
      // Ao clicar no ícone, alterna a exibição do menu
      $('#userIcon').on('click', function(e) {
        e.stopPropagation();
        $('#userMenu').toggleClass('show');
      });
      // Clique fora fecha o menu
      $(document).on('click', function() {
        $('#userMenu').removeClass('show');
      });
      // Clique dentro do menu não fecha
      $('#userMenu').on('click', function(e) {
        e.stopPropagation();
      });
    });
  </script>
</body>
</html>
