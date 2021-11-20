<?php
require_once __DIR__ . "/../util/Property.php";

class Departamento
{
    private $codigo;
    private $idMunicipalidad;
    private $rutAdministrador;
    private $nombre;
    private $encargado;
    function __construct($codigo, $idMunicipalidad, $rutAdministrador, $nombre, $encargado)
    {
        $this->codigo = new Property($codigo);
        $this->idMunicipalidad = new Property($idMunicipalidad);
        $this->rutAdministrador = new Property($rutAdministrador);
        $this->nombre = new Property($nombre);
        $this->encargado = new Property($encargado);
    }
    public static function onlyPK($codigo)
    {
        return new self($codigo, false, false, false, false);
    }
    public static function makeFromAssocRow($row)
    {
        $codigo = $row["Codigo_dep"];
        $idMunicipalidad = $row["Id_municipalidad"];
        $rutAdministrador = $row["Rut_administrador"];
        $nombre = $row["Nombre_dep"];
        $encargado = $row["Encargado_departamento"];
        $newObject = new self($codigo, $idMunicipalidad, $rutAdministrador, $nombre, $encargado);
        return $newObject;
    }
    public static function insertNuevo($conn, $codigo, $idMunicipalidad, $rutAdministrador, $nombre, $encargado)
    {
        $sql = "INSERT INTO departamento(`Codigo_dep`, `Id_municipalidad`, `Rut_administrador`, `Nombre_dep`, `Encargado_departamento`) VALUES ('$codigo', '$idMunicipalidad', '$rutAdministrador', '$nombre', '$encargado');";
        $resultado = mysqli_query($conn, $sql);
        $newObject = new self($codigo, $idMunicipalidad, $rutAdministrador, $nombre, $encargado);
        return $newObject;
    }
    public static function delete($conn, $codigo)
    {
        $sql = "DELETE FROM departamento WHERE `Codigo_dep`='$codigo';";
        $resultado = mysqli_query($conn, $sql);
    }
    public function update($conn)
    {
        $columns = array();
        if ($this->idMunicipalidad->hasChanged()) {
            $idMunicipalidad = $this->idMunicipalidad->getValue();
            array_push($columns, "`Id_municipalidad`='$idMunicipalidad'");
        }
        if ($this->rutAdministrador->hasChanged()) {
            $rutAdministrador = $this->rutAdministrador->getValue();
            array_push($columns, "`Rut_administrador`='$rutAdministrador'");
        }
        if ($this->nombre->hasChanged()) {
            $nombre = $this->nombre->getValue();
            array_push($columns, "`Nombre_dep`='$nombre'");
        }
        if ($this->encargado->hasChanged()) {
            $encargado = $this->encargado->getValue();
            array_push($columns, "`Encargado_departamento`='$encargado'");
        }
        if (empty($columns)) {
            return;
        }
        $pk = $this->getCodigo();
        $columns = implode(", ", $columns);
        $sql = "UPDATE departamento SET $columns WHERE `Codigo_dep`='$pk'";
        return mysqli_query($conn, $sql);
    }
    public function getCodigo()
    {
        return $this->codigo->getValue();
    }
    public function setCodigo($codigo)
    {
        $this->codigo->setValue($codigo);
    }
    public function getIdMunicipalidad()
    {
        return $this->idMunicipalidad->getValue();
    }
    public function setIdMunicipalidad($idMunicipalidad)
    {
        $this->idMunicipalidad->setValue($idMunicipalidad);
    }
    public function getRutAdministrador()
    {
        return $this->rutAdministrador->getValue();
    }
    public function setRutAdministrador($rutAdministrador)
    {
        $this->rutAdministrador->setValue($rutAdministrador);
    }
    public function getNombre()
    {
        return $this->nombre->getValue();
    }
    public function setNombre($nombre)
    {
        $this->nombre->setValue($nombre);
    }
    public function getEncargado()
    {
        return $this->encargado->getValue();
    }
    public function setEncargado($encargado)
    {
        $this->encargado->setValue($encargado);
    }
}
