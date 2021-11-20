<?php
require_once __DIR__ . "/../util/Property.php";

class Municipalidad
{
    private $id;
    private $nombre;
    private $direccion;
    private $numero;
    function __construct($id, $nombre, $direccion, $numero)
    {
        $this->id = new Property($id);
        $this->nombre = new Property($nombre);
        $this->direccion = new Property($direccion);
        $this->numero = new Property($numero);
    }
    public static function onlyPK($id)
    {
        return new self($id, false, false, false);
    }
    public static function makeFromAssocRow($row)
    {
        $id = $row["Id_municipalidad"];
        $nombre = $row["Nombre_municipalidad"];
        $direccion = $row["Direccion_municipalidad"];
        $numero = $row["Numero_municipalidad"];
        $newObject = new self($id, $nombre, $direccion, $numero);
        return $newObject;
    }
    public static function insertNuevo($conn, $id, $nombre, $direccion, $numero)
    {
        $sql = "INSERT INTO municipalidad(`Id_municipalidad`, `Nombre_municipalidad`, `Direccion_municipalidad`, `Numero_municipalidad`) VALUES ('$id', '$nombre', '$direccion', '$numero');";
        $resultado = mysqli_query($conn, $sql);
        $newObject = new self($id, $nombre, $direccion, $numero);
        return $newObject;
    }
    public static function delete($conn, $id)
    {
        $sql = "DELETE FROM municipalidad WHERE `Id_municipalidad`='$id';";
        $resultado = mysqli_query($conn, $sql);
    }
    public function update($conn)
    {
        $columns = array();
        if ($this->nombre->hasChanged()) {
            $nombre = $this->nombre->getValue();
            array_push($columns, "`Nombre_municipalidad`='$nombre'");
        }
        if ($this->direccion->hasChanged()) {
            $direccion = $this->direccion->getValue();
            array_push($columns, "`Direccion_municipalidad`='$direccion'");
        }
        if ($this->numero->hasChanged()) {
            $numero = $this->numero->getValue();
            array_push($columns, "`Numero_municipalidad`='$numero'");
        }
        if (empty($columns)) {
            return;
        }
        $pk = $this->getId();
        $columns = implode(", ", $columns);
        $sql = "UPDATE municipalidad SET $columns WHERE `Id_municipalidad`='$pk'";
        return mysqli_query($conn, $sql);
    }
    public function getId()
    {
        return $this->id->getValue();
    }
    public function setId($id)
    {
        $this->id->setValue($id);
    }
    public function getNombre()
    {
        return $this->nombre->getValue();
    }
    public function setNombre($nombre)
    {
        $this->nombre->setValue($nombre);
    }
    public function getDireccion()
    {
        return $this->direccion->getValue();
    }
    public function setDireccion($direccion)
    {
        $this->direccion->setValue($direccion);
    }
    public function getNumero()
    {
        return $this->numero->getValue();
    }
    public function setNumero($numero)
    {
        $this->numero->setValue($numero);
    }
}
