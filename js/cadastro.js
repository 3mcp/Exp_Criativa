const restaurantBtn = document.querySelector(".restaurantBtn");

const signUpBtn = document.querySelector(".signUpButton");
const goBackBtn = document.querySelector(".goBackBtn");

restaurantBtn.addEventListener("click", function () {
  window.location.href = "../inc/cadastroRestaurante.php";
});

goBackBtn.addEventListener("click", function () {
  window.location.href = "../index.php";
});

function trim(str) {
  return str.replace(/^\s+|\s+$/g, '');
}

function validateForm() {
  var namePRAValue = document.getElementById("inputNome").value.trim();
  var namePRAError = document.getElementById("namePRAError");
  var emailPRAValue = document.getElementById("inputEmail").value;
  var passwordPRAValue = document.getElementById("inputPassword").value;
  var emailPRAError = document.getElementById("emailPRAError");
  var passwordPRAError = document.getElementById("passwordPRAError");

  if (namePRAValue.split(' ').length < 2) {
      namePRAError.textContent = "Insira seu nome completo";
      return false;
  } else {
      namePRAError.textContent = "";
  }

  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailPattern.test(emailPRAValue)) {
      emailPRAError.textContent = "Por favor, insira um email válido.";
      return false; 
  } else {
      emailPRAError.textContent = ""; 
  }

  var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  if (!passwordPattern.test(passwordPRAValue)) {
      passwordPRAError.innerHTML = "A senha deve ter no mínimo:<br>* 8 caracteres<br>* Uma letra maiúscula<br>* Um número<br>* Um caractere especial (@, $, !, %, *, ?, &).";
      return false; 
  } else {
      passwordPRAError.textContent = ""; 
  }

  return true; 
}
