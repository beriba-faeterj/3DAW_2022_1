<?php

$arquivoProjeto = "../beriba_aula7_teste.txt";

// =================== VARIÁVEIS DE CONTROLE
// ATENÇÃO! Essas variáveis são essenciais para o controle dos dados e devem ser
// alteradas com cuidado.

$arrayCabecalho = array(
     "ID" // Utilizado para identificar produtos.
    ,"NOME"
    ,"COD_BARRAS" // Utilizado para identificar produtos.
    ,"DESCRICAO"
    ,"URL_DA_IMAGEM"
    ,"VALOR"
    ,"QUANTIDADE"
    ,"PESO"
);

// Posições já separadas pois são utilizadas para encontrar, excluir, etc. produtos.
$posID = array_search("ID", $arrayCabecalho);
$posCodBarras = array_search("COD_BARRAS", $arrayCabecalho);

$qtdColunasCabecalho = count($arrayCabecalho);
$stringCabecalho = implode(';', $arrayCabecalho);

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

// Essa função recebe uma matriz $matriz de produtos, e procura a string $string na
// posição $pos de cada um dos produtos (vetores) contidos nela.
// O índice do produto então é retornado; caso não tenha sido encontrado, a função retorna -1.
function encontraNaPosicaoX ($matriz, $string, $pos) {
    $qtdItens = retornaUltimoIndice($matriz);

    for ($i = 0; $i < $qtdItens; $i++)
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

function validaCampoFormulario($stringCampo, $padraoValidacao, $mensagemErro) {
    if (validaString($string, $padrao) == 0) {
        echo '<br> ' . $mensagemErro . ' <br>';

        return 0;
    }

    return 1;
}

// function q recebe um array e roda a acima em um loop? ou nem precisa da acima?
// pode usar o nome do campo (matriz?) pra dar o echo na hora se não validar


?>