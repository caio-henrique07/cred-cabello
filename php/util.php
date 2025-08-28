<?php
    function conecta($params = "")
    {
        if ($params == "") {
            $params = $params = "pgsql:host=localhost;port=5432;dbname=postgres;
            user=postgres;password=postgres";
        }
        
        try {
            $varConn = new PDO($params);
            return $varConn;
        } catch (PDOException $e) {
            echo "Erro, não foi possível conectar-se ao banco de dados.";
            exit;
        }
    }
?>