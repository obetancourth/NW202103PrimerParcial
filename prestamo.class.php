<?php
require_once("cuota.class.php");
namespace BCO;

use BCO\Cuota;
class Prestamo{
    private $_capital;
    private $_periodos;
    private $_tasa;
    private $_valorFuturo;
    private $_cuotanivelada;
    private $_cuotas;
    public function __construct($capital, $periodos, $tasa)
    {
        $this->_capital = $capital;
        $this->_periodos = $periodos;
        $this->_tasa = $tasa;
    }
    public function calcularPrestamo()
    {
        $this->_valorFuturo = $this->_capital * pow((1 + ($this->_tasa/12)), $this->_periodos);
        $this->_cuotanivelada = round($this->_valorFuturo / $this->_periodos, 4);
        $saldo = $this->_capital;
        for ($i = 1 ; $i<= $this->_periodos; $i ++) {
            $tmpCuota = new Cuota($i, $this->_cuotanivelada, $saldo, $this->_tasa);
            $this->_cuotas[] = $tmpCuota;
            $saldo = $tmpCuota->getSaldoFinal();
        }
    }
}
?>
