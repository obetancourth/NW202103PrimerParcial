<?php

require_once "NubeAnalizer.php";
/*
include_once
require_once
*/

// use Nube\NubeAnalizer;
$txtBigText = "";

$debugStr = "";

if (isset($_POST["btnAnalizar"])) {
    //Aqui hacemos desastres
    $txtBigText = $_POST["txtBigText"];
    $miNubeAnalizer = new Nube\NubeAnalizer($txtBigText);
    $tmpArray = $miNubeAnalizer->analizar();
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
        <br/>
        <textarea id="txtBigText" name="txtBigText" placeholder="Texto a Analizar"
        ><?php echo $txtBigText; ?></textarea>
        <br/>
        <button type="submit" name="btnAnalizar" value="analizar">Analizar</button>
    </form>
    <section>
        <span style="font-size:4em;">Hola (18)</span>
        <span style="font-size:3.5em;">Adios (10)</span>
        <span style="font-size:3em;">Amor (9)</span>

    </section>
    <section>
        <?php echo $debugStr; ?>
    </section>
</body>

</html>
