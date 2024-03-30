<?php
    require("connection.php");
    
    function select($conn,$aCampos,$tabela,$condicao){
        if ($aCampos == "*") {
          $consulta = "SELECT * FROM ".$tabela."";
        } else {
          $consulta = "SELECT ".implode(',',$aCampos)." FROM ".$tabela."";
        }
        
        if($condicao) {
            $consulta .= " WHERE ".$condicao;
          }
        $result = $conn->query($consulta);
        $rows = $result -> fetch_all(MYSQLI_ASSOC);
        return $rows;
    }

    function create($conn, $aCampos, $aValores, $tabela){
        $campos = implode(',', $aCampos);
        $valores = "'" . implode("','", $aValores) . "'";
        $consulta = "INSERT INTO $tabela ($campos) VALUES ($valores)";
      
        if($conn->query($consulta) === TRUE) {
            return "Registro inserido com sucesso.";
        } else {
            return "Erro ao inserir registro: " . $conn->error;
        }
    }

    function update($conn, $tabela, $aSet, $condicao) {
        $sets = [];
        foreach ($aSet as $campo => $valor) {
            $sets[] = "$campo = '$valor'";
        }
        $sets = implode(', ', $sets);
        $consulta = "UPDATE $tabela SET $sets WHERE ".$condicao;
        
        if($conn->query($consulta) === TRUE) {
            return "Registro atualizado com sucesso.";
        } else {
            return "Erro ao atualizar registro: " . $conn->error;
        }
  }
  
  function deleteByCondition($conn, $tabela, $condicao) {
        $consulta = "DELETE FROM $tabela WHERE ".$condicao;
        
        if($conn->query($consulta) === TRUE) {
            return "Registro(s) deletado(s) com sucesso.";
        } else {
            return "Erro ao deletar registro(s): " . $conn->error;
        }
  }

    session_start();

    $s_name = session_name();

    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
        session_unset();     
        session_destroy();   
        echo "Session is expired at " .  gmdate("H:i:s", time()) .  "<br/>";
    }
    $_SESSION['LAST_ACTIVITY'] = time(); 
    // echo "Session is created for $s_name, at " . gmdate("H:i:s", time()) .  "<br/>";

?>