const nome = document.getElementById("inputNome");
const email = document.getElementById("inputEmail");
const password = document.getElementById("inputPassword");

const cep = document.getElementById("inputCep");
const street = document.getElementById("inputRua");
const numero = document.getElementById("inputNumero");
const cnpj = document.getElementById("inputCNPJ");

inputCep.addEventListener("input", function () {
  this.value = this.value
    .replace(/\D/g, "")
    .replace(/^(\d{5})(\d{1,3})?$/, "$1-$2");
});
