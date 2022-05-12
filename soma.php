<?php

$v1 = $_GET["valor1"];
$v2 = $_GET["valor2"];
$result = $v1 + $v2;

?>

<!DOCTYPE html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001
Data: 24/03/2022 e 31/04/2022

Tema da aula: Formulário + programa de soma

-->

<html>
<head>
</head>
<body>
<h1>3DAW</h1>

<form action="soma.php">

<input type="text" name="valor1">
+
<input type="text" name="valor2">
= <?php echo $result; ?>

<br><br>

<input type="submit" value="Somar">

</form>

<br>

</body>
</html>


