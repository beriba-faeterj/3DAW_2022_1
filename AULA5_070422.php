
<!--

Nome: Lucas Beriba
Matrícula: 2110478300001
Data: 07/04/2022

Tema da aula: Funções, vetores (percorrer etc.)

-->

<html>
<head>
</head>
<body>
<h1>3DAW</h1>

<?php

// FUNÇÕES

function soma ($a, $b) {
	return $b + $b;
}

echo soma(8,9);

echo "<br><br>===============================<br><br>";

// ARRAYS E FOREACH

$carros = array("fusca", "opala", "bmw");

echo "num elementos: " . count($carros) . "<br><br>";

forEach($carros as $elem) {
	echo $elem . "<br>";
}

?>

<br>

</body>
</html>


