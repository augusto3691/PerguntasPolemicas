// Pega o objeto que veio da página de login
var usuario = JSON.parse(localStorage.getItem("usuario"));



//Monta a página
document.getElementById("nomeUser").innerHTML = usuario.nome.toUpperCase();