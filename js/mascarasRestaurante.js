//pega as informações do restaurantes que foram salvas no banco de dados
const nome = document.getElementById("inputNome");
const cep = document.getElementById("inputCep");
const street = document.getElementById("inputRua");
const numero = document.getElementById("inputNumero");
const cnpj = document.getElementById("inputCNPJ");

//tratadore de evento para CEP
const handleZipCode = (event) => {
  let input = event.target;
  input.value = zipCodeMask(input.value);
};

//tratador de evento para CNPJ, e obrigar a ter 14 numeros quando for escrever 
const handleCnpj = (event) => {
  let input = event.target;
  if (input.value.length >= 14) {
      input.value = cnpjMask(input.value);
  }
};

//mascara para quando o valor do cnpj volta estar formatado
//XX.XXX.XXX/XXXX-XX
const cnpjMask = (value) => {
  if (!value) return "";
  //é usada para remover todos os caracteres não numéricos do valor
  value = value.replace(/\D/g, "");
  //remove números do CNPJ que ultrapassam 14 dígitos
  value = value.substring(0, 14);
  //diciona o primeiro ponto na formatação do CNPJ.
  value = value.replace(/(\d{2})(\d)/, "$1.$2");
  //esta adiciona o segundo ponto na formatação do CNPJ
  value = value.replace(/(\d{3})(\d)/, "$1.$2");
  //adiciona a barra na formatação do CNPJ
  value = value.replace(/(\d{3})(\d)/, "$1/$2");
  //esta linha adiciona o traço na formatação do CNPJ
  value = value.replace(/(\d{4})(\d)/, "$1-$2");
  return value;
};

//mascara para quando o valor do cep volta estar formatado
//XXXXX-XXX
const zipCodeMask = (value) => {
  if (!value) return "";
  //usada para remover todos os caracteres não numéricos do valor
  value = value.replace(/\D/g, "");
  //remove núemros do cep que ultrapassam 8 digitos
  value = value.substring(0, 8);
  //adiciona um hífen na formatação do código posta
  value = value.replace(/(\d{5})(\d)/, "$1-$2");
  return value;
};

//Dentro da função, substitui todos os caracteres não numéricos (/\D/g) pelo valor vazio
cep.addEventListener("input", function () {
  this.value = this.value.replace(/\D/g, "");
});

//removendo todos os caracteres não numéricos e mantendo apenas os números.
cnpj.addEventListener("input", function () {
  this.value = this.value.replace(/\D/g, "");
});

//Substitui todos os caracteres que não são letras, números ou espaços por uma string vazia.
street.addEventListener("input", function () {
  this.value = this.value.replace(/[^\w\s]/gi, "");
});

//remove todos os caracteres que não são letras (maiúsculas ou minúsculas), espaços ou acentos.
nome.addEventListener("input", function () {
  this.value = this.value.replace(/[^a-zA-ZÀ-ú\s]/g, "");
});

// Remove todos os caracteres não numéricos
numero.addEventListener("input", function () {
  this.value = this.value.replace(/\D/g, "");
});

