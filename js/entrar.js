const userBtn = document.getElementById("userButton");
const restauranteBtn = document.getElementById("restaurantButton");
const userForm = document.getElementById("pra");
const restauranteForm = document.getElementById("restaurante");


userBtn.addEventListener("click", function () {
  formularioUsuario();
});

restauranteBtn.addEventListener("click", function () {
  formularioRestaurante();
});

const formularioUsuario = () => {
  userBtn.style.backgroundColor = "#d9dbd8";
  userBtn.style.color = "#9DBC98";
  restauranteBtn.style.backgroundColor = "#9DBC98";
  restauranteBtn.style.color = "white";
  restauranteBtn.style.fontWeight = "normal";
  userForm.style.display = "flex";
  restauranteForm.style.display = "none";
}

const formularioRestaurante = () => {
  userBtn.style.backgroundColor = "#9DBC98";
  userBtn.style.color = "white";
  userBtn.style.fontWeight = "normal";
  restauranteBtn.style.backgroundColor = "#d9dbd8";
  restauranteBtn.style.color = "white";

  userForm.style.display = "none";
  restauranteForm.style.display = "flex";
}
