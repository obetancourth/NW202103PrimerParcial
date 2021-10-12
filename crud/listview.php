<?php
require_once 'businesslogic.php';
$txtNombre = "";
$txtCuenta = "";
$txtCarrera = "";

$alumnos = getRegistros();
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
            <form action="listview.php" method="post">
                <label for="txtCuenta">Cuenta</label><input type="text" name="txtCuenta" id="txtCuenta" value="<?php echo $txtCuenta; ?>" placeholder="Filtro por Cuenta" /> <br />
                <label for="txtNombre">Nombre</label><input type="text" name="txtNombre" id="txtNombre" value="<?php echo $txtNombre; ?>" placeholder="Filtrar por Nombre" /> <br />
                <label for="txtCarrera">Carrera</label><input type="text" name="txtCarrera" id="txtCarrera" value="<?php echo $txtCarrera; ?>" placeholder="Filtro por Carrera" /> <br />
                <button name="btnFiltrar">Filtrar</button>
            </form>
        </section>
        <section>
            <h2>Alumnos</h2>
            <table>
                <thead>
                    <tr>
                        <th>Cuenta</th>
                        <th>Nombre</th>
                        <th>Carrera</th>
                        <th>Campus</th>
                        <th>Beca</th>
                        <th><a href="formview.php?cuenta=na&mode=INS">Registrar</a></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($alumnos as $row) { ?>
                        <tr>
                            <td><?php echo $row["CUENTA"]; ?></td>
                            <td><?php echo $row["NOMBRE"]; ?></td>
                            <td><?php echo $row["CARRERA"]; ?></td>
                            <td><?php echo $row["CAMPUS"]; ?></td>
                            <td><?php echo $row["BECAS"]; ?></td>
                            <td>
                                <a href="formview.php?cuenta=<?php echo $row["CUENTA"]; ?>&mode=UPD">Editar</a>&nbsp;
                                <a href="formview.php?cuenta=<?php echo $row["CUENTA"]; ?>&mode=DSP">Consultar</a>&nbsp;
                                <a href="formview.php?cuenta=<?php echo $row["CUENTA"]; ?>&mode=DEL">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfooter></tfooter>
            </table>
            <section>

    </main>
    <footer>

    </footer>
</body>

</html>
