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
        document
          .getElementById("imagemSelecionada")
          .setAttribute("src", e.target.result);
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
  return str.replace(/^\s+|\s+$/g, '');
}

function validateForm() {
    var nameuserValue = document.getElementById("inputNome").value.trim();
    var nameuserError = document.getElementById("nameuserError");
    var emailuserValue = document.getElementById("inputEmail").value;
    alert(emailuserValue)

    var passwordPRAValue = document.getElementById("inputSenha").value;
    var emailuserError = document.getElementById("emailuserError");
    var passworduserError = document.getElementById("passworduserError");

    if (nameuserValue.split(' ').length < 2) {
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

    var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if (!passwordPattern.test(passwordPRAValue) && passwordPRAValue != "") {
      passworduserError.innerHTML = "A senha deve ter no mínimo:<br>* 8 caracteres<br>* Uma letra maiúscula<br>* Um número<br>* Um caractere especial (@, $, !, %, *, ?, &).";
        return false; 
    } else {
      passworduserError.textContent = ""; 
    }

    return true; 
}
