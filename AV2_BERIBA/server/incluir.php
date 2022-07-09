<?php

    include '../biblioteca_projeto.php';

    header("Content-Type: application/json; charset=UTF-8");
    $onibus = json_decode($_POST["incluir"], false);

    $erro = false;
    
    $id = $onibus->id;
    $marca = $onibus->marca;
    $modelo = $onibus->modelo;
    $qtdAssentos = $onibus->qtdAssentos;
    $temBanheiro = $onibus->temBanheiro;
    $temArCondicionado = $onibus->temArCondicionado;
    $chassis = $onibus->chassis;
    $placa = $onibus->placa;

    $conexao = new PDO($stringConexao, $usuarioDB, $senhaDB);

    if (($temBanheiro < 0 || $temBanheiro > 1) || ($temArCondicionado < 0 || $temArCondicionado > 1)) {
        $erro = true;

        echo 'Ocorreu um erro de validação. Verifique se todos os campos foram preenchidos corretamente e tente novamente. <br>';
        
    }
    else {
        if (validaString($id, "/^[0-9]+$/") == 0) {
            $erro = true;
    
            echo 'O ID do ônibus deve conter apenas números. <br>';
        }

        if (validaString($qtdAssentos, "/^[0-9]+$/") == 0 || $qtdAssentos < 0) {
            $erro = true;
            
            echo 'Quantidade de assentos inválida. <br>';
        }
    }

    if ($erro == false) {
        if (procuraOnibus($conexao, $chassis) == false) {
            $sql = "INSERT INTO `onibus`(`id`, `marca`, `modelo`, `qtdAssentos`, `temBanheiro`, `temArCondicionado`, `chassis`, `placa`) VALUES ('$id', '$marca', '$modelo', '$qtdAssentos', '$temBanheiro', '$temArCondicionado', '$chassis', '$placa')";

            $result = $conexao->query($sql);

            $conexao = null;

            echo '<br>Ônibus inserido com sucesso.';
        }
        else {
            $conexao = null;

            echo '<br>Veículo já cadastrado.';
        }
    }
    else {
        $conexao = null;
    }

?>