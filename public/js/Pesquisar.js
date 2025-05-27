
//Corrigir urgentimente o envio do ID do usuario URGENTE MESMO!!!!!

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
                        `<li class="list-group-item d-flex align-items-center justify-content-between shadow-sm rounded my-2 p-3" style="background-color: #f9f9f9;">
                            <div class="d-flex align-items-center">
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="avatar" width="40" height="40" class="rounded-circle me-3">
                                <span class="fw-bold fs-5">${usuario.nome}</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <p class="m-0" onclick="alterarTelaAbrir()" title="Editar">
                                    <i class="fa-solid fa-pencil text-primary" style="cursor: pointer;"></i>
                                </p>
                                <div title="Excluir" onclick="confimarExclusao(${usuario.id})" class="trash">
                                       <i class="fa-solid fa-trash text-danger" style="cursor: pointer;"></i>
                                </div>
                            </div>
                        </li>`
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
                            `<li class="list-group-item d-flex align-items-center justify-content-between shadow-sm rounded my-2 p-3" style="background-color: #f9f9f9;">
                                <div class="d-flex align-items-center">
                                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="avatar" width="40" height="40" class="rounded-circle me-3">
                                    <span class="fw-bold fs-5">${usuario.nome}</span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <p class="m-0" onclick="alterarTelaAbrir()" title="Editar">
                                        <i class="fa-solid fa-pencil text-primary" style="cursor: pointer;"></i>
                                    </p>
                                    <div title="Excluir" onclick="confimarExclusao(${usuario.id})" class="trash">
                                       <i class="fa-solid fa-trash text-danger" style="cursor: pointer;"></i>
                                    </div>
                                </div>
                            </li>`
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
