const restaurantBtn = document.querySelector(".restaurantBtn");

const signUpBtn = document.querySelector(".signUpButton");
const goBackBtn = document.querySelector(".goBackBtn");

restaurantBtn.addEventListener("click", function () {
  window.location.href = "../inc/cadastroRestaurante.php";
});

goBackBtn.addEventListener("click", function () {
  window.location.href = "../index.php";
});
