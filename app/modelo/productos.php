<?php
class productos {
    private $idProducto;
    private $nombre;
    private $precio;
    private $tipCategoria;

  
    public function __construct($idProducto, $nombre,$precio,  $tipCategoria) {
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->precio =$precio;
        $this->tipCategoria = $tipCategoria;
    }

   
    public function toArray() {
        return [
            'idProducto' => $this->idProducto,
            'nombre' => $this->nombre,
            'precio' => $this->precio,
            'tipCategoria' => $this->tipCategoria
        ];
    }

    public function getidProducto() {
        return $this->idProducto;
    }

    public function setidProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    public function getprecio() {
        return $this->precio;
    }

    public function setprecio($precio) {
        $this->precio = $precio;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function gettipCategoria() {
        return $this->tipCategoria;
    }

    public function settipCategoria($tipCategoria) {
        $this->tipCategoria = $tipCategoria;
    }
}
?>