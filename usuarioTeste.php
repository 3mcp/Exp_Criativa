<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Usuário</title>
</head>
<body>

<h2>Inserir Novo Usuário</h2>
<form id="formInsert" method="post" action="usuarioCadastro.php">
    <label for="usuarioNome">Nome:</label>
    <input type="text" id="usuarioNome" name="usuarioNome"><br><br>
    
    <label for="usuarioEmail">Email:</label>
    <input type="email" id="usuarioEmail" name="usuarioEmail"><br><br>
    
    <label for="usuarioSenha">Senha:</label>
    <input type="password" id="usuarioSenha" name="usuarioSenha"><br><br>
    
    <button type="submit">Inserir</button>
</form>

<h2>Logar Usuário</h2>
<form id="formInsert" method="post" action="usuarioLogar.php">
    <label for="usuarioEmail">Email:</label>
    <input type="email" id="usuarioEmail" name="usuarioEmail"><br><br>
    
    <label for="usuarioSenha">Senha:</label>
    <input type="password" id="usuarioSenha" name="usuarioSenha"><br><br>
    
    <button type="submit">Logar</button>
</form>
<?php if(isset($_SESSION["ID"])){?>
<h2>Perfil Usuario</h2>
<ul id="listaUsuarios">
    <!-- Aqui serão listados os usuários -->
    <?php 
        include("usuarioBuscar.php");
    ?>
</ul>

<h2>Editar Usuário</h2>
<form id="formInsert" method="post" action="usuarioEditar.php">
  
    <label for="usuarioEmail">Novo Nome:</label>
    <input type="text" id="usuarioNomeNovo" name="usuarioNomeNovo"><br><br>
  
    
    <button type="submit">Inserir</button>
</form>

<h2>Deletar Usuário</h2>
<form id="formInsert" method="post" action="usuarioDeletar.php">
    <button type="submit">Deletar</button>
</form>
<?php }?>
</body>
</html>
