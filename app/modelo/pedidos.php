<?php
class pedidos {
    private $idPedido;
    private $nombreProducto;
    private $cantidad;
    private $tipEntrega;
    private $estado;
    private $fecha;
    private $minutosTrans;
  
    public function __construct($idPedido, $nombreProducto=null, $cantidad,$tipEntrega,$estado,$fecha,$minutosTrans) {
        $this->idPedido = $idPedido;
        $this->nombreProducto = $nombreProducto;
        $this->cantidad = $cantidad;
        $this->tipEntrega = $tipEntrega;
        $this->estado = $estado;
        $this->fecha = $fecha;
        $this->minutosTrans = $minutosTrans;
    }

   
    public function toArray() {
        $data = [
            'idPedido' => $this->idPedido,
            'cantidad' => $this->cantidad,
            'tipEntrega'=>$this->tipEntrega,
            'estado'=>$this->estado,
            'fecha'=>$this->fecha,
            'minutosTrans'=>$this->minutosTrans
        ];

        if ($this->nombreProducto !== null) {
            $data['nombreProducto'] = $this->nombreProducto;
        }

        return $data;
    }

    public function getestado(){
        return $this->estado;
    }

    public function setestado($estado){
        $this->estado = $estado;
    }

    public function getidPedido() {
        return $this->idPedido;
    }

    public function setidPedido($idPedido) {
        $this->idPedido = $idPedido;
    }

    public function getnombreProducto() {
        return $this->nombreProducto;
    }

    public function setnombreProducto($nombreProducto) {
        $this->nombreProducto = $nombreProducto;
    }

    public function getcantidad() {
        return $this->cantidad;
    }

    public function setcantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function gettipEntrega() {
        return $this->tipEntrega;
    }

    public function settipEntrega($tipEntrega) {
        $this->tipEntrega = $tipEntrega;
    }

    public function getfecha() {
        return $this->fecha;
    }

    public function setfecha($fecha) {
        $this->fecha = $fecha;
    }
}
?>