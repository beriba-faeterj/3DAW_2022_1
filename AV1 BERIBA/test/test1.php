<!DOCTYPE html>
<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001
''

Tema da aula: Exercício de fixação para a prova

-->

<head>
	<title>Incluir</title>
    <link rel="stylesheet" href="../formatacao.css">
</head>
<body> 
    <header> 
        Trabalho aula 7 12/05/2022 e aula 8 19/05/2022 Beriba
    </header>
    <nav class="flex-container">
        <div><a href="../index.php">Início</a></div>
        <div><a href="">Incluir</a></div>
        <div><a href="../alterar/alterar.php">Alterar</a></div>
        <div><a href="../listar/listar_todos.php">Listar todos</a></div>
        <div><a href="">Listar um</a></div>
        <div><a href="">Excluir</a></div>
    </nav>
    <main>

    <form method="post" action="incluido.php">
            ID: <input type="text" name="id" value="AAA"><br>
            Nome: <input type="text" name="nome" value="" placeholder="palce"><br>
        </form>

<?php

include '../biblioteca_projeto.php';

print_r(preg_match('~(http.*\.)(jpe?g|png|gif|[tg]iff?|svg)~i',
'https://farm4.staticflickr.com/3894/15008518202_c265dfa55f_h.jpg'));

echo '<br><br>';
print_r(preg_match('/^([1-9][0-9]*|0)(\,[0-9]{2})?$/', '23123'));


// print_r('\n');

// print_r(0 || 0);

// if (validaString('9', '/\d+(?:[,]\d{1,2})?/') == true) {
//     print_r('true');
// }
// else print_r('false');

// url: /(http(s?):)([/|.|\w|\s|-])*\.(?:jpg|gif|jpeg|png)/

// fazer 1 funcao que recebe a string com o padrao e usar regex pra tudo?

?>

        <form method="post" action="test2.php">
            <button type="submit" value="aaa" name="aaa">butao aaa</button>
        </form>
        <form method="post" action="test2.php">
            <button type="submit" value="bbb" name="bbb">butao bbb</button>
        </form>
    <main>
</body>
</html>


