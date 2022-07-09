<?php

    include '../biblioteca_projeto.php';

    header("Content-Type: application/json; charset=UTF-8");
    $obj = json_decode($_GET["ordenacao"], false);

    $campoOrdenacao = $obj->campo;

    if (in_array($campoOrdenacao, $arrayCamposOrdenacao)) {
        $conexao = new PDO($stringConexao, $usuarioDB, $senhaDB);
    
        $sql = "select * from `onibus` order by `$campoOrdenacao`, `chassis`;";
    
        $result = $conexao->query($sql);
    
        $listaFunc = $result->fetchAll();
    
        echo json_encode($listaFunc);
    
        $conexao = null;
    }
    else {
        echo 'Ocorreu um erro no envio do formulário. Tente novamente.';
    }

?>