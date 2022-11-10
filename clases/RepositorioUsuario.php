<?php 
require_once '.env.php';
require_once 'Usuario.php';

class RepositorioUsuario{

	private static $conexion = null;

	public function __construct(){

		if (is_null(self::$conexion)) {
			$credenciales = credenciales();
			self::$conexion = new mysqli(
				$credenciales['servidor'],
				$credenciales['usuario'],
				$credenciales['clave'],
				$credenciales['base_de_datos']
			);
			if (self::$conexion->connect_error){
				$error = 'Error al conectar:' . self::$conexion->connect_error;
				self::$conexxion = null;
				die($error);
			}
			self::$conexion->set_charset('utf8mb4');
		}
	}

	public function login($nombre_usuario, $clave){

		$q = "SELECT * FROM usuarios WHERE usuario = ?";
		$query = self::$conexion->prepare($q);
		$query->bind_param('s', $nombre_usuario);

		if ($query->execute()){
			$query->bind_result($id, $usuario, $clave_encriptada, $nombre, $apellido, $email);
			if ($query->fetch()) {
				if (password_verify($clave, $clave_encriptada)){

				return new Usuario($usuario, $nombre, $apellido, $email, $id);
				}
			}
		}
		return false;
	}

public function save(Usuario $usuario, $clave){

	$q = "INSERT INTO usuarios (usuario, clave, nombre, apellido, email)";
	$q.= "VALUES (?, ?, ?, ?, ?)";
	$query = self::$conexion->prepare($q);

	$nombre_usuario = $usuario->getUsuario();

	$clave_encriptada = password_hash($clave, PASSWORD_DEFAULT);
	
	$nombre = $usuario->getNombre();
	$apellido = $usuario->getApellido();
	$email = $usuario->getEmail();	
		$query->bind_param("sssss",
		$nombre_usuario,
		$clave_encriptada,
		$nombre,
		$apellido,
		$email
	);

	if ($query->execute()){
	return self::$conexion->insert_id;
	} else{

		return false;
	}
}

}


?>