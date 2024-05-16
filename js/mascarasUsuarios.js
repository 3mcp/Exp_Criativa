//serve para pegar o nome do usuario
const nome = document.getElementById("inputNome");

//unica mascara utilizada é para garantir que o nome tenha apenas letras
nome.addEventListener("input", function () {
  this.value = this.value.replace(/[^a-zA-Z\s]/g, "");
});
