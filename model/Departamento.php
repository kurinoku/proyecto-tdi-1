<?php
class Departamento
{
    public $codigo;
    public $idMunicipalidad;
    public $rutAdministrador;
    public $nombre;
    public $encargado;
    function __construct($codigo, $idMunicipalidad, $rutAdministrador, $nombre, $encargado)
    {
        $this->codigo = $codigo;
        $this->idMunicipalidad = $idMunicipalidad;
        $this->rutAdministrador = $rutAdministrador;
        $this->nombre = $nombre;
        $this->encargado = $encargado;
    }
    static function makeFromAssocRow($row)
    {
        $codigo = $row["Codigo_dep"];
        $idMunicipalidad = $row["Id_municipalidad"];
        $rutAdministrador = $row["Rut_administrador"];
        $nombre = $row["Nombre_dep"];
        $encargado = $row["Encargado_departamento"];
        $newObject = new self($codigo, $idMunicipalidad, $rutAdministrador, $nombre, $encargado);
        return $newObject;
    }
    static function insertNuevo($conn, $codigo, $idMunicipalidad, $rutAdministrador, $nombre, $encargado)
    {
        $sql = "INSERT INTO departamento(`Codigo_dep`, `Id_municipalidad`, `Rut_administrador`, `Nombre_dep`, `Encargado_departamento`) VALUES ('$codigo', '$idMunicipalidad', '$rutAdministrador', '$nombre', '$encargado');";
        $resultado = mysqli_query($conn, $sql);
        $newObject = new self($codigo, $idMunicipalidad, $rutAdministrador, $nombre, $encargado);
        return $newObject;
    }
    static function delete($conn, $codigo)
    {
        $sql = "DELETE FROM departamento WHERE `Codigo_dep`='$codigo';";
        $resultado = mysqli_query($conn, $sql);
    }
}
