//usado para aparecer a tela que mostra as informações do prato
function on(id, idDoPrato) {
  //o display da informações será em bloco
  document.getElementById(id).style.display = "block";
  //quando estiver no formulario de edição de prato
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

//fecha o bloco de informações do prato
function off(id) {
  document.getElementById(id).style.display = "none";
}

//função de confirmar a exclusão do prato
function confirmarExclusao() {
  Swal.fire({
    title: "Tem certeza?",
    text: "Você realmente deseja excluir esse prato?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Sim, exclua!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    //se for confirmado chama o php de deletar prato pelo id de pratoselecionado que é igual um id de prato
    if (result.isConfirmed) {
      window.location.href =
        "databasePrato/pratoDeletar.php?id=" + idPratoSelecionado;
    }
  });
}

//função que diz que pelo menos uma categoria deve ser selecionada
function validarFormulario() {
  //cria uma variavies para as categorias do prato
  var checkboxes = document.querySelectorAll('input[name="pratoCategorias[]"]');
  var precoPrato = document.getElementById("precoPrato");
  var peloMenosUmSelecionado = false;
  checkboxes.forEach(function (checkbox) {
    if (checkbox.checked) {
      peloMenosUmSelecionado = true;
    }
  });
  if (!peloMenosUmSelecionado) {
    Swal.fire({
      icon: "error",
      title: "Erro",
      text: "Selecione pelo menos uma categoria para o prato!"
    });
    return false; // Impede o envio do formulário
  }

  if (precoPrato.value < 0) {
    Swal.fire({
      icon: "error",
      title: "Erro",
      text: "O preço do prato não pode ser negativo!"
    });
    return false; // Impede o envio do formulário
  }

  return true; // Permite o envio do formulário
}

