<!DOCTYPE html>
<html>

<body>

<?php
    //Mostra erros
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once 'Models.php';
    require_once 'DbFunctions.php';
    
    
    //===============================================================
    //===============================================================
    //Variaveis usadas na conexão com o postgres,
    //devem ser alteradas de acordo com a necessidade.
    $dbHost = 'localhost';
    $dbName = 'testdb';
    $dbUser = 'postgres';
    $dbPassword = 'admin';
    //===============================================================
    //===============================================================


    $pdo = getpdo($dbHost, $dbName, $dbUser, $dbPassword);
    
    $tiposArr = getTableTipoDeProduto($pdo);
    
    $prodArr = getTableProduto($pdo);
    
    $jsonArr = array();
    foreach($prodArr as $p) {
        $jsonArr[] = array(
            'id'                => $p->id,
            'descricao'         => $p->descricao,
            'idTipo'            => $p->idTipoProduto,
            'decricaoTipo'      => $tiposArr[$p->idTipoProduto]->descricao,
            'percentualImposto' => $tiposArr[$p->idTipoProduto]->percentualImposto,
            'quantidade'        => $p->quantidade,
            'valorUnitario'     => $p->valorUnitario,
            'valorTotalEstoque' => $p->valorUnitario * $p->quantidade,
            'valorVenda'        => $p->valorVenda()
        );
    }

    echo json_encode($jsonArr);
    

?>

</body>

</html>