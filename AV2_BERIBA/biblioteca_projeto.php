<?php

$usuarioDB = 'root';
$senhaDB = '';
$stringConexao = 'mysql:host=localhost;dbname=faeterj3dawmanha';

// Vetor que guarda o nome das colunas válidas para ordenação.
$arrayCamposOrdenacao = array (
    'id', 'marca', 'modelo', 'qtdAssentos', 'chassis', 'placa'
);

// Essa função recebe uma conexão com banco MySQL e o chassis de um ônibus, e retorna
// true ou false dependendo se o veículo está ou não cadstrado.
function procuraOnibus($conexao, $chassis) {
    $sql = "select id from `onibus` where `chassis` = '$chassis'";

    $result = $conexao->query($sql);

    $row = $result->fetch();

    if ($row)
        return true;

    else return false;
}

// Essa função recebe uma string $string e a compara com um padrão regex $padrao. Se a string
// é compatível com o padrão, a função retorna 1 (true); senão, retorna 0 (false).
function validaString($string, $padrao) {
    if (preg_match($padrao, $string) == 1)
        return 1;

    return 0;
}

function verificaSenha($conexao, $matr, $senhaAtual) {
    $sql = "select `senha` from `usuario` where `matricula` = '$matr'";  

    $result = $conexao->query($sql);

    $row = $result->fetch();

    if ($senhaAtual == $row['senha'])
        return true;

    return false;
}

?>