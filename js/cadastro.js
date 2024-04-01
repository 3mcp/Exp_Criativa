const userBtn = document.querySelector(".userBtn");
const restauranteBtn = document.querySelector(".restaurantButton");
const nome = document.getElementById("inputNomeLabel");
const email = document.getElementById("inputEmailLabel");
const senha = document.getElementById("inputPasswordLabel");

userBtn.addEventListener("click", function () {
  userBtn.style.backgroundColor = "#D9DBD8";
  restauranteBtn.style.backgroundColor = "#9DBC98";
  nome.innerHTML = "Nome completo:";
  email.innerHTML = "Email:";
  senha.innerHTML = "Senha:";
});

restauranteBtn.addEventListener("click", function () {
  userBtn.style.backgroundColor = "#9DBC98";
  restauranteBtn.style.backgroundColor = "#D9DBD8";
  nome.innerHTML = "Nome do restaurante:";
  email.innerHTML = "Email do restaurante:";
  senha.innerHTML = "Senha do restaurante:";
});
