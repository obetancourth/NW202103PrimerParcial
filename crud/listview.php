<?php
$txtNombre = "";
$txtCuenta = "";
$txtCarrera = "";
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
                        <th><a href>Registrar</a></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cuenta</td>
                        <td>Nombre</td>
                        <td>Carrera</td>
                        <td>Campus</td>
                        <td>Beca</td>
                        <td>
                            <a href>Editar</a>&nbsp;
                            <a href>Consultar</a>&nbsp;
                            <a href>Visualizar</a>
                        </td>
                    </tr>
                </tbody>
                <tfooter></tfooter>
            </table>
            <section>

    </main>
    <footer>

    </footer>
</body>

</html>
