<?php
$txtNombre = "";
$txtCuenta = "";
$txtCarrera = "";
$actionText = "Confirmar";
$txtCampus = "";
$txtBecas = "";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajar con Alumnos</title>
</head>

<body>
    <header>
        <h1>Trabajar con Alumnos
    </header>
    <main>
        <section>

        </section>
        <section>
            <h2>Alumnos</h2>
            <form action="listview.php" method="post">
                <label for="txtCuenta">Cuenta</label><input type="text" name="txtCuenta" id="txtCuenta" value="<?php echo $txtCuenta; ?>" placeholder="Cuenta" /> <br />
                <label for="txtNombre">Nombre</label><input type="text" name="txtNombre" id="txtNombre" value="<?php echo $txtNombre; ?>" placeholder="Nombre" /> <br />
                <label for="txtCarrera">Carrera</label><input type="text" name="txtCarrera" id="txtCarrera" value="<?php echo $txtCarrera; ?>" placeholder="Carrera" /> <br />
                <label for="txtCampus">Campus</label><input type="text" name="txtCampus" id="txtCampus" value="<?php echo $txtCampus; ?>" placeholder="Campus" /> <br />
                <label for="txtBecas">Becas</label><input type="text" name="txtBecas" id="txtBecas" value="<?php echo $txtBecas; ?>" placeholder="Becas" /> <br />
                <button name="btnPrimario"><?php echo $actionText;?></button>
                <button name="btnSecundario">Cancelar</button>
            </form>
        </section>

    </main>
    <footer>

    </footer>
</body>

</html>
