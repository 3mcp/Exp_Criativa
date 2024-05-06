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
  userBtn.classList.toggle("selectedTypeBtn");
  restauranteBtn.classList.toggle("selectedTypeBtn");

  userForm.style.display = "flex";
  restauranteForm.style.display = "none";
}

const formularioRestaurante = () => {
  userBtn.classList.toggle("selectedTypeBtn");
  restauranteBtn.classList.toggle("selectedTypeBtn");

  userForm.style.display = "none";
  restauranteForm.style.display = "flex";
}
