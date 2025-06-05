function confimarExclusao(id) {
    let quest = "Tem certeza que deseja excluir esse registro?";

    if (confirm(quest)) {
        $.ajax({
            method: "POST",
            url: "http://localhost/deucerto/phpup/Model_View_Controller/adminpainel/excluir/" + id,
            success: function (response) {
                alert("Excluído com sucesso! ");
                location.reload(); // Recarrega a página pra atualizar a lista
            },
            error: function (xhr, status, error) {
                alert("Erro ao excluir: " + error);
                console.log(xhr.responseText);
            }
        });
    } else {
        alert("Exclusão cancelada");
    }
}
