<?php
class Categoria {
    private $idCategoria;
    private $nombre;
    private $descripcion;
    private $estado;
    private $dir_img;

  
    public function __construct($idCategoria, $nombre, $descripcion,$estado,$dir_img=null) {
        $this->idCategoria = $idCategoria;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->dir_img = $dir_img;
    }

   
    public function toArray() {
        $data = [
            'idCategoria' => $this->idCategoria,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'estado'=>$this->estado
        ];

        if ($this->dir_img !== null) {
            $data['dir_img'] = $this->dir_img;
        }

        return $data;
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