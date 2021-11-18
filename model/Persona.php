<?php
class Persona
{
    public $rut;
    public $idMunicipalidad;
    public $nombre;
    public $numero;
    public $correo;
    function __construct($rut, $idMunicipalidad, $nombre, $numero, $correo)
    {
        $this->rut = $rut;
        $this->idMunicipalidad = $idMunicipalidad;
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->correo = $correo;
    }
    static function select($conn)
    {
        $consulta = "SELECT * FROM ciudadano;";
        $resultado = mysqli_query($conn, $consulta);
        $row = mysqli_fetch_assoc($resultado);
        $rut = $row["Rut_persona"];
        $idMunicipalidad = $row["Id_municipalidad"];
        $nombre = $row["Nombre_persona"];
        $numero = $row["Numero_persona"];
        $correo = $row["Correo_persona"];
        $newObject = new Persona($rut, $idMunicipalidad, $nombre, $numero, $correo);
        return $newObject;
    }
    static function insertNuevo($conn, $rut, $idMunicipalidad, $nombre, $numero, $correo)
    {
        $sql = "INSERT INTO ciudadano(`Rut_persona`, `Id_municipalidad`, `Nombre_persona`, `Numero_persona`, `Correo_persona`, `Clave_persona`) VALUES ('$rut', '$idMunicipalidad', '$nombre', '$numero', '$correo');";
        $resultado = mysqli_query($conn, $sql);
        $newObject = new Persona($rut, $idMunicipalidad, $nombre, $numero, $correo);
        return $newObject;
    }
    static function delete($conn, $rut)
    {
        $sql = "DELETE FROM ciudadano WHERE `Rut_persona`='$rut';";
        $resultado = mysqli_query($conn, $sql);
    }
}
