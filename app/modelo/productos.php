<?php
class productos {
    private $idProducto;
    private $nombre;
    private $precio;
    private $tipCategoria;
    private $cantidad;
    private $idCategoria;
    private $dir_img;
    private $descrip;

  
    public function __construct($idProducto, $nombre,$precio,  $tipCategoria = null,$cantidad=null,$idCategoria=null,$dir_img=null,$descrip=null) {
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->precio =$precio;
        $this->tipCategoria = $tipCategoria;
        $this->cantidad = $cantidad;
        $this->idCategoria = $idCategoria;
        $this->dir_img = $dir_img;
        $this->descrip = $descrip;
    }

   
    public function toArray() {
        $data = [
            'idProducto' => $this->idProducto,
            'nombre' => $this->nombre,
            'precio' => $this->precio
        ];

        // Solo incluir si los atributos no son null
        if ($this->tipCategoria !== null) {
            $data['tipCategoria'] = $this->tipCategoria;
        }

        if ($this->cantidad !== null) {
            $data['cantidad'] = $this->cantidad;
        }
        
        if($this->idCategoria !==null){
            $data['idCategoria'] = $this->idCategoria;
        }
        if($this->dir_img !==null){
            $data['dir_img'] = $this->dir_img;
        }
        if($this->descrip !==null){
            $data['descrip'] = $this->descrip;
        }


        return $data;
    }

    public function getCantidad(){
        return $this->cantidad;
    }

    public function setCantidad(){
        $this->cantidad = $cantidad;
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