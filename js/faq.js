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

// Obtém todas as perguntas e respostas
const perguntas = document.querySelectorAll('.pergunta');
const respostas = document.querySelectorAll('.resposta');

// Adiciona um evento de clique a cada pergunta
perguntas.forEach((pergunta, index) => {
    pergunta.addEventListener('click', () => {
        // Verifica se a resposta está visível
        const respostaAtual = respostas[index];
        const estaVisivel = respostaAtual.style.display === 'block';

        // Oculta todas as respostas
        respostas.forEach(resposta => {
            resposta.style.display = 'none';
        });

        // Mostra a resposta clicada se estiver oculta, oculta se estiver visível
        respostaAtual.style.display = estaVisivel ? 'none' : 'block';
    });
});