<?php 

class Juego{
    protected $id;
	protected $juego;
	protected $estado;
	protected $crackby;
	

	public function __construct ($juego, $estado, $crackby, $id=null){

		$this->juego = $juego;
		$this->estado = $estado;
		$this->crackby = $crackby;
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
    public function getId(){
        return $this->id;
    }




}


?>