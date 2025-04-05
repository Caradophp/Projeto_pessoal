<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="shortcut icon" href="http://localhost/deucerto/phpup/Model_View_Controller/public/img/logo.png" type="image/x-icon">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
         integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" 
         crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   </head>
   <body>
      <br>
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
   </body>
</html>