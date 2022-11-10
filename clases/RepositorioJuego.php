<?php

require_once 'Usuario.php';
require_once 'Juego.php';
require_once '.env.php';

class RepositorioJuego
{

    private static $conexion = null;

    public function __construct()
    {

        if (is_null(self::$conexion)) {
            $credenciales = credenciales();
            self::$conexion = new mysqli(
                $credenciales['servidor'],
                $credenciales['usuario'],
                $credenciales['clave'],
                $credenciales['base_de_datos']
            );
            if (self::$conexion->connect_error) {
                $error = 'Error al conectar:' . self::$conexion->connect_error;
                self::$connexion = null;
                die($error);
            }
            self::$conexion->set_charset('utf8mb4');
        }
    }


public function agregar(Juego $juego, $imagen, $estado,  $crackby)
    {

        // Preparamos la query del update
        $q = "INSERT INTO juegos (Nombre, Imagen, Estado, Crack_by) VALUES (?, ?, ?,?)";
        $query = self::$conexion->prepare($q);

        // Obtenemos los nuevos valores desde el objeto:
        $juego = $juego->getJuego();
        $imagen = $imagen->getImagen();
        $estado = $estado->getEstado();
        $crackby = $crackby->getCrackby();


        // Asignamos los valores para reemplazar los "?" en la query
        if (!$query->bind_param("sisi", $producto, $usuario_id, $marca, $cantidad)) {
            echo "fallo la consulta";
        }

        // Retornamos true si la query tiene éxito, false si fracasa
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
