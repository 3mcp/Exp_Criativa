//obtem botões
const userBtn = document.getElementById("userButton");
const restauranteBtn = document.getElementById("restaurantButton");
//obtem os formularios
const userForm = document.getElementById("pra");
const restauranteForm = document.getElementById("restaurante");

//quando clica no botao de usuario vai para o formulario de usuario nesta pagina
userBtn.addEventListener("click", function () {
  formularioUsuario();
});

//quando clica no botao de restaurante vai para o formulario de restaurante nesta pagina
restauranteBtn.addEventListener("click", function () {
  formularioRestaurante();
});

const formularioUsuario = () => {
  //Essa classe pode alterar a aparência do botão para indicar que ele está selecionado.
  userBtn.classList.toggle("selectedTypeBtn");
  //Altera o botão para mostar que ele não esta selecionado
  restauranteBtn.classList.toggle("selectedTypeBtn");

  //torna visivel
  userForm.style.display = "flex";
  //oculta
  restauranteForm.style.display = "none";
}

const formularioRestaurante = () => {
  //Altera o botão para mostar que ele não esta selecionado
  userBtn.classList.toggle("selectedTypeBtn");
  //Essa classe pode alterar a aparência do botão para indicar que ele está selecionado
  restauranteBtn.classList.toggle("selectedTypeBtn");

  //oculta
  userForm.style.display = "none";
  //torna visivel
  restauranteForm.style.display = "flex";
}
