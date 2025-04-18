$(document).ready(function () {
    // Busca automática ao carregar
    $.ajax({
        url: "http://localhost/deucerto/phpup/Model_View_Controller/adminpainel/buscar",
        type: "POST",
        data: { dado: "" },
        dataType: "json",
        success: function (response) {
            $("#resultadoBusca").empty();
            if (response.length > 0) {
                response.forEach(function (usuario) {
                    $("#resultadoBusca").append(
                        "<li class='list-group-item'>" + usuario.nome +
                        "<span class='options'><p onclick='alterarTelaAbrir()'><i class='fa-solid fa-pencil' id='pencil'>" +
                        "</i></p><a href='http://localhost/deucerto/phpup/Model_View_Controller/adminpainel/excluir/" +
                        usuario.id + "'><i class='fa-solid fa-trash' id='trash'></i></a></span></li>"
                    );
                });
            } else {
                $("#resultadoBusca").html("<p>Nenhum resultado encontrado.</p>");
            }
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
            $("#mensagemErro").text("Erro ao buscar dados iniciais: " + error);
        }
    });

    // Quando o usuário enviar uma busca
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
                            "<li class='list-group-item'>" + usuario.nome +
                            "<span class='options'><p onclick='alterarTelaAbrir()'><i class='fa-solid fa-pencil' id='pencil'>" +
                            "</i></p><a href='http://localhost/deucerto/phpup/Model_View_Controller/adminpainel/excluir/" +
                            usuario.id + "'><i class='fa-solid fa-trash' id='trash'></i></a></span></li>"
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
});
