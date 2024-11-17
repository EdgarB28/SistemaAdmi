<?php
class Categoria {
    private $idCategoria;
    private $nombre;
    private $descripcion;
    private $estado;

  
    public function __construct($idCategoria, $nombre, $descripcion,$estado) {
        $this->idCategoria = $idCategoria;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
    }

   
    public function toArray() {
        return [
            'idCategoria' => $this->idCategoria,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'estado'=>$this->estado
        ];
    }

    public function getestado(){
        return $this->estado;
    }

    public function setestado($estado){
        $this->estado = $estado;
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