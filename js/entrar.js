const userBtn = document.getElementById("userButton");
const restauranteBtn = document.getElementById("restaurantButton");
const userForm = document.getElementById("pra");
const restauranteForm = document.getElementById("restaurante");

userBtn.addEventListener("click", function () {
  userBtn.style.backgroundColor = "white";
  userBtn.style.color = "#9DBC98";
  userBtn.style.fontWeight = "bold";
  restauranteBtn.style.backgroundColor = "#9DBC98";
  restauranteBtn.style.color = "white";
  restauranteBtn.style.fontWeight = "normal";
  
  userForm.style.display = "flex";
  restauranteForm.style.display = "none";
});

restauranteBtn.addEventListener("click", function () {
  userBtn.style.backgroundColor = "#9DBC98";
  userBtn.style.color = "white";
  userBtn.style.fontWeight = "normal";
  restauranteBtn.style.backgroundColor = "white";
  restauranteBtn.style.color = "#9DBC98";
  restauranteBtn.style.fontWeight = "bold";

  userForm.style.display = "none";
  restauranteForm.style.display = "flex";
});

goBackBtn.addEventListener("click", function () {
  window.location.href = "../index.php";
});
