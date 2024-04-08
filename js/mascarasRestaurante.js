const nome = document.getElementById("inputNome");

const cep = document.getElementById("inputCep");
const street = document.getElementById("inputRua");
const numero = document.getElementById("inputNumero");
const cnpj = document.getElementById("inputCNPJ");

const handleZipCode = (event) => {
  let input = event.target;
  input.value = zipCodeMask(input.value);
};

const handleCnpj = (event) => {
  let input = event.target;
  input.value = cnpjMask(input.value);
};

const cnpjMask = (value) => {
  if (!value) return "";
  value = value.replace(/\D/g, "");
  value = value.replace(/(\d{2})(\d)/, "$1.$2");
  value = value.replace(/(\d{3})(\d)/, "$1.$2");
  value = value.replace(/(\d{3})(\d)/, "$1/$2");
  value = value.replace(/(\d{4})(\d)/, "$1-$2");
  return value;
};

const zipCodeMask = (value) => {
  if (!value) return "";
  value = value.replace(/\D/g, "");
  value = value.replace(/(\d{5})(\d)/, "$1-$2");
  return value;
};

cep.addEventListener("input", function () {
  this.value = this.value.replace(/\D/g, "");
});

cnpj.addEventListener("input", function () {
  this.value = this.value.replace(/\D/g, "");
});

street.addEventListener("input", function () {
  this.value = this.value.replace(/[^\w\s]/gi, "");
});

nome.addEventListener("input", function () {
  this.value = this.value.replace(/[^a-zA-Z\s]/g, "");
});

numero.addEventListener("input", function () {
  this.value = this.value.replace(/\D/g, "");
});
