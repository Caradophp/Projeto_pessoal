$("#busca").submit(function (event) {
    event.preventDefault();
    var dado = $("#procurar").val();

    $.ajax({
        url: "http://localhost/deucerto/phpup/Model_View_Controller/adminpainel/buscar",
        type: "POST",
        data: { dado: dado },
        dataType: "json",
        success: function (response) {
            $("#resultadoBusca").empty();
            if (response.length > 0) {
                response.forEach(function (usuario) {
                    $("#resultadoBusca").append(
                        "<div id='alterarDados' style='display: none;'>" +
                            "<h1>Alterar dados</h1>" +
                            "<form>" +
                                "<label for='id'>id:</label>" +
                                "<input type='number' name='id' id='id' value='1' class='form-control' disabled><br><br>" +
                               " <label for='nome'>Nome:</label>" +
                               " <input type='text' name='nome' id='nome' class='form-control'><br><br>" +
                               " <label for='email'>Email:</label>" +
                                "<input type='email' name='email' id='email' class='form-control'><br><br>" +
                            "</form>" +
                           " <br>" +
                           " <center>" +
                               " <button onclick=1alterarTelaFechar()1 id='echarPagina' class='btn btn-danger'>Fechar</button>" +
                           " </center>" +
                        "</div>"
                    );
                });
            } else {
                $("#resultadoBusca").html("<p>Nenhum resultado encontrado.</p>");
            }
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
            $("#mensagemErro").text("Erro ao processar a requisição: " + error);
        }
    });
});
