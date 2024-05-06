<?php
require("connection.php");

function select($conn, $aCampos, $tabela, $condicao)
{
    $_SESSION['LAST_ACTIVITY'] = time();
    if ($aCampos == "*") {
        $consulta = "SELECT * FROM " . $tabela . "";
    } else {
        $consulta = "SELECT " . implode(',', $aCampos) . " FROM " . $tabela . "";
    }

    if ($condicao) {
        $consulta .= " WHERE " . $condicao;
    }
    $result = $conn->query($consulta);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function create($conn, $aCampos, $aValores, $tabela)
{
    $_SESSION['LAST_ACTIVITY'] = time();
    $campos = implode(',', $aCampos);
    $valores = "'" . implode("','", $aValores) . "'";
    $consulta = "INSERT INTO $tabela ($campos) VALUES ($valores)";
    try {
        if ($conn->query($consulta) === TRUE) {
            return "Registro inserido com sucesso.";
        } else {
            if ($conn->errno == 1062) { // Check for MySQL duplicate entry error
                $errorMessage = $conn->error;
            preg_match("/Duplicate entry '.*' for key '([^']+)'/", $errorMessage, $matches);
            $duplicateColumn = $matches[1]; // Retrieve the column causing the duplication
                $duplicateColumn = str_replace("p_r_a_.","",$duplicateColumn);
                $duplicateColumn = str_replace("PRA","",$duplicateColumn);
                $duplicateColumn = str_replace("restaurante.","",$duplicateColumn);
                $duplicateColumn = str_replace("Restaurante","",$duplicateColumn);
                $duplicateColumn = strtolower($duplicateColumn);
                return "Já existe uma conta com esse ".$duplicateColumn;
            }
            return "Erro ao inserir registro: " . $conn->error;
        }
    } catch (Exception $e) {
        if ($conn->errno == 1062) { // Check for MySQL duplicate entry error
            $errorMessage = $conn->error;
        preg_match("/Duplicate entry '.*' for key '([^']+)'/", $errorMessage, $matches);
        $duplicateColumn = $matches[1]; // Retrieve the column causing the duplication
            $duplicateColumn = str_replace("p_r_a_.","",$duplicateColumn);
            $duplicateColumn = str_replace("PRA","",$duplicateColumn);
            $duplicateColumn = str_replace("restaurante.","",$duplicateColumn);
            $duplicateColumn = str_replace("Restaurante","",$duplicateColumn);
            $duplicateColumn = strtolower($duplicateColumn);
            return "Já existe uma conta com esse ".$duplicateColumn;
        } else {
            return "Erro ao inserir registro: " . $e->getMessage();
        }
    }
}

function update($conn, $tabela, $aSet, $condicao)
{
    $_SESSION['LAST_ACTIVITY'] = time();
    $sets = [];
    foreach ($aSet as $campo => $valor) {
        $sets[] = "$campo = '$valor'";
    }
    $sets = implode(', ', $sets);
    $consulta = "UPDATE $tabela SET $sets WHERE " . $condicao;
    try {
        if ($conn->query($consulta) === TRUE) {
            return "Registro atualizado com sucesso.";
        } else {
            return "Erro ao atualizar registro: " . $conn->error;
        }
    } catch (Exception $e) {
        if ($conn->errno == 1062) { // Check for MySQL duplicate entry error
            return "Erro ao inserir registro: Entrada duplicada.";
        } else {
            return "Erro ao inserir registro: " . $e->getMessage();
        }
    }
}

function deleteByCondition($conn, $tabela, $condicao)
{
    $consulta = "DELETE FROM $tabela WHERE " . $condicao;

    if ($conn->query($consulta) === TRUE) {
        return "Registro(s) deletado(s) com sucesso.";
    } else {
        return "Erro ao deletar registro(s): " . $conn->error;
    }
}
if (session_status() === PHP_SESSION_NONE) {
    // Start the session
    session_start();
}

$s_name = session_name();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
    session_unset();
    session_destroy();
    //Exibindo um alerta de sessão expirada
    echo "<script>alert('Sessão expirada!')</script>";
    header('Location: index.php');
}
$_SESSION['LAST_ACTIVITY'] = time();
// echo "Session is created for $s_name, at " . gmdate("H:i:s", time()) .  "<br/>";


$adminNome   = "SuperAdmin";
$adminUser   = "sysAdmin";
$adminEmail = "admin@gmail.com";
$adminSenha  = "Admin123@";
$admin  = 1;

$md5Senha = md5($adminSenha);

$aCampos = array("NomePRA", "UsernamePRA", "EmailPRA", "SenhaPRA", "AdminUser");
$aValores = array("$adminNome", "$adminUser", "$adminEmail", "$md5Senha", "$admin");
$tabela = "p_r_a_";

$result = create($conn, $aCampos, $aValores, $tabela);

