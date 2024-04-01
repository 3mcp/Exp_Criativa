const userBtn = document.querySelector(".userBtn");
const restauranteBtn = document.querySelector(".restaurantButton");
const nome = document.getElementById("inputNomeLabel");
const email = document.getElementById("inputEmailLabel");
const senha = document.getElementById("inputPasswordLabel");
const cepLabel = document.getElementById("inputCepLabel");
const cep = document.getElementById("inputCep");
const rua = document.getElementById("inputRua");
const ruaLabel = document.getElementById("inputRuaLabel");
const numero = document.getElementById("inputNumero");
const numeroLabel = document.getElementById("inputNumeroLabel");
const cnpj = document.getElementById("inputCNPJ");
const cnpjLabel = document.getElementById("inputCNPJLabel");

const signUpBtn = document.querySelector(".signUpButton");
const goBackBtn = document.querySelector(".goBackBtn");

userBtn.addEventListener("click", function () {
  userBtn.style.backgroundColor = "#D9DBD8";
  restauranteBtn.style.backgroundColor = "#9DBC98";
  nome.innerHTML = "Nome completo:";
  email.innerHTML = "Email:";
  senha.innerHTML = "Senha:";
  cepLabel.style.display = "none";
  cep.style.display = "none";
  ruaLabel.style.display = "none";
  rua.style.display = "none";
  numeroLabel.style.display = "none";
  numero.style.display = "none";
  cnpj.style.display = "none";
  cnpjLabel.style.display = "none";
});

restauranteBtn.addEventListener("click", function () {
  userBtn.style.backgroundColor = "#9DBC98";
  restauranteBtn.style.backgroundColor = "#D9DBD8";
  nome.innerHTML = "Nome do restaurante:";
  email.innerHTML = "Email do restaurante:";
  senha.innerHTML = "Senha do restaurante:";
  cep.style.display = "block";
  cepLabel.style.display = "block";
  ruaLabel.style.display = "block";
  rua.style.display = "block";
  numeroLabel.style.display = "block";
  numero.style.display = "block";
  cnpj.style.display = "block";
  cnpjLabel.style.display = "block";
});

goBackBtn.addEventListener("click", function () {
  window.location.href = "../index.php";
});
