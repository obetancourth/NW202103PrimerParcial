<?php

$txtBigText = "";

if (isset($_POST["btnAnalizar"])) {
    //Aqui hacemos desastres
    $txtBigText = $_POST["txtBigText"];
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
</body>

</html>
