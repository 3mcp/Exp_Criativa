const goBackBtn = document.querySelector(".goBackBtn");

function confirmarExcluir() {
  let text = "Confirme para a excluir a conta\nOK ou Cancel";
  if (confirm(text) == true) {
    text = "Voce deletou a conta";
  } else {
    text = "Voce cancelou";
  }
  document.getElementById("demo").innerHTML = text;
}

goBackBtn.addEventListener("click", function () {
  window.location.href = "../index.php";
});
