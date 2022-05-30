<?php

$arquivoProjeto = "../AV1_Lucas_Beriba.txt";

// =================== VARIÁVEIS DE CONTROLE
// ATENÇÃO! Essas variáveis são essenciais para o controle dos dados e devem ser
// alteradas com cuidado.

$arrayCamposForm = array(
    "Nome",
    "Matrícula",
    "Função"
);

$arrayCabecalho = array(
     "NOME"
    ,"MATRICULA" // Utilizado para identificar funcionários.
    ,"FUNCAO" 
);

$posNome = 0;
$posMatr = 1;
$posFuncao = 2;

$qtdColunasCabecalho = count($arrayCabecalho);
$stringCabecalho = implode(';', $arrayCabecalho);

$arrayValidacao = array(
    array("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/", "O nome do funcionário deve possuir apenas letras."),
    array("/^([1-9][0-9]*|0)?$/", "A matrícula do funcionário deve ser um número inteiro não nulo, sem começar por 0."),
    array("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/", "O nome da função deve possuir apenas letras.")
);

$regexValidacao = 0;
$msgErroValidacao = 1;

// =================== FUNÇÕES

// Essa função retorna o último índice utilizável de um vetor. Foi criada para ajustar
// automaticamente o retorno da sizeof(), que não começa a contar do zero.
function retornaUltimoIndice ($vetor) {
    return sizeof($vetor)-1;
}

function criaArquivo ($diretorioArquivo, $cabecalho) {
    if (!file_exists($diretorioArquivo)) {
        $arquivo = fopen($diretorioArquivo, "w");
        fwrite($arquivo, $cabecalho . "\n");
        fclose($arquivo);
    }

    return;
}

// Essa função passa as informações de um arquivo CSV para uma matriz com as linhas do arquivo
function vetorizaArquivo ($diretorioArquivo) {
    $arquivo = fopen($diretorioArquivo, "r") or die ("Arquivo com problema.");

    $lista = array();

    // Remove o cabeçalho
    fgets($arquivo);

    while (!feof($arquivo)) {
        $linha = fgets($arquivo);

        array_push($lista, explode(';', $linha));
    }
    
    fclose($arquivo);

    return $lista;
}

// Essa função recebe uma matriz $matriz de funcionários, e procura a string $string na
// posição $pos de cada um dos funcionários (vetores) contidos nela.
// O índice do funcionário então é retornado; caso não tenha sido encontrado, a função retorna -1.
function encontraNaPosicaoX ($matriz, $string, $pos) {
    $qtdFunc = retornaUltimoIndice($matriz);

    for ($i = 0; $i < $qtdFunc; $i++)
        if ($matriz[$i][$pos] == $string)
            return $i;

    return -1;
}

// Essa função recebe uma string $string e a compara com um padrão regex $padrao. Se a string
// é compatível com o padrão, a função retorna 1 (true); senão, retorna 0 (false).
function validaString($string, $padrao) {
    if (preg_match($padrao, $string) == 1)
        return 1;

    return 0;
}

?>