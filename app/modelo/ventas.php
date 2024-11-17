<?php
class ventas {
    private $fecCompra;
    private $colaborador;
    private $cantidad;
    private $MontoTotal;
    private $MedioPago;
    private $local;
    private $Estado;

  
    public function __construct($fecCompra, $colaborador,$cantidad,  $MontoTotal,$MedioPago,$local,$Estado) {
        $this->fecCompra = $fecCompra;
        $this->colaborador = $colaborador;
        $this->cantidad =$cantidad;
        $this->MontoTotal = $MontoTotal;
        $this->MedioPago = $MedioPago;
        $this->local =$local;
        $this->Estado=$Estado;
    }

   
    public function toArray() {
        return [
            'fecCompra' => $this->fecCompra,
            'colaborador' => $this->colaborador,
            'cantidad' => $this->cantidad,
            'MontoTotal' => $this->MontoTotal,
            'MedioPago' => $this->MedioPago,
            'local'=> $this->local,
            'Estado' =>$this->Estado
        ];
    }

    public function getfecCompra() {
        return $this->fecCompra;
    }

    public function setfecCompra($fecCompra) {
        $this->fecCompra = $fecCompra;
    }

    public function getcolaborador() {
        return $this->colaborador;
    }

    public function setcolaborador($colaborador) {
        $this->colaborador = $colaborador;
    }

    public function getcantidad() {
        return $this->cantidad;
    }

    public function setcantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function getMontoTotal() {
        return $this->MontoTotal;
    }

    public function setMontoTotal($MontoTotal) {
        $this->MontoTotal = $MontoTotal;
    }

    public function getMedioPago() {
        return $this->MedioPago;
    }

    public function setMedioPago($MedioPago) {
        $this->MedioPago = $MedioPago;
    }

    public function getlocal() {
        return $this->local;
    }

    public function setlocal($local) {
        $this->local = $local;
    }

    public function getEstado() {
        return $this->Estado;
    }

    public function setEstado($Estado) {
        $this->Estado = $Estado;
    }

}
?>