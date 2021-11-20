<?php
require_once __DIR__ . "/../util/Property.php";

class Persona
{
    private $rut;
    private $idMunicipalidad;
    private $nombre;
    private $numero;
    private $correo;
    function __construct($rut, $idMunicipalidad, $nombre, $numero, $correo)
    {
        $this->rut = new Property($rut);
        $this->idMunicipalidad = new Property($idMunicipalidad);
        $this->nombre = new Property($nombre);
        $this->numero = new Property($numero);
        $this->correo = new Property($correo);
    }
    public static function onlyPK($rut)
    {
        return new self($rut, false, false, false, false);
    }
    public static function makeFromAssocRow($row)
    {
        $rut = $row["Rut_persona"];
        $idMunicipalidad = $row["Id_municipalidad"];
        $nombre = $row["Nombre_persona"];
        $numero = $row["Numero_persona"];
        $correo = $row["Correo_persona"];
        $newObject = new self($rut, $idMunicipalidad, $nombre, $numero, $correo);
        return $newObject;
    }
    public static function insertNuevo($conn, $rut, $idMunicipalidad, $nombre, $numero, $correo)
    {
        $sql = "INSERT INTO ciudadano(`Rut_persona`, `Id_municipalidad`, `Nombre_persona`, `Numero_persona`, `Correo_persona`, `Clave_persona`) VALUES ('$rut', '$idMunicipalidad', '$nombre', '$numero', '$correo');";
        $resultado = mysqli_query($conn, $sql);
        $newObject = new self($rut, $idMunicipalidad, $nombre, $numero, $correo);
        return $newObject;
    }
    public static function delete($conn, $rut)
    {
        $sql = "DELETE FROM ciudadano WHERE `Rut_persona`='$rut';";
        $resultado = mysqli_query($conn, $sql);
    }
    public function update($conn)
    {
        $columns = array();
        if ($this->idMunicipalidad->hasChanged()) {
            $idMunicipalidad = $this->idMunicipalidad->getValue();
            array_push($columns, "`Id_municipalidad`='$idMunicipalidad'");
        }
        if ($this->nombre->hasChanged()) {
            $nombre = $this->nombre->getValue();
            array_push($columns, "`Nombre_persona`='$nombre'");
        }
        if ($this->numero->hasChanged()) {
            $numero = $this->numero->getValue();
            array_push($columns, "`Numero_persona`='$numero'");
        }
        if ($this->correo->hasChanged()) {
            $correo = $this->correo->getValue();
            array_push($columns, "`Correo_persona`='$correo'");
        }
        if (empty($columns)) {
            return;
        }
        $pk = $this->getRut();
        $columns = implode(", ", $columns);
        $sql = "UPDATE ciudadano SET $columns WHERE `Rut_persona`='$pk'";
        return mysqli_query($conn, $sql);
    }
    public function getRut()
    {
        return $this->rut->getValue();
    }
    public function setRut($rut)
    {
        $this->rut->setValue($rut);
    }
    public function getIdMunicipalidad()
    {
        return $this->idMunicipalidad->getValue();
    }
    public function setIdMunicipalidad($idMunicipalidad)
    {
        $this->idMunicipalidad->setValue($idMunicipalidad);
    }
    public function getNombre()
    {
        return $this->nombre->getValue();
    }
    public function setNombre($nombre)
    {
        $this->nombre->setValue($nombre);
    }
    public function getNumero()
    {
        return $this->numero->getValue();
    }
    public function setNumero($numero)
    {
        $this->numero->setValue($numero);
    }
    public function getCorreo()
    {
        return $this->correo->getValue();
    }
    public function setCorreo($correo)
    {
        $this->correo->setValue($correo);
    }
}
