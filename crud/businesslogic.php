<?php

require_once 'datos.php';
session_start();

function getRegistros(){
    $alumnosSql = "SELECT * FROM ALUMNOS";
    return AlumosModel::getRegistros($alumnosSql);
}

function setearFiltros(){

}

function agregaRegistro($cuenta, $nombre, $campus, $carrera, $becas)
{
    $sqlstr = "INSERT INTO ALUMNOS (CUENTA, NOMBRE, CARRERA, CAMPUS, BECAS)
    values ('%s', '%s', '%s' , '%s', '%s');";

    $sqlstr = sprintf(
        $sqlstr,
        $cuenta,
        $nombre,
        $carrera,
        $campus,
        $becas
    );
    return AlumosModel::executeNonQuery($sqlstr);

}

function actualizarRegistro(
    $nombre,
    $carrera,
    $campus,
    $becas,
    $cuenta
) {
    $sqlstr = "UPDATE ALUMNOS set  NOMBRE = '%s',
        CARRERA = '%s', CAMPUS = '%s', BECAS = '%s'
        where CUENTA = '%s';"
    ;
    $sqlstr = sprintf(
        $sqlstr,
        $nombre,
        $carrera,
        $campus,
        $becas,
        $cuenta
    );

    return AlumosModel::executeNonQuery($sqlstr);

}

function obtenerRegistro($cuenta)
{
    $alumnosSql = "SELECT * FROM ALUMNOS where CUENTA='%s';";
    return AlumosModel::getRegistro(
        sprintf(
            $alumnosSql,
            $cuenta
        )
    );
}

function eliminarRegistro($cuenta) 
{
    $sqlstr = "DELETE FROM ALUMNOS where CUENTA='%s';";
    return AlumosModel::executeNonQuery(
        sprintf(
            $sqlstr,
            $cuenta
        )
    );
}

function incializarTabla() {
    $sqlCreate = "CREATE TABLE IF NOT EXISTS ALUMNOS (
    'CUENTA' TEXT NOT NULL PRIMARY KEY ,
    'NOMBRE' TEXT NOT NULL,
    'CARRERA' TEXT NOT NULL,
    'CAMPUS' TEXT NOT NULL,
    'BECAS' TEXT NOT NULL
    );";

    AlumosModel::executeNonQuery($sqlCreate);
}

function irALista()
{
    header("location:listview.php");
    die();
}

function irAListaConMensaje($mensaje, $to)
{
    echo '<script>alert("'.$mensaje.'");window.location.assign("'.$to.'")</script>';
    die();
}
?>
