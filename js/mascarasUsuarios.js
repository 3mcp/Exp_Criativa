const nome = document.getElementById("inputNome");
const email = document.getElementById("inputEmail");
const password = document.getElementById("inputPassword");

nome.addEventListener("input", function () {
  this.value = this.value.replace(/[^a-zA-Z\s]/g, "");
});
