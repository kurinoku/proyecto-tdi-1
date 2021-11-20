<?php
class Municipalidad
{
    public $id;
    public $nombre;
    public $direccion;
    public $numero;
    function __construct($id, $nombre, $direccion, $numero)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->numero = $numero;
    }
    static function makeFromAssocRow($row)
    {
        $id = $row["Id_municipalidad"];
        $nombre = $row["Nombre_municipalidad"];
        $direccion = $row["Direccion_municipalidad"];
        $numero = $row["Numero_municipalidad"];
        $newObject = new self($id, $nombre, $direccion, $numero);
        return $newObject;
    }
    static function insertNuevo($conn, $id, $nombre, $direccion, $numero)
    {
        $sql = "INSERT INTO municipalidad(`Id_municipalidad`, `Nombre_municipalidad`, `Direccion_municipalidad`, `Numero_municipalidad`) VALUES ('$id', '$nombre', '$direccion', '$numero');";
        $resultado = mysqli_query($conn, $sql);
        $newObject = new self($id, $nombre, $direccion, $numero);
        return $newObject;
    }
    static function delete($conn, $id)
    {
        $sql = "DELETE FROM municipalidad WHERE `Id_municipalidad`='$id';";
        $resultado = mysqli_query($conn, $sql);
    }
}
