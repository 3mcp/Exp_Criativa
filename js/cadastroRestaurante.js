const userBtn = document.querySelector(".userBtn");
const restaurantBtn = document.querySelector(".restaurantBtn");

const signUpBtn = document.querySelector(".signUpButton");
const goBackBtn = document.querySelector(".goBackBtn");

userBtn.addEventListener("click", function () {
  window.location.href = "../inc/cadastroUsuario.php";
});

goBackBtn.addEventListener("click", function () {
  window.location.href = "../index.php";
});

function trim(str) {
  return str.replace(/^\s+|\s+$/g, '');
  }

  function validateForm() {
      var nameValue = document.getElementById("inputNome").value.trim();
      var nameError = document.getElementById("nameError");
      var emailValue = document.getElementById("inputEmail").value;
      var passwordValue = document.getElementById("inputPassword").value;
      var emailError = document.getElementById("emailError");
      var passwordError = document.getElementById("passwordError");
      var cepValue = document.getElementById("inputCep").value;
      var cepError = document.getElementById("cepError");
      var ruaValue = document.getElementById("inputRua").value;
      var ruaError = document.getElementById("ruaError");
      var numeroValue = document.getElementById("inputNumero").value;
      var numeroError = document.getElementById("numeroError");
      var cnpjValue = document.getElementById("inputCNPJ").value;
      var cnpjError = document.getElementById("cnpjError");

      if (nameValue.length <= 2) {
          nameError.textContent = "Insira o nome completo";
          return false;
      } else {
          nameError.textContent = "";
      }

      var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (!emailPattern.test(emailValue)) {
          emailError.textContent = "Por favor, insira um email válido.";
          return false; 
      } else {
          emailError.textContent = ""; 
      }

      var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

      if (!passwordPattern.test(passwordValue)) {
          passwordError.innerHTML = "A senha deve ter no mínimo:<br>* 8 caracteres<br>* Uma letra maiúscula<br>* Um número<br>* Um caractere especial (@, $, !, %, *, ?, &).";
          return false; 
      } else {
          passwordError.textContent = ""; 
      }

      if (cepValue.length < 9) {
          cepError.textContent = "Insira um CEP válido";
          return false;
      } else {
          cepError.textContent = "";
      }

      if (ruaValue.length < 1) {
          ruaError.textContent = "Insira o nome da rua";
          return false;
      } else {
          ruaError.textContent = "";
      }

      if (numeroValue.length < 1) {
          numeroError.textContent = "Insira o número do endereço";
          return false;
      } else {
          numeroError.textContent = "";
      }

      if (cnpjValue.length < 14) {
          cnpjError.textContent = "Insira um CNPJ válido";
          return false;
      } else {
          cnpjError.textContent = "";
      }

      return true; 
  }
