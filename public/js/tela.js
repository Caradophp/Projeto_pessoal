const transacoes = document.getElementById("transacoesTela");
const debitos = document.getElementById("debitosTela");
const dividas = document.getElementById("dividasTela");
const prestacao = document.getElementById("prestacaoTela");
const pendencias = document.getElementById("pendenciasTela");
const relatorios = document.getElementById("relatoriosTela");
const alterar = document.getElementById("alterarDados");
const resultado = document.getElementById("dividasTelaResultado");
const barra = document.querySelectorAll(".barra");
const seta = document.querySelectorAll("#seta");

function transacoesTelaAbrir() {
    transacoes.style.display = "block";
}

function transacoesTelaFechar() {
    transacoes.style.display = "none";
}

function debitosTelaAbrir() {
    debitos.style.display = "block";
}

function debitosTelaFechar() {
    debitos.style.display = "none";
}

function dividasTelaAbrir() {
    dividas.style.display = "block";
}

function dividasTelaFechar() {
    dividas.style.display = "none";
}

function prestacaoTelaAbrir() {
    prestacao.style.display = "block";
}

function prestacaoTelaFechar() {
    prestacao.style.display = "none";
}

function pendeciasTelaAbrir() {
    pendencias.style.display = "block";
}

function pendenciasTelaFechar() {
    pendencias.style.display = "none";
}

function relatoriosTelaAbrir() {
    relatorios.style.display = "block";
}

function relatoriosTelaFechar() {
    relatorios.style.display = "none";
}

function alterarTelaAbrir() {
    alterar.style.display = "block"
}

function alterarTelaFechar() {
    alterar.style.display = "none"
}

function dividasListaTelaAbrir() {
    resultado.style.display = "block";
}

function dividasListaTelaFechar() {
    resultado.style.display = "none";
}

seta.addEventListiner("click", (event)=>{
    barra.style.display = "none";
});
