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

// Adicionando evento de input à barra de pesquisa
document.addEventListener('DOMContentLoaded', function() {
    const searchBar = document.getElementById('search-bar');
    searchBar.addEventListener('input', searchRestaurantes);
});