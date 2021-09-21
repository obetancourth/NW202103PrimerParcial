<?php

$intNumero1 = 1;
$intNumero2 = 1;
$intResultado = null;
$strOperacion = "";

if (isset($_POST["btnProcesar"])) {
    //
    $intNumero1 = intval($_POST["intNumero1"]);
    $intNumero2 = intval($_POST["intNumero2"]);

    $intResultado = $intNumero1 + $intNumero2;
    $strOperacion = "Suma";
}

if (isset($_POST["btnMultiplicar"])) {
    //
    $intNumero1 = intval($_POST["intNumero1"]);
    $intNumero2 = intval($_POST["intNumero2"]);

    $intResultado = $intNumero1 * $intNumero2;
    $strOperacion = "Multiplicación";
}

/*
    Lista
        $lista = ["a","b","c","d"];
        echo $lista[1];
    Diccionario
        $diccionario = {"a":1, "b":3, "c":4}
        echo $diccionario["a"];
     */
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Calculador Simple</h1>
    <h2>Finalizar Sintaxis Básica y Usar Arreglos de Sistema para capturar datos</h2>
    <form action="calculadora.php" method="post">
        <label for="intNumero1">Primer Número</label>
        <input type="text" id="intNumero1" name="intNumero1" value="<?php echo $intNumero1; ?>" placeholder="1-100" />
        <br />
        <label for="intNumero2">Segundo Número</label>
        <input type="text" id="intNumero2" name="intNumero2" value="<?php echo $intNumero2; ?>" placeholder="1-100" />
        <br />
        <button type="submit" name="btnProcesar">Calcular</button>
        <button type="submit" name="btnMultiplicar">Multiplicar</button>
    </form>
    <?php if (is_numeric($intResultado)) { ?>
        <hr />
        <section>
            El resultado de la <?php echo $strOperacion;?> es: <?php echo $intResultado; ?>
        </section>
    <?php } ?>
</body>

</html>
