<?php
class Administrador
{
    public $rut;
    public $nombre;
    public $numero;
    public $correo;
    public $clave;
    function __construct($rut, $nombre, $numero, $correo, $clave)
    {
        $this->rut = $rut;
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->correo = $correo;
        $this->clave = $clave;
    }
    static function select($conn)
    {
        $consulta = "SELECT * FROM administrador;";
        $resultado = mysqli_query($conn, $consulta);
        $row = mysqli_fetch_assoc($resultado);
        $rut = $row["Rut_administrador"];
        $nombre = $row["Nombre_administrador"];
        $numero = $row["Numero_administrador"];
        $correo = $row["Correo_trabajo"];
        $clave = $row["Clave_ingreso"];
        $newObject = new Administrador($rut, $nombre, $numero, $correo, $clave);
        return $newObject;
    }
    static function insertNuevo($conn, $rut, $nombre, $numero, $correo, $clave)
    {
        $sql = "INSERT INTO administrador(`Rut_administrador`, `Nombre_administrador`, `Numero_administrador`, `Correo_trabajo`, `Clave_ingreso`) VALUES ('$rut', '$nombre', '$numero', '$correo', '$clave');";
        $resultado = mysqli_query($conn, $sql);
        $newObject = new Administrador($rut, $nombre, $numero, $correo, $clave);
        return $newObject;
    }
    static function delete($conn, $rut)
    {
        $sql = "DELETE FROM administrador WHERE `Rut_administrador`='$rut';";
        $resultado = mysqli_query($conn, $sql);
    }
}
