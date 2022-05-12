
<!-- 

3DAW Manhã 2022.1

Data: 17/03/2022
Nome: Lucas Ribeiro Beriba

Execício 2

-->

<!DOCTYPE html>

<html>
<head>

</head>

<body>
	<h1>3DAW</h1>
	<?php

	echo "<h2>Exercício 02</h2>";
	echo "Teste teste<br><br>";
	
	echo "PHP version: " . phpversion() . "<br>"; // Versão do PHP
	
	$variavel = "Variável tipada dinamicamente (String)";
	
	echo "<br>" . $variavel; // Concatenação
	echo "<br> Tam. string variável: " . strlen($variavel);
	
	$variavel = 5+3;
	
	var_dump($variavel); // Exibe dados da variável
	
	echo "Variavel ";
	if ($variavel > 5) {
		echo ">5"; 
	}
	else {
		echo "<5";
	}
	
	echo "<br><br>";
	echo "Variável é int? ";
	
	if (is_int($variavel)) {
		echo "true";
	}
	
	else echo "false";
	
	// ======================
	// ====================== VETORES/MATRIZES
	// ======================
	
	$variavel = array(
	"stream underneath the stars live at tokyo dome by mariah carey on spotify"
	,"https://open.spotify.com/track/2eu57Jh1Gdy7Jlge6AKi5x?si=53d29aad1a044c3e"
	);
	
	var_dump($variavel);
	
	echo $variavel[0];
	
	// ======================
	// ====================== CLASSES
	// ======================
	
	class Disciplina {
		public $nome;
		public $sigla;
	
		public function __construct($nome, $sigla) { // Construtor da classe
			$this->nome = $nome;
			$this->sigla = $sigla;
		}
	
		public function getDisc() {
			return "Nome da disciplina: " . $this->nome
					. "<br>" . "Sigla da disciplina: " . $this->sigla;
		}
	}

	$Disc = new Disciplina("Sei lá", "3DAW");
	
	var_dump($Disc);
	
	echo $Disc->getDisc();
	
	// ======================
	// ====================== ETC
	// ======================
	
	echo "<br><br>";
	
	echo 8 + 2;
	echo "<br>";
	echo 10 - 21;
	echo "<br>";
	echo 3 * 10;
	echo "<br>";
	echo 9 / 3;
	echo "<br>";
	echo "<br> 6 mod 4 = " . fmod(6, 4);
	echo "<br>";
	echo "<br> 2^6 = " . pow(2, 6);

	?>
</body>
<html>
	
	
	