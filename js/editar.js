function confirmarExcluirRestaurante() {
  let text = "Tem certeza que deseja excluir sua conta?";
  if (confirm(text) == true) {
    window.location.href = "databaseRestaurante/restauranteDeletar.php";
  }
}

function confirmarExcluirPRA() {
  let text = "Tem certeza que deseja excluir sua conta?";
  if (confirm(text) == true) {
    window.location.href = "databasePRA/usuarioDeletar.php";
  }
}

function validaImagem(input) {
  var caminho = input.value;

  if (caminho) {
    var comecoCaminho =
      caminho.indexOf("\\") >= 0
        ? caminho.lastIndexOf("\\")
        : caminho.lastIndexOf("/");
    var nomeArquivo = caminho.substring(comecoCaminho);

    if (nomeArquivo.indexOf("\\") === 0 || nomeArquivo.indexOf("/") === 0) {
      nomeArquivo = nomeArquivo.substring(1);
    }

    var extensaoArquivo =
      nomeArquivo.indexOf(".") < 1 ? "" : nomeArquivo.split(".").pop();

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
  } else {
    input.value = "";
    alert("Selecione um caminho de arquivo válido");
  }
  if (input.files && input.files[0]) {
    var arquivoTam = input.files[0].size / 1024 / 1024;
    if (arquivoTam < 16) {
      var reader = new FileReader();
      reader.onload = function (e) {
        let imagem = document.getElementById("imagemSelecionada");
        imagem.setAttribute("src", e.target.result);
        imagem.classList.add("edit-profile-avatar");
      };
      reader.readAsDataURL(input.files[0]);
    } else {
      input.value = "";
      alert("O arquivo precisa ser uma imagem com menos de 16 MB");
    }
  } else {
    document.getElementById("imagemSelecionada").setAttribute("src", "#");
  }
}

function trim(str) {
  return str.replace(/^\s+|\s+$/g, "");
}

function validateuserForm() {
  var nameuserValue = document.getElementById("inputuserNome").value.trim();
  var nameuserError = document.getElementById("nameuserError");
  var emailuserValue = document.getElementById("inputEmail").value;
  var passwordPRAValue = document.getElementById("inputSenha").value;
  var emailuserError = document.getElementById("emailuserError");
  var passworduserError = document.getElementById("passworduserError");

  if (nameuserValue.split(" ").length < 2) {
    nameuserError.textContent = "Insira seu nome completo";
    return false;
  } else {
    nameuserError.textContent = "";
  }

  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailPattern.test(emailuserValue)) {
    emailuserError.textContent = "Por favor, insira um email válido.";
    return false;
  } else {
    emailuserError.textContent = "";
  }

  var passwordPattern =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  if (!passwordPattern.test(passwordPRAValue) && passwordPRAValue != "") {
    passworduserError.innerHTML =
      "A senha deve ter no mínimo:<br>* 8 caracteres<br>* Uma letra maiúscula<br>* Um número<br>* Um caractere especial (@, $, !, %, *, ?, &).";
    return false;
  } else {
    passworduserError.textContent = "";
  }

  return true;
}

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

  if (restaurantValue.length < 2) {
    restauranteError.textContent = "Insira seu nome completo";
    return false;
  } else {
    restauranteError.textContent = "";
  }

  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailPattern.test(emailrestauranteValue)) {
    emailrestauranteError.textContent = "Por favor, insira um email válido.";
    return false;
  } else {
    emailrestauranteError.textContent = "";
  }

  var passwordPattern =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

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

  if (cepValue.length < 9) {
    cepError.textContent = "Insira um CEP válido";
    return false;
  } else {
    cepError.textContent = "";
  }

  if (ruaValue.length < 1) {
    ruaError.textContent = "Insira o nome da rua";
    return false;
  } else {
    ruaError.textContent = "";
  }

  if (numeroValue.length < 1) {
    numeroError.textContent = "Insira o número do endereço";
    return false;
  } else {
    numeroError.textContent = "";
  }

  if (cnpjValue.length < 14) {
    cnpjError.textContent = "Insira um CNPJ válido";
    return false;
  } else {
    cnpjError.textContent = "";
  }
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

  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailPattern.test(adminEmail)) {
    adminEErro.textContent = "Por favor, insira um email válido.";
    return false;
  } else {
    adminEErro.textContent = "";
  }

  var passwordPattern =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  if (!passwordPattern.test(adminSenha) && adminSenha != "") {
    adminSErro.innerHTML =
      "A senha deve ter no mínimo:<br>* 8 caracteres<br>* Uma letra maiúscula<br>* Um número<br>* Um caractere especial (@, $, !, %, *, ?, &).";
    return false;
  } else {
    adminSErro.textContent = "";
  }

  return true;
}