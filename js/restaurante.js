function abrirLink(url) {
    window.open(url, '_blank'); // Abre o link em uma nova aba
}

function searchRestaurantes() {
    const searchBar = document.getElementById('search-bar');
    const searchTerm = searchBar.value.toLowerCase();
    const restaurantes = document.querySelectorAll('.restaurante');

    restaurantes.forEach(restaurante => {
        const nome = restaurante.querySelector('h5').textContent.toLowerCase();
        const descricao = restaurante.querySelector('p').textContent.toLowerCase();
        if (nome.includes(searchTerm) || descricao.includes(searchTerm)) {
            restaurante.style.display = 'block';
        } else {
            restaurante.style.display = 'none';
        }
    });
}

function filtrarRestaurantes() {
    var categoriasSelecionadas = [];
    var checkboxes = document.getElementsByClassName('categoriaCheckbox');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            categoriasSelecionadas.push(checkboxes[i].value);
        }
    }
    
    var restaurantes = document.getElementsByClassName('restaurante');
    for (var j = 0; j < restaurantes.length; j++) {
        var restaurante = restaurantes[j];
        var categoriasRestaurante = restaurante.dataset.categorias.split(',');
        var visivel = false;
        for (var k = 0; k < categoriasSelecionadas.length; k++) {
            if (categoriasRestaurante.includes(categoriasSelecionadas[k])) {
                visivel = true;
                break;
            }
        }
        if (visivel) {
            restaurante.style.display = 'block';
        } else {
            restaurante.style.display = 'none';
        }
    }
  }
  


