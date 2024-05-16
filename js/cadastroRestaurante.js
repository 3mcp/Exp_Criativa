//cadastro de restaurante

//botao para ir ao cadastro de usuario
const userBtn = document.querySelector(".userBtn");
//botao que irá indicar que está na página de cadastro de restaurante
const restaurantBtn = document.querySelector(".restaurantBtn");

//botão de cadastrar-se
const signUpBtn = document.querySelector(".signUpButton");
//botão de voltar
const goBackBtn = document.querySelector(".goBackBtn");

//quando clicar no botão de cadastro de usuario, vai para cadastrousuario.php
userBtn.addEventListener("click", function () {
  window.location.href = "../inc/cadastroUsuario.php";
});

//quando clica no botão de voltar vai para a pagina iniciar
goBackBtn.addEventListener("click", function () {
  window.location.href = "../index.php";
});


//é sobrescrito no editar.js 

//quando essa função é chamada com uma string como argumento, ela retorna a mesma string sem espaços em branco no início e no final
function trim(str) {
  return str.replace(/^\s+|\s+$/g, '');
  }
  //função que valida o formulario do restaurante e apresenta mensagens de erro
  function validateForm() {
    //cria variavel para o nome do restaurante
      var nameValue = document.getElementById("inputNome").value.trim();
      //cria variavel para a mensagem de erro de nome
      var nameError = document.getElementById("nameError");
      //cria variavel para adicionar email
      var emailValue = document.getElementById("inputEmail").value;
      //cria variavel para adicionar uma senha
      var passwordValue = document.getElementById("inputPassword").value;
      //cria variavel para salvar a mensagem de erro do email
      var emailError = document.getElementById("emailError");
      //cria uma variavel para salvar a mensagem de erro da senha
      var passwordError = document.getElementById("passwordError");
      //cria uma variavel para salvar o valor do cep
      var cepValue = document.getElementById("inputCep").value;
      //cria uma variavel para salvar a mensagem de erro do cep
      var cepError = document.getElementById("cepError");
      //cria variavel para o valor da rua
      var ruaValue = document.getElementById("inputRua").value;
      //cria variavel para mensagem de erro da rua
      var ruaError = document.getElementById("ruaError");
      //cria variavel para o valor do numero 
      var numeroValue = document.getElementById("inputNumero").value;
      //cria variavel para a mensagem de erro do numero
      var numeroError = document.getElementById("numeroError");
      //cria uma variavel para o valor do cnpj
      var cnpjValue = document.getElementById("inputCNPJ").value;
      //cria uma variavel para a mensagem de erro do cnpj
      var cnpjError = document.getElementById("cnpjError");

      //nome do restaurante deve ter no minimo 2 palavras
      if (nameValue.length <= 2) {
          nameError.textContent = "Insira o nome completo";
          return false;
      } else {
          nameError.textContent = "";
      }

      //cria variavel para o padrao do email
      var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      //email deve seguir um padrao
      if (!emailPattern.test(emailValue)) {
          emailError.textContent = "Por favor, insira um email válido.";
          return false; 
      } else {
          emailError.textContent = ""; 
      }

      //cria variavel para o padrao da senha
      var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

      //senha deve seguir um padrao
      if (!passwordPattern.test(passwordValue)) {
          passwordError.innerHTML = "A senha deve ter no mínimo:<br>* 8 caracteres<br>* Uma letra maiúscula<br>* Um número<br>* Um caractere especial (@, $, !, %, *, ?, &).";
          return false; 
      } else {
          passwordError.textContent = ""; 
      }

      //cep deve ter mais que 9 numeros
      if (cepValue.length < 9) {
          cepError.textContent = "Insira um CEP válido";
          return false;
      } else {
          cepError.textContent = "";
      }

      //deve ser inserida uma rua
      if (ruaValue.length < 1) {
          ruaError.textContent = "Insira o nome da rua";
          return false;
      } else {
          ruaError.textContent = "";
      }

      //deve ter um numero de endereço
      if (numeroValue.length < 1) {
          numeroError.textContent = "Insira o número do endereço";
          return false;
      } else {
          numeroError.textContent = "";
      }

      //cnpj deve ter mais de 14 numeros
      if (cnpjValue.length < 14) {
          cnpjError.textContent = "Insira um CNPJ válido";
          return false;
      } else {
          cnpjError.textContent = "";
      }

      return true; 
  }
