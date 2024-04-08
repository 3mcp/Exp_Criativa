function confirmarExcluirRestaurante() {
  let text = "Confirme para a excluir a conta\nOK ou Cancel";
  if (confirm(text) == true) {
    window.location.href = 'databaseRestaurante/restauranteDeletar.php';
  } else {
    text = "Voce cancelou";
  }
  document.getElementById("demo").innerHTML = text;
}

function confirmarExcluirPRA() {
  let text = "Confirme para a excluir a conta\nOK ou Cancel";
  if (confirm(text) == true) {
    window.location.href = 'databasePRA/usuarioDeletar.php';
  } else {
    text = "Voce cancelou";
  }
  document.getElementById("demo").innerHTML = text;
}
