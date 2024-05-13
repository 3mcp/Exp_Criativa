function on(id, idDoPrato) {
  document.getElementById(id).style.display = "block";
  if (idDoPrato && id == "editForm") {
    idPratoSelecionado = idDoPrato;
    document.getElementById("idPratoEditado").value = idDoPrato;
    fetch("databasePrato/pratoBuscar.php?id="+idDoPrato)
      .then((response) => response.text())
      .then((data) => {
        let prato = JSON.parse(data);
        console.log(prato)
        document.getElementById("pratoNomeN").value = prato.NomePrato;
        document.getElementById("pratoPrecoN").value = prato.PrecoPrato;
        document.getElementById("pratoDescricaoN").value = prato.DescricaoPrato;
        let categorias = prato.CategoriasPrato
        for (let i = 0; i < categorias.length; i++) {
          const categoria = categorias[i];
          console.log(categoria)
          document.getElementById("categoriaN_" + categoria.fk_Categoria_IdCategoria).checked = true;
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
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
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href =
        "databasePrato/pratoDeletar.php?id=" + idPratoSelecionado;
    }
  });
}

function validarFormulario() {
  var checkboxes = document.querySelectorAll('input[name="pratoCategorias[]"]');
  var peloMenosUmSelecionado = false;
  checkboxes.forEach(function (checkbox) {
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
