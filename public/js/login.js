const email = document.getElementById("email");
const senha = document.getElementById("senha");
const form = document.getElementById("loginForm");
const MessageEmail = document.getElementById("emailEmpty");
const MessageSenha = document.getElementById("senhaEmpty");
const button = document.getElementById("confirm");

button.addEventListener("submit", (event)=>{
    event.preventDefault();
    
    if (nome.value == "") {
        MessageEmail.innerHTML = "O campo email é Obrigatório";
        MessageSenha.innerHTML = "O campo senha é Obrigatório";
        return;
    }

     if (senha.value == "") {
        MessageEmail.innerHTML = "O campo email é Obrigatório";
        MessageSenha.innerHTML = "O campo senha é Obrigatório";
        return;
    }

    form.submit();

});
