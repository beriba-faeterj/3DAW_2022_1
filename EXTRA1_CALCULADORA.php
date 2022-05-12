
<!--

Nome: Lucas Beriba
Matrícula: 2110478300001
Data: 05/05/2022

Versão melhorada do programa de calculadora passado em alguma aula aí
(Essa deixa o usuário escolher a operação)

-->

<!DOCTYPE html>
<html>
<head>
    <title>EXTRA1_CALCULADORA</title>
</head>
<body>
    <h1>Calculadora 2.0</h1>
    <form method="get" action="EXTRA1_CALCULADORA.php">
        <input name="v1">
        <select name="action">
            <option value="adc">+</option>
            <option value="subt">-</option>
            <option value="mult">*</option>
            <option value="div">/</option>
        </select>
        <input name="v2">
        <input type="submit" name="enviar" value="Enviar"><br><br>
    </form>

    <?php

        if(isset($_GET["enviar"])) {
            $v1 = $_GET["v1"];
            $v2 = $_GET["v2"];

            switch($_GET["action"]) {
                case "adc":
                    echo $v1 . " + " . $v2 . " = " . (string) ($v1+$v2);

                    break;

                case "subt":
                    echo $v1 . " - " . $v2 . " = " . (string) ($v1-$v2);

                    break;
                
                case "mult":
                    echo $v1 . " * " . $v2 . " = " . $v1*$v2;
    
                    break;

                case "div":
                    echo $v1 . " / " . $v2 . " = " . $v1/$v2;
        
                    break;
            }
        }

    ?>

</body>
</html>
