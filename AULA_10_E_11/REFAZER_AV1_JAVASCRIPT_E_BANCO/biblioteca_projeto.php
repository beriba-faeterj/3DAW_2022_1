<?php

$usuarioDB = 'root';
$senhaDB = '';
$stringConexao = 'mysql:host=localhost;dbname=faeterj3dawmanha';

$arrayValidacao = array(
    array("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/", "O nome do funcionário deve possuir apenas letras."),
    array("/^[0-9]+$/", "A matrícula do funcionário deve possuir apenas números.")
);

$regexValidacao = 0;
$msgErroValidacao = 1;

$posNome = 0;
$posMatr = 1;

// Essa função recebe uma conexão com banco MySQL e a matrícula de um funcionário, e retorna
// true ou false dependendo se o funcionário está ou não cadstrado.
function procuraFuncionario($conexao, $matr) {
    $sql = "select id from `usuario` where `matricula` = '$matr'";

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