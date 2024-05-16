function abrirLink(url) {
    window.open(url, '_blank'); // Abre o link em uma nova aba
}

//função que serve para pesquisar o nome dos restaurantes salvos no banco de dados
function searchRestaurantes() {
    //cria constantes de:
    //pega o id do search bar
    const searchBar = document.getElementById('search-bar');
    //pega o termo digitado no search bar e coloca tudo em lowercase
    const searchTerm = searchBar.value.toLowerCase();
    //chama todos os elementos com a classe restaurante
    const restaurantes = document.querySelectorAll('.restaurante');

    restaurantes.forEach(restaurante => {
        //pegar o nome do restaurante
        const nome = restaurante.querySelector('h5').textContent.toLowerCase();
        //pegar a descrição do restaurante
        const descricao = restaurante.querySelector('p').textContent.toLowerCase();
        //se o nome ou descrição pesquisado estiver no search bar então deve aparecer no display de bloco
        if (nome.includes(searchTerm) || descricao.includes(searchTerm)) {
            restaurante.style.display = 'block';
            //se não, não aparece nada
        } else {
            restaurante.style.display = 'none';
        }
    });
    filtrarRestaurantes();
}

//filtrar elementos com base em seleções do usuário
function filtrarRestaurantes() {
    //aqui são armazenadas as categorias que foram selecionadas
    var categoriasSelecionadas = [];
<<<<<<< Updated upstream
    var checkboxes = document.getElementsByClassName('categoria-checkbox');
=======
    //aqui pega todas as categorias que podem ser selecionadas
    var checkboxes = document.getElementsByClassName('categoriaCheckbox');
    //loop para verificar quais as caixas de seleção foram clicadas
>>>>>>> Stashed changes
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            categoriasSelecionadas.push(checkboxes[i].value);
        }
    }
<<<<<<< Updated upstream
    console.log(categoriasSelecionadas);
    // Filtrando restaurantes
    const restaurantes = document.querySelectorAll('.restaurante');

    restaurantes.forEach(restaurante => {
        const categorias = restaurante.getAttribute('categorias').split(',');
        console.log(categorias);
        if (categoriasSelecionadas.length == 0) {
            return;
        } else {
            var mostrar = false;
            categorias.forEach(categoria => {
                if (categoriasSelecionadas.includes(categoria)) {
                    mostrar = true;
                }
            });
            if (mostrar) {
                restaurante.style.display = 'block';
            } else {
                restaurante.style.display = 'none';
=======
    //imprime o que foi selecionado
    console.log(categoriasSelecionadas)
    
    //o elemento que deseja filtrar baseado nas categorias selecionadas
    var restaurantes = document.getElementsByClassName('restaurante');
    //loop que itera os restaurantes
    for (var j = 0; j < restaurantes.length; j++) {
        //pega o restaurante que esta "olhando" no momento
        var restaurante = restaurantes[j];
        //faz um split das categorias selecionadas para cada restaurante
        var categoriasRestaurante = restaurante.dataset.categorias.split(',');
        //seta uma variavel para false 
        var visivel = false;
        //verifica se o restaurante possui pelo menos uma das categorias selecionadas pelo usuário. Se sim, o restaurante é exibido, caso contrário, é oculto
        for (var k = 0; k < categoriasSelecionadas.length; k++) {
            //Se a categoria atual estiver presente nas categorias do restaurante, definimos a variável visivel como true
            if (categoriasRestaurante.includes(categoriasSelecionadas[k])) {
                visivel = true;
                break;
>>>>>>> Stashed changes
            }
        }
    });
  }
  


