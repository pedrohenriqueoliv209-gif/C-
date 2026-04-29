<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculatron 3000</title>
    <link rel="stylesheet" href="calculadora.css">
    <link rel="icon" type="image/png" href="calculadora.png">
</head>
<body>

<h1>Calculatron 3000</h1>

<form method="post">
<div id="inserir">
<?php
    // Gera 10 campos de entrada
    for ($i = 0; $i < 2; $i++) {
        echo '<input type="number" step="any" name="numeros[]">';
    }
    ?>
</div>    
<br></br>
<div class="container">
    <div class="um">  
        <button type="submit" name="operacao" value="soma">Somar</button>
        <button type="submit" name="operacao" value="subtracao">Subtrair</button>
        <button type="submit" name="operacao" value="multiplicacao">Multiplicar</button>
        <button type="submit" name="operacao" value="divisao">Dividir</button>
        <button type="submit" name="operacao" value="potencia">Potenica</button>
        <button type="submit" name="operacao" value="raiz">Raiz</button>
    </div>
    <div class="um">
        <button type="submit" name="operacao" value="resto">Resto da Divisão</button>
        <button type="submit" name="operacao" value="areaq">Area do quadrado</button>
        <button type="submit" name="operacao" value="areac">Area do circulo</button>
        <button type="submit" name="operacao" value="seno">Seno</button>
        <button type="submit" name="operacao" value="cos">Cosseno</button>
        <button type="submit" name="operacao" value="tan">Tangente</button>
    </div>    
</div>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeros = array_filter($_POST["numeros"], fn($n) => $n !== "");

    if (count($numeros) == 0) {
        echo "<p>Insira pelo menos um número.</p>";
        exit;
    }

    $operacao = $_POST["operacao"];
    $resultado = array_shift($numeros);

    foreach ($numeros as $num) {
        switch ($operacao) {
            case "soma":
                $resultado += $num;
                break;
            case "subtracao":
                $resultado -= $num;
                break;
            case "multiplicacao":
                $resultado *= $num;
                break;
            case "divisao":
                if ($num == 0) {
                    echo "<p>Erro: divisão por zero!</p>";
                    exit;
                }
                $resultado /= $num;
                break;
            case "potencia":
                $resultado **= $num;
                break;
            case "raiz":
                $resultado = sqrt($num);
                break;
            case "resto":
                $resultado %= $num;
                break;
            case "areaq":
                $resultado = $num * $num;
                break;
            case "areac":
                $resultado = pi() * pow($num, 2);
                break;
            case "seno":
                $resultado = sin(deg2rad($resultado));
                break;
            case "cos":
                $resultado = cos(deg2rad($resultado));
                break;
            case "tan":
                $resultado = tan(deg2rad($resultado));
                break;

        }
    }
    echo "<div class='resultado'>";
    echo "Números inseridos: " . implode(", ", array_merge([$resultado], $numeros)) . "<br>";
    echo "Resultado: " . $resultado;
    echo "</div>";
}
?>

</body>
</html>