<?php

require_once 'Models.php';

/*
Recebe os parâmentros para conexão com o postgres via PDO.
Retorna um objeto PDO.
*/
function getpdo($dbHost, $dbName, $dbUser, $dbPassword) {
    
    //Conecta ao postgres usando PDO
    $connString = sprintf('pgsql:host=%s;dbname=%s;user=%s;password=%s',
                          $dbHost, $dbName, $dbUser, $dbPassword);
    $pdoObj = new PDO($connString);
    $pdoObj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdoObj;
}

/*
Recebe um objeto PDO para consultar o db.
Retorna todas as entradas da tabela tipodeproduto como um array
de objetos da classe TipoProduto.
*/
function getTableTipoDeProduto($pdoObj) {
    $query = $pdoObj->query('SELECT * FROM tipodeproduto');
    
    $tiposArray = array();
    
    while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $tipoObj = new TipoProduto(
            $row['id'],
            $row['descricao'],
            floatval($row['percentual_imposto'])
        );
        
        $tiposArray[$row['id']] = $tipoObj;
    }
    
    return $tiposArray;
}

/*
Recebe um objeto PDO para consultar o db.
Retorna todas as entradas da tabela produto como um array de
objetos das classes Eletrodomestico e Eletroeletronico.
*/
function getTableProduto($pdoObj) {
    $query = $pdoObj->query('SELECT * FROM produto');

    $prodArray = array();

    while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        
        switch($row['id_tipo_produto']) {
            case 1:
                $prodObj = new Eletrodomestico(
                    $row['id'],
                    $row['descricao'],
                    $row['id_tipo_produto'],
                    $row['quantidade'],
                    floatval($row['valor_unitario'])
                );
                break;

            case 2:
                $prodObj = new Eletroeletronico(
                    $row['id'],
                    $row['descricao'],
                    $row['id_tipo_produto'],
                    $row['quantidade'],
                    floatval($row['valor_unitario'])
                );
                break;
        }

        $prodArray[] = $prodObj;
        
    }

    return $prodArray;
}

?>