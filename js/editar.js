//javascript para a edição tanto do PRA quanto do restaurante quanto do admin
//é chamdo em editarperfil php

//função para excluir o restaurante
function confirmarExcluirRestaurante() {
  Swal.fire({
    title: "Tem certeza?",
    text: "Você realmente deseja excluir sua conta?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Sim, exclua!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    //se for confirmado vai chamar o deletar restaurante php
    if (result.isConfirmed) {
      window.location.href = "databaseRestaurante/restauranteDeletar.php";
    }
  });
}

//função para excluir PRA
function confirmarExcluirPRA() {
  Swal.fire({
    title: "Tem certeza?",
    text: "Você realmente deseja excluir sua conta?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Sim, exclua!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    //se for confirmado vai chamar em deletar usuario php
    if (result.isConfirmed) {
      window.location.href = "databasePRA/usuarioDeletar.php";
    }
  });
}

//função para a validação de imagens adicionadas pelos usuarios (restaurante e pra) em editar perfil php
function validaImagem(input) {
  //variavel para salvar o que foi adiciona para a foto
  var caminho = input.value;

  //se o caminho não estiver vazio
  if (caminho) {
    var comecoCaminho =
      //Esta parte do código identifica o índice do último \ ou / no caminho para extrair o nome do arquivo.
      caminho.indexOf("\\") >= 0
        ? caminho.lastIndexOf("\\")
        : caminho.lastIndexOf("/");
    var nomeArquivo = caminho.substring(comecoCaminho);

    //Se o nome do arquivo começa com \ ou /, esses caracteres são removidos.
    if (nomeArquivo.indexOf("\\") === 0 || nomeArquivo.indexOf("/") === 0) {
      nomeArquivo = nomeArquivo.substring(1);
    }

    //A extensão do arquivo é extraída após o último ponto . no nome do arquivo.
    var extensaoArquivo =
      nomeArquivo.indexOf(".") < 1 ? "" : nomeArquivo.split(".").pop();

    //Se a extensão do arquivo não for uma das permitidas (gif, png, jpg, jpeg), o campo de entrada é resetado (input.value = "") e um alerta é exibido.
    if (
      extensaoArquivo != "gif" &&
      extensaoArquivo != "png" &&
      extensaoArquivo != "jpg" &&
      extensaoArquivo != "jpeg"
    ) {
      input.value = "";
      alert(
        "É preciso selecionar um arquivo de imagem (gif, png, jpg ou jpeg)"
      );
    }
    //Se o caminho estiver vazio, o campo de entrada é resetado e um alerta é exibido.
  } else {
    input.value = "";
    alert("Selecione um caminho de arquivo válido");
  }
  //o tamanho do arquivo é verificado.
  if (input.files && input.files[0]) {
    var arquivoTam = input.files[0].size / 1024 / 1024;
    //Se o arquivo tiver menos de 16 MB, um FileReader é usado para ler o arquivo.
    //Quando o arquivo for carregado (reader.onload), a função define o atributo src do elemento de imagem (imagemSelecionada) com o conteúdo do arquivo.
    //Adiciona a classe edit-profile-avatar ao elemento de imagem.
    if (arquivoTam < 16) {
      var reader = new FileReader();
      reader.onload = function (e) {
        let imagem = document.getElementById("imagemSelecionada");
        imagem.setAttribute("src", e.target.result);
        imagem.classList.add("edit-profile-avatar");
      };
      reader.readAsDataURL(input.files[0]);
      //Se o arquivo for maior que 16 MB, o campo de entrada é resetado e um alerta é exibido.
    } else {
      input.value = "";
      alert("O arquivo precisa ser uma imagem com menos de 16 MB");
    }
    //Se não houver arquivos selecionados (após todas as verificações), o src da imagem selecionada é definido como #.
  } else {
    document.getElementById("imagemSelecionada").setAttribute("src", "#");
  }
}

//quando essa função é chamada com uma string como argumento, ela retorna a mesma string sem espaços em branco no início e no final
function trim(str) {
  return str.replace(/^\s+|\s+$/g, "");
}

//usado em editarperfil.php para validar o formulario de pra
function validateuserForm() {
  var nameuserValue = document.getElementById("inputuserNome").value.trim();
  var nameuserError = document.getElementById("nameuserError");
  var emailuserValue = document.getElementById("inputEmail").value;
  var passwordPRAValue = document.getElementById("inputSenha").value;
  var emailuserError = document.getElementById("emailuserError");
  var passworduserError = document.getElementById("passworduserError");

  //nome deve ter no minimo 2 palavras
  if (nameuserValue.split(" ").length < 2) {
    nameuserError.textContent = "Insira seu nome completo";
    return false;
  } else {
    nameuserError.textContent = "";
  }

  //cria variavel de padrão de email
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  //email deve seguir o padrao
  if (!emailPattern.test(emailuserValue)) {
    emailuserError.textContent = "Por favor, insira um email válido.";
    return false;
  } else {
    emailuserError.textContent = "";
  }

  //padrao para a senha
  var passwordPattern =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  //senha deve seguir um padrao
  if (!passwordPattern.test(passwordPRAValue) && passwordPRAValue != "") {
    passworduserError.innerHTML =
      "A senha deve ter no mínimo:<br>* 8 caracteres<br>* Uma letra maiúscula<br>* Um número<br>* Um caractere especial (@, $, !, %, *, ?, &).";
    return false;
  } else {
    passworduserError.textContent = "";
  }

  return true;
}

//valida formulario de edição do restaurante em editarperfil.php
function validaterestaurantForm() {
  var restaurantValue = document.getElementById("inputNome").value.trim();
  var restauranteError = document.getElementById("nomeRestauranteErro");
  var emailrestauranteValue = document.getElementById("inputuserEmail").value;
  var passwordrestauranteValue =
    document.getElementById("senhaRestaurante").value;
  var emailrestauranteError = document.getElementById("emailRestauranteErro");
  var passwordrestauranteError = document.getElementById(
    "senhaRestauranteErro"
  );
  var cepValue = document.getElementById("inputCep").value;
  var cepError = document.getElementById("cepError");
  var ruaValue = document.getElementById("inputRua").value;
  var ruaError = document.getElementById("ruaError");
  var numeroValue = document.getElementById("inputNumero").value;
  var numeroError = document.getElementById("numeroError");
  var cnpjValue = document.getElementById("inputCNPJ").value;
  var cnpjError = document.getElementById("cnpjError");
  var siteUrlValue = document.getElementById("inputSiteUrl").value;
  var siteUrlError = document.getElementById("siteUrlError");

  //o nome completo do restaurante deve ter pelo menso 2 nomes
  if (restaurantValue.length < 2) {
    restauranteError.textContent = "Insira seu nome completo";
    return false;
  } else {
    restauranteError.textContent = "";
  }

  //padrao usado na edição do restaurante
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  //email deve seguir este padrao
  if (!emailPattern.test(emailrestauranteValue)) {
    emailrestauranteError.textContent = "Por favor, insira um email válido.";
    return false;
  } else {
    emailrestauranteError.textContent = "";
  }

  //padrao para a senha
  var passwordPattern =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  //senha deve seguir um padrao
  if (
    !passwordPattern.test(passwordrestauranteValue) &&
    passwordrestauranteValue != ""
  ) {
    passwordrestauranteError.innerHTML =
      "A senha deve ter no mínimo:<br>* 8 caracteres<br>* Uma letra maiúscula<br>* Um número<br>* Um caractere especial (@, $, !, %, *, ?, &).";
    return false;
  } else {
    passwordrestauranteError.textContent = "";
  }

  //cep deve conter 9 ou mais numeros
  if (cepValue.length < 9) {
    cepError.textContent = "Insira um CEP válido";
    return false;
  } else {
    cepError.textContent = "";
  }

  //rua deve ter pelo menos um nome
  if (ruaValue.length < 1) {
    ruaError.textContent = "Insira o nome da rua";
    return false;
  } else {
    ruaError.textContent = "";
  }

  //deve conter pelo menos um numero
  if (numeroValue.length < 1) {
    numeroError.textContent = "Insira o número do endereço";
    return false;
  } else {
    numeroError.textContent = "";
  }

  //cnpj nao pode ter menos de 14 numeros
  if (cnpjValue.length < 14) {
    cnpjError.textContent = "Insira um CNPJ válido";
    return false;
  } else {
    cnpjError.textContent = "";
  }
  //valida se ele é uma URL completa e válida (começando com ftp://, http:// ou https://). Se a URL não for válida, exibe uma mensagem de erro e impede a continuação do processo
  if (siteUrlValue.length > 0) {
    var urlPattern = /^(ftp|http|https):\/\/[^ "]+$/;
    if (!urlPattern.test(siteUrlValue)) {
      siteUrlError.textContent = "Insira um URL de site válido (link completo)";
      return false;
    } else {
      siteUrlError.textContent = "";
    }
  }

  return true;
}

//função para validar o horario de funcionamento do restaurante
function formatTime(input) {
  let value = input.value;

  // Remove any non-numeric and non-colon characters
  value = value.replace(/[^0-9:]/g, "");

  // Split value into hours and minutes
  let timeParts = value.split(":");
  let hours = timeParts[0] || "";
  let minutes = timeParts[1] || "";

  // Limit hours and minutes to appropriate lengths
  if (hours.length > 2) {
    hours = hours.substring(0, 2);
  }
  if (minutes.length > 2) {
    minutes = minutes.substring(0, 2);
  }

  // Correct hours and minutes if they are out of bounds and not empty
  if (hours !== "" && (isNaN(hours) || hours < 0 || hours > 23)) {
    hours = "00";
  }
  if (minutes !== "" && (isNaN(minutes) || minutes < 0 || minutes > 59)) {
    minutes = "00";
  }

  // Recombine formatted time
  let formattedTime = hours;
  if (value.includes(":")) {
    formattedTime += ":" + minutes;
  }

  // Set the corrected value back to the input element
  input.value = formattedTime;
}

//função de validação para o admin no editarperfil.php
function validateAdminForm() {
  var adminNome = document.getElementById("adminN").value.trim();
  var adminENome = document.getElementById("adminNomeErro");
  var adminEmail = document.getElementById("adminE").value;
  var adminEErro = document.getElementById("adminEmailErro").value;
  var adminSenha = document.getElementById("adminS");
  var adminSErro = document.getElementById("adminSenhaErro");

  // if (adminNome.split(" ").length < 2) {
  //   adminENome.textContent = "Insira seu nome completo";
  //   return false;
  // } else {
  //   adminENome.textContent = "";
  // }

  //padrao para email
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  //email deve seguir um padrao
  if (!emailPattern.test(adminEmail)) {
    adminEErro.textContent = "Por favor, insira um email válido.";
    return false;
  } else {
    adminEErro.textContent = "";
  }

  //padrao para senha
  var passwordPattern =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  //senha deve seguir um padrao
  if (!passwordPattern.test(adminSenha) && adminSenha != "") {
    adminSErro.innerHTML =
      "A senha deve ter no mínimo:<br>* 8 caracteres<br>* Uma letra maiúscula<br>* Um número<br>* Um caractere especial (@, $, !, %, *, ?, &).";
    return false;
  } else {
    adminSErro.textContent = "";
  }

  return true;
}
