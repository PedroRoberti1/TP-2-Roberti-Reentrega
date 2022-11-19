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


    //creamos la funcion de agregar juegos al crud

    public function getJuegos()
    {
        $q = "SELECT * FROM juegos";
        $query = self::$conexion->prepare($q);

        if ($query->execute()) {
            $query->bind_result($id, $juego, $estado, $crackby);
            $lista_de_productos = [];
            while ($query->fetch()) {
                $lista_de_productos[] = new Juego($id, $juego, $estado, $crackby);
            }
            return $lista_de_productos;
        }
        return false;
    }

    public function agregar(Juego $j)

    {

        // Preparamos la query del update
        $q = "INSERT INTO juegos (Juego, Estado, crackby) VALUES (?, ?, ?)";
        $query = self::$conexion->prepare($q);

        // Obtenemos los nuevos valores desde el objeto:
        $juego = $j->getJuego();
        $estado = $j->getEstado();
        $crackby = $j->getCrackby();


        // Asignamos los valores para reemplazar los "?" en la query
        if (!$query->bind_param("sss", $juego, $estado, $crackby)) {
            echo "fallo la consulta";
        }

        // Retornamos true si la query tiene éxito, false si fracasa
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function actualizar($id, $estado, $crackby)
    {
        $q = "UPDATE juegos SET Estado=? , crackby = ? WHERE id= ?";
        $query = self::$conexion->prepare($q);

        $query->bind_param('sss', $estado, $crackby, $id);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getEstadoanterior($id)
    {
        $q = "SELECT Estado FROM juegos WHERE id = ?";
        $query = self::$conexion->prepare($q);

        $query->bind_param('d', $id);
        $query->bind_result($estado);
        if ($query->execute()) {
            if ($query->fetch()) {
                return $estado;
            }
        }
        return false;
    }
    public function borrar($id)
    {
        $q = "DELETE FROM juegos WHERE id = ?";
        $query = self::$conexion->prepare($q);


        $query->bind_param('d',$id);
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
