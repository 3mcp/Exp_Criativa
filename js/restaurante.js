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
    filtrarRestaurantes();
}

function filtrarRestaurantes() {
    var categoriasSelecionadas = [];
    var checkboxes = document.getElementsByClassName('categoria-checkbox');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            categoriasSelecionadas.push(checkboxes[i].value);
        }
    }
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
            }
        }
    });
  }
  


