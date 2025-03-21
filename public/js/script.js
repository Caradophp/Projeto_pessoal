const nome = document.getElementById("nome");
const senha = document.getElementById("senha");
const form = document.getElementById("form");
//const msg = document.getElementById("msg");

form.addEventListener("submit", (event)=>{
    event.preventDefault();
    
    if (nome.value == "") {
        alert("Preencha todos os campos");
        return;
    }

     if (senha.value == "") {
        alert("Preencha todos os campos");
        return;
    }

    form.submit();
});