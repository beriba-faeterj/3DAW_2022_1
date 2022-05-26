<!DOCTYPE html>
<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001
Data: 12/05/2022 e 19/05/2022

Tema da aula: Exercício de fixação para a prova

-->

<head>
	<title>Início</title>
    <link rel="stylesheet" href="formatacao.css">
</head>
<body>
    <header>
        Trabalho aula 7 12/05/2022 e aula 8 19/05/2022 Beriba
    </header>
    <nav class="flex-container">
        <div><a href="">Início</a></div>
        <div><a href="incluir/incluir.php">Incluir</a></div>
        <div><a href="alterar/alterar.php">Alterar</a></div>
        <div><a href="listar/listar_todos.php">Listar todos</a></div>
        <div><a href="listar/listar_um.php">Listar um</a></div>
        <div><a href="excluir/excluir.php">Excluir</a></div>
    </nav>
    <main>
        <h2>Observações</h2>

        <ul>
            <li>ID e código de barras são utilizados como identificadores únicos de produto (nenhum dos dois pode ser repetido)</li>
            <li>O único campo que pode ficar vazio é a descrição.</li>
            <li>Link de imagem para teste: https://farm4.staticflickr.com/3894/15008518202_c265dfa55f_h.gif</li>
        </ul>
        <ul>
            <li>Aparentemente o PHP não lida muito bem com requisições DELETE sozinho (não puxa variáveis direto que nem o POST e o GET), então usei GET para listar e POST para todos os outros (referência: https://www.php.net/manual/pt_BR/reserved.variables.php)</li>
        </ul>
    <main>
</body>
</html>

