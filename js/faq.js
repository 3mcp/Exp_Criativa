function searchTopics() {
    const searchBar = document.getElementById('search-bar');
    const searchTerm = searchBar.value.toLowerCase();
    const topicos = document.querySelectorAll('.topico');

    topicos.forEach(topico => {
        const titulo = topico.querySelector('h1').textContent.toLowerCase();
        const paragrafo = topico.querySelector('p').textContent.toLowerCase();
        if (titulo.includes(searchTerm) || paragrafo.includes(searchTerm)) {
            topico.style.display = 'block';
        } else {
            topico.style.display = 'none';
        }
    });
}

// Adicionando evento de input à barra de pesquisa
document.addEventListener('DOMContentLoaded', function() {
    const searchBar = document.getElementById('search-bar');
    searchBar.addEventListener('input', searchTopics);
});