<?php

$arquivoProjeto = "../beriba_aula7_teste.txt";

// =================== VARIÁVEIS DE CABEÇALHO

/*
$arrayCabecalho = array(
     "ID"
    ,"NOME"
    ,"COD_BARRAS"
    ,"DESCRICAO"
    ,"URL_DA_IMAGEM"
    ,"VALOR"
    ,"QUANTIDADE"
    ,"PESO"
);
*/

$arrayCabecalho = array(
    "NOME", "ID FUN", "CARGO"
);

$qtdColunasCabecalho = count($arrayCabecalho);
$stringCabecalho = implode(';', $arrayCabecalho);

// =================== FUNÇÕES

function criaArquivo ($caminhoArquivo, $cabecalho) {
    if (!file_exists($caminhoArquivo)) {
        $arquivo = fopen($caminhoArquivo, "w");
        fwrite($arquivo, $cabecalho);
        fclose($arquivo);
    }

    return;
}

?>
