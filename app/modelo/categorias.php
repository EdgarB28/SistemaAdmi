<?php
class Categoria {
    private $idCategoria;
    private $nombre;
    private $descripcion;

  
    public function __construct($idCategoria, $nombre, $descripcion) {
        $this->idCategoria = $idCategoria;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

   
    public function toArray() {
        return [
            'idCategoria' => $this->idCategoria,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion
        ];
    }

    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
}
?>