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

function actualizarRegistro() {

}

function obtenerRegistro() {

}

function eliminarRegistro() {


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

?>
