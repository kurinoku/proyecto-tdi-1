<?php
require_once __DIR__ . "/../util/Property.php";

class Administrador
{
    private $rut;
    private $nombre;
    private $numero;
    private $correo;
    private $clave;
    function __construct($rut, $nombre, $numero, $correo, $clave)
    {
        $this->rut = new Property($rut);
        $this->nombre = new Property($nombre);
        $this->numero = new Property($numero);
        $this->correo = new Property($correo);
        $this->clave = new Property($clave);
    }
    public static function onlyPK($rut)
    {
        return new self($rut, false, false, false, false);
    }
    public static function makeFromAssocRow($row)
    {
        $rut = $row["Rut_administrador"];
        $nombre = $row["Nombre_administrador"];
        $numero = $row["Numero_administrador"];
        $correo = $row["Correo_trabajo"];
        $clave = $row["Clave_ingreso"];
        $newObject = new self($rut, $nombre, $numero, $correo, $clave);
        return $newObject;
    }
    public static function insertNuevo($conn, $rut, $nombre, $numero, $correo, $clave)
    {
        $sql = "INSERT INTO administrador(`Rut_administrador`, `Nombre_administrador`, `Numero_administrador`, `Correo_trabajo`, `Clave_ingreso`) VALUES ('$rut', '$nombre', '$numero', '$correo', '$clave');";
        $resultado = mysqli_query($conn, $sql);
        $newObject = new self($rut, $nombre, $numero, $correo, $clave);
        return $newObject;
    }
    public static function delete($conn, $rut)
    {
        $sql = "DELETE FROM administrador WHERE `Rut_administrador`='$rut';";
        $resultado = mysqli_query($conn, $sql);
    }
    public function update($conn)
    {
        $columns = array();
        if ($this->nombre->hasChanged()) {
            $nombre = $this->nombre->getValue();
            array_push($columns, "`Nombre_administrador`='$nombre'");
        }
        if ($this->numero->hasChanged()) {
            $numero = $this->numero->getValue();
            array_push($columns, "`Numero_administrador`='$numero'");
        }
        if ($this->correo->hasChanged()) {
            $correo = $this->correo->getValue();
            array_push($columns, "`Correo_trabajo`='$correo'");
        }
        if ($this->clave->hasChanged()) {
            $clave = $this->clave->getValue();
            array_push($columns, "`Clave_ingreso`='$clave'");
        }
        if (empty($columns)) {
            return;
        }
        $pk = $this->getRut();
        $columns = implode(", ", $columns);
        $sql = "UPDATE administrador SET $columns WHERE `Rut_administrador`='$pk'";
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
    public function getClave()
    {
        return $this->clave->getValue();
    }
    public function setClave($clave)
    {
        $this->clave->setValue($clave);
    }
}
