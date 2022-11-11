<?php 

class Juego{

	protected $juego;
	protected $estado;
	protected $crackby;
    protected $imagen;
	

	public function __construct ($juego, $estado, $crackby, $imagen, $id=null){

		$this->juego = $juego;
		$this->estado = $estado;
		$this->crackby = $crackby;
        $this->imagen= $imagen;
        $this->id= $id;
	}

	public function getJuego() {
		return $this->juego;
	}
    public function getEstado() {
    	return $this->estado;
    }
    public function getCrackby() {
    	return $this->crackby;
    }
    public function getImagen(){
        return $this->imagen;
    }

    public function getId(){
        return $this->id;
    }




}


?>