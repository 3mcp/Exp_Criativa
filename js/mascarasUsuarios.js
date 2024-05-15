const nome = document.getElementById("inputNome");

nome.addEventListener("input", function () {
  this.value = this.value.replace(/[^a-zA-Z\s]/g, "");
});
