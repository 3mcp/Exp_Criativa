function abrirLink(url) {
  window.open(url, "_blank"); // Abre o link em uma nova aba
}

//função que serve para pesquisar o nome dos restaurantes salvos no banco de dados
function searchRestaurantes() {
  //cria constantes de:
  //pega o id do search bar
  const searchBar = document.getElementById("search-bar");
  //pega o termo digitado no search bar e coloca tudo em lowercase
  const searchTerm = searchBar.value.toLowerCase();
  //chama todos os elementos com a classe restaurante
  const restaurantes = document.querySelectorAll(".restaurante");

  restaurantes.forEach((restaurante) => {
    //pegar o nome do restaurante
    const nome = restaurante.querySelector("h5").textContent.toLowerCase();
    //pegar a descrição do restaurante
    const descricao = restaurante.querySelector("p").textContent.toLowerCase();
    //se o nome ou descrição pesquisado estiver no search bar então deve aparecer no display de bloco
    if (nome.includes(searchTerm) || descricao.includes(searchTerm)) {
      restaurante.style.display = "block";
      //se não, não aparece nada
    } else {
      restaurante.style.display = "none";
    }
  });
  filtrarRestaurantes();
}

//filtrar elementos com base em seleções do usuário
function filtrarRestaurantes() {
  //aqui são armazenadas as categorias que foram selecionadas
  var categoriasSelecionadas = [];
  //pega todos os elementos com a classe categoria-checkbox
  var checkboxes = document.getElementsByClassName("categoria-checkbox");
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      //adiciona as categorias selecionadas ao array categoriasSelecionadas
      categoriasSelecionadas.push(checkboxes[i].value);
    }
  }
  console.log(categoriasSelecionadas);
  // Filtrando restaurantes
  // chama todos os elementos com a classe restaurante
  const restaurantes = document.querySelectorAll(".restaurante");
  restaurantes.forEach((restaurante) => {
    //pega as categorias do restaurante e coloca em um array
    const categorias = restaurante.getAttribute("categorias").split(",");
    console.log(categorias);

    if (categoriasSelecionadas.length == 0) {
      //se nenhuma categoria estiver selecionada, então todos os restaurantes aparecem
      return;
    } else {
      //se a categoria selecionada estiver no array de categorias do restaurante, então aparece no display de bloco
      var mostrar = false;
      categorias.forEach((categoria) => {
        //Verifica se a categoria do restaurante está no array de categorias selecionadas
        if (
          categoriasSelecionadas.includes(categoria) &&
          restaurante.style.display != "none"
        ) {
          mostrar = true;
        }
      });
      //Exibe ou esconde o restaurante
      if (mostrar) {
        restaurante.style.display = "block";
      } else {
        restaurante.style.display = "none";
      }
    }
  });
}
