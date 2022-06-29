
<?php

    include '../biblioteca_projeto.php';

    header("Content-Type: application/json; charset=UTF-8");
    $func = json_decode($_POST["alterar"], false);

    $erro = false;
    
    $id = $func->id;
    $nome = $func->nome;
    $matr = $func->matricula;
    $funcao = $func->funcao;
    $senhaAtual = $func->senhaAtual;
    $senhaNova = $func->senhaNova;

    $conexao = new PDO($stringConexao, $usuarioDB, $senhaDB);

    if (verificaSenha($conexao, $matr, $senhaAtual) == false) {
        $erro = true;

        echo '<br>Senha incorreta.';
    }
    else {
        if (validaString($nome, $arrayValidacao[$posNome][$regexValidacao]) == 0) {
            $erro = true;

            echo $arrayValidacao[$posNome][$msgErroValidacao] . '<br>';
        }
        if (validaString($matr, $arrayValidacao[$posMatr][$regexValidacao]) == 0) {
            $erro = true;
            
            echo $arrayValidacao[$posMatr][$msgErroValidacao] . '<br>';
        }
    }

    if ($erro == false) {
        $sql = "select `id` from `usuario` where `matricula` = '$matr'";

        $result = $conexao->query($sql);

        $row = $result->fetch();

        if ($row['id'] != $id) {
            $conexao = null;

            echo '<br>Já existe um funcionário com essa matrícula.';
        }
        else {
            $sql = "UPDATE `usuario` SET `nome`='$nome',`matricula`='$matr',`funcao`='$funcao',`senha`='$senhaNova' WHERE `id`='$id';";

            $result = $conexao->query($sql);
            
            echo '<br>Funcionário atualizado com sucesso';

            $conexao = null;
        }
    }

?>
