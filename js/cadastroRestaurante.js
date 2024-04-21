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
