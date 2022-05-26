<?php

$arquivoProjeto = "../beriba_aula7_teste.txt";

// =================== VARIÁVEIS DE CONTROLE
// ATENÇÃO! Essas variáveis são essenciais para o controle dos dados e devem ser
// alteradas com cuidado.

$arrayCamposForm = array(
    "ID",
    "Nome",
    "Código de barras",
    "Descrição",
    "URL da imagem",
    "Valor",
    "Quantidade",
    "Peso"
);

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

$posID = array_search("ID", $arrayCabecalho);
$posNome = array_search("NOME", $arrayCabecalho);
$posCodBarras = array_search("COD_BARRAS", $arrayCabecalho);
$posDescricao = array_search("DESCRICAO", $arrayCabecalho);
$posURL = array_search("URL_DA_IMAGEM", $arrayCabecalho);
$posValor = array_search("VALOR", $arrayCabecalho);
$posQtd = array_search("QUANTIDADE", $arrayCabecalho);
$posPeso = array_search("PESO", $arrayCabecalho);

$qtdColunasCabecalho = count($arrayCabecalho);
$stringCabecalho = implode(';', $arrayCabecalho);

$arrayValidacao = array(
    array("", ""),
    array("", ""),
    array("", ""),
    array("", ""),
    array("", ""),
    array("", ""),
    array("", ""),
    array("", "")
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

// function validaProduto($listaCampos, $matrizArquivo) {
//     if(encontraNaPosicaoX($matrizArquivo, $id, $posIDA) == -1
//                 && encontraNaPosicaoX($matrizArquivo, $codBarras, $posCodBarras) == -1)

//     return 1;
// }

// verificar se ja existe
// 2. loop valida campos

// function q recebe um array e roda a acima em um loop? ou nem precisa da acima?
// pode usar o nome do campo (matriz?) pra dar o echo na hora se não validar


?>