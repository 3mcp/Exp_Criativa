let idPratoSelecionado;
function on(id,idDoPrato) {
    document.getElementById(id).style.display = "block";
    if(idDoPrato){
      idPratoSelecionado = idDoPrato;
      document.getElementById("idPratoEditado").value = idDoPrato;
    }
      

  }
  
  function off(id) {
    document.getElementById(id).style.display = "none";
  }

function confirmarExclusao() {
  Swal.fire({
    title: "Tem certeza?",
    text: "Você realmente deseja excluir esse prato?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Sim, exclua!",
    cancelButtonText: "Cancelar"
}).then((result) => {
    if (result.isConfirmed) {
        window.location.href = "databasePrato/pratoDeletar.php?id="+idPratoSelecionado;
    }
});
}

function validarFormulario() {
  var checkboxes = document.querySelectorAll('input[name="pratoCategorias[]"]');
  var peloMenosUmSelecionado = false;
  checkboxes.forEach(function(checkbox) {
      if (checkbox.checked) {
          peloMenosUmSelecionado = true;
      }
  });
  if (!peloMenosUmSelecionado) {
      alert("Selecione pelo menos uma categoria para o prato.");
      return false; // Impede o envio do formulário
  }
  return true; // Permite o envio do formulário
}