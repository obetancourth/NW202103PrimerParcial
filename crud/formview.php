<?php
require_once 'businesslogic.php';

$txtNombre = "";
$txtCuenta = "";
$txtCarrera = "";
$actionText = "Confirmar";
$titleText = "Nuevo Alumno";
$txtCampus = "";
$txtBecas = "";
$mode = "NAP";
$readonly = "";
$modeDesc = array(
    "INS" => "Nuevo Alumno",
    "DSP" => "Detalle de %s %s",
    "UPD" => "Editando %s %s",
    "DEL" => "Eliminando %s %s"
);

// Get
if (isset($_GET["cuenta"])) {
    if ($_GET["cuenta"] != "na") {
        $txtCuenta = $_GET["cuenta"];
    }
    $mode = $_GET["mode"];
}
// Post
if (isset($_POST["btnPrimario"])) {
    $mode = $_POST["mode"];
    $txtCuenta = $_POST["txtCuenta"];
    $txtNombre = $_POST["txtNombre"];
    $txtCarrera = $_POST["txtCarrera"];
    $txtCampus = $_POST["txtCampus"];
    $txtBecas = $_POST["txtBecas"];
    // Validaciones

    //Determinar que accion tomar
    switch ($mode) {
        case "INS":
            if (agregaRegistro($txtCuenta, $txtNombre, $txtCampus, $txtCarrera, $txtBecas)) {
                irAListaConMensaje("Registro agregado Satisfactoriamente.", "listview.php");
            }
            break;
        case "UPD":
            if (actualizarRegistro($txtNombre, $txtCarrera, $txtCampus, $txtBecas, $txtCuenta)) {
                irAListaConMensaje("Registro actualizado Satisfactoriamente.", "listview.php");
            }
            break;
        case "DEL";
            if (eliminarRegistro($txtCuenta)) {
                irAListaConMensaje("Registro eliminado Satisfactoriamente.", "listview.php");
            }
            break;
    }
}
// Any Code
if (isset($modeDesc[$mode])) {
    if ($mode != "INS") {
        // Sacar de la DB el valor de la cuenta
        $tmpAlumno = obtenerRegistro($txtCuenta);
        if (count($tmpAlumno) == 0) {
            irALista();
        }
        $txtNombre = $tmpAlumno["NOMBRE"];
        $txtCarrera = $tmpAlumno["CARRERA"];
        $txtCampus = $tmpAlumno["CAMPUS"];
        $txtBecas = $tmpAlumno["BECAS"];
        $titleText = sprintf($modeDesc[$mode], $txtCuenta, $txtNombre);

        if ($mode == 'DSP' || $mode == 'DEL') {
            $readonly = "readonly disabled";
        }
    }

} else {
    irALista();
}
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
        <h1>Trabajar con Alumnos</h1>
    </header>
    <main>
        <section>

        </section>
        <section>
            <h2><?php echo $titleText; ?></h2>
            <form action="formview.php" method="post">
                <input type="hidden" name="mode" id="mode" value="<?php echo $mode; ?>" />
                <label for="txtCuenta">Cuenta</label>
                <?php if ($mode !== "INS") {
                ?>
                    <input type="hidden" name="txtCuenta" id="txtCuenta" value="<?php echo $txtCuenta; ?>" placeholder="Cuenta" />
                    <span><?php echo $txtCuenta; ?></span>
                    <br />
                <?php
                } else {
                ?>
                    <input type="text" name="txtCuenta" id="txtCuenta" value="<?php echo $txtCuenta; ?>" placeholder="Cuenta" /> <br />
                <?php
                }
                ?>
                <label for="txtNombre">Nombre</label><input <?php echo $readonly; ?> type="text" name="txtNombre" id="txtNombre" value="<?php echo $txtNombre; ?>" placeholder="Nombre" /> <br />
                <label for="txtCarrera">Carrera</label><input <?php echo $readonly; ?> type="text" name="txtCarrera" id="txtCarrera" value="<?php echo $txtCarrera; ?>" placeholder="Carrera" /> <br />
                <label for="txtCampus">Campus</label><input <?php echo $readonly; ?> type="text" name="txtCampus" id="txtCampus" value="<?php echo $txtCampus; ?>" placeholder="Campus" /> <br />
                <label for="txtBecas">Becas</label><input <?php echo $readonly; ?> type="text" name="txtBecas" id="txtBecas" value="<?php echo $txtBecas; ?>" placeholder="Becas" /> <br />
                <?php
                if ($mode != 'DSP') {
                ?>
                    <button name="btnPrimario" type="submit"><?php echo $actionText; ?></button>
                <?php } ?>
                <button name="btnSecundario" id="btnSecundario">Cancelar</button>
            </form>
        </section>

    </main>
    <footer>

    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function(e){
            var btnSecundario = document.getElementById("btnSecundario");
            btnSecundario.addEventListener("click", function(e){
                e.preventDefault();
                e.stopPropagation();
                window.location.assign("listview.php");
            });
        });
    </script>
</body>

</html>
