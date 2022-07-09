
<?php

    include '../biblioteca_projeto.php';

    header("Content-Type: application/json; charset=UTF-8");
    $onibus = json_decode($_POST["alterar"], false);

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
        $sql = "select `id` from `onibus` where `chassis` = '$chassis'";

        $result = $conexao->query($sql);

        $row = $result->fetch();

        if ($row['id'] != $id) {
            $conexao = null;

            echo '<br>Já existe um veículo com esse chassis.';
        }
        else {
            $sql = "UPDATE `onibus` SET `id`='$id',`marca`='$marca',`modelo`='$modelo',`qtdAssentos`='$qtdAssentos',`temBanheiro`='$temBanheiro',`temArCondicionado`='$temArCondicionado',`placa`='$placa' WHERE `chassis`='$chassis'";

            $result = $conexao->query($sql);
            
            echo '<br>Veículo atualizado com sucesso';

            $conexao = null;
        }
    }
    else {
        $conexao = null;
    }

?>
