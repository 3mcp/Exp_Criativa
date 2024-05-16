//cadastro de usuario

//botão para ir para o cadastro de restaurante
const restaurantBtn = document.querySelector(".restaurantBtn");

//botão de cadastrar-se
const signUpBtn = document.querySelector(".signUpButton");
//botão de voltar
const goBackBtn = document.querySelector(".goBackBtn");

//no botão de cadastro de restaurante, quando clicado vai para a pagina de cadastro de restaurante php
restaurantBtn.addEventListener("click", function () {
  window.location.href = "../inc/cadastroRestaurante.php";
});

//no botão voltar quando clicado vai para a página inicial 
goBackBtn.addEventListener("click", function () {
  window.location.href = "../index.php";
});

//quando essa função é chamada com uma string como argumento, ela retorna a mesma string sem espaços em branco no início e no final
function trim(str) {
  return str.replace(/^\s+|\s+$/g, '');
}

//valida o formulario de cadastro de usuario
function validateForm() {
  //cria uma variavel para salvar o nome do usuario
  var namePRAValue = document.getElementById("inputNome").value.trim();
  //cria uma variavel para salvar o username do usuario
  var usernamePRAValue = document.getElementById("inputUsername").value.trim();
  //cria uma variavel para salvar a mensagem que será apresenta quando a algo de errado no username
  var usernamePRAError = document.getElementById("userNamePRAerror").value;
  //cria uma variavel para salavr uma mensagem quando a algo de errado no nome 
  var namePRAError = document.getElementById("namePRAError");
  //cria uma variavel para salvar o email 
  var emailPRAValue = document.getElementById("inputEmail").value;
  //cria uma variavel para salvar a senha
  var passwordPRAValue = document.getElementById("inputPassword").value;
  //cria uma variavel para a mensagem de erro de um email errado
  var emailPRAError = document.getElementById("emailPRAError");
  //cria uma variavel para a mensagem de erro de senha
  var passwordPRAError = document.getElementById("passwordPRAError");

  //nome deve ter no minimo 2 palavras 
  if (namePRAValue.split(' ').length < 2) {
      namePRAError.textContent = "Insira seu nome completo";
      return false;
  } else {
      namePRAError.textContent = "";
  }
 //username deve ter mais de 10 letras
  if (usernamePRAValue.length > 10) {
    usernamePRAError.textContent = "Nomes de usuário de até 10 caracteres";
    return false;
  } else {
    usernamePRAError.textContent = "";
  }

  //cria variavel de padrão de email
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  //email deve seguir o padrao
  if (!emailPattern.test(emailPRAValue)) {
      emailPRAError.textContent = "Por favor, insira um email válido.";
      return false; 
  } else {
      emailPRAError.textContent = ""; 
  }

  //cria variavel de padrao de senha
  var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  //senha deve seguir este padrão
  if (!passwordPattern.test(passwordPRAValue)) {
      passwordPRAError.innerHTML = "A senha deve ter no mínimo:<br>* 8 caracteres<br>* Uma letra maiúscula<br>* Um número<br>* Um caractere especial (@, $, !, %, *, ?, &).";
      return false; 
  } else {
      passwordPRAError.textContent = ""; 
  }

  return true; 
}
