<?php

require_once "NubeAnalizer.php";
/*
include_once
require_once
*/

// use Nube\NubeAnalizer;
$txtBigText = "";
$debugStr = "";
$fontSizeMax = 5;
$fontSizeMin = 0.5;

if (isset($_POST["btnAnalizar"])) {
    //Aqui hacemos desastres
    $txtBigText = $_POST["txtBigText"];
    $miNubeAnalizer = new Nube\NubeAnalizer($txtBigText);
    $miNubeAnalizer->analizar();
    $datos = $miNubeAnalizer->obtenerPalabras();
    //$debugStr = json_encode($datos, JSON_PRETTY_PRINT);
    $htmlBuffer = array();
    /*  y = maxFontSize * frecuencia / maxfrecuencia  */
    $max = $datos["max"];
    foreach ($datos["words"] as $palabra => $frecuencia) {
        $fontSize = $fontSizeMax * ($frecuencia / $max);
        $fontSize = ($fontSize < $fontSizeMin) ? $fontSizeMin : $fontSize;
        $htmlBuffer[] = '<span style="font-size:' . $fontSize . 'em">' . $palabra . ' (' . $frecuencia . ') &nbsp;</span>';
    }
    $debugStr = implode("", $htmlBuffer);
    /* Use Case 1: Top 10
    $top10 = 10;
    $i = 0;
    foreach ($tmpArray as $key => $value) {
        $debugStr .= $key . " - " . $value . ", ";
        $i++;
        if ($i >= $top10) {
            break;
        }
    }
    */
    /* Use Case 2: Solo lo que tiene valor 4
    $valueToShow = 4;
    foreach ($tmpArray as $key => $value) {
        if ($value == $valueToShow) {
            $debugStr .= $key . " - " . $value . ", ";
        }
    }
    KISS -> Keep it simple #¢∞#
    DRY -> Don´t Repeat yourself;
    */
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nube de Palabras</title>
</head>

<body>
    <h1>Nube de Palabras</h1>
    <form action="nubepalabras.php" method="POST">
        <label for="txtBigText">Texto a Analizar</label>
        <br />
        <textarea id="txtBigText" name="txtBigText" placeholder="Texto a Analizar"><?php echo $txtBigText; ?></textarea>
        <br />
        <button type="submit" name="btnAnalizar" value="analizar">Analizar</button>
    </form>
    <section>
        <?php echo $debugStr; ?>
    </section>
</body>

</html>
