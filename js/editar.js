function confirmarExcluirRestaurante() {
  let text = "Tem certeza que deseja excluir sua conta?";
  if (confirm(text) == true) {
    window.location.href = 'databaseRestaurante/restauranteDeletar.php';
  }
}

function confirmarExcluirPRA() {
  let text = "Tem certeza que deseja excluir sua conta?";
  if (confirm(text) == true) {
    window.location.href = 'databasePRA/usuarioDeletar.php';
  }
}
