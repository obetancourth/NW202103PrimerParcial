<?php

class DBConnection {
    private static $_MyConn = null;

    private function __construct()
    {
        //evitar new DBConnection
    }

    public static function getConn() {
        if (!self::$_MyConn) {
            self::$_MyConn = new SQLite3("alumnos.db", SQLITE3_OPEN_READWRITE|SQLITE3_OPEN_CREATE);
        }
        return self::$_MyConn;
    }
}

class AlumosModel {
    private function __construct()
    {
        //No To Use
    }

    public static function getRegistros($sql)
    {
        $cursor = DBConnection::getConn()->query($sql);
        $returnArray = array();
        while ( $registro = $cursor->fetchArray()) {
            $returnArray[] = $registro;
        }
        return $returnArray;
    }

    public static function getRegistro($sql)
    {
        $cursor = DBConnection::getConn()->query($sql);
        $returnArray = array();
        while ($registro = $cursor->fetchArray()) {
            $returnArray = $registro;
            break;
        }
       return $returnArray;
    }

    public static function executeNonQuery($sql){
        return DBConnection::getConn()->query($sql);
    }
}

?>
