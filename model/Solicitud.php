<?php
require_once __DIR__ . "/../util/Property.php";

class Solicitud
{
    private $codigo;
    private $codigoDep;
    private $rutPersona;
    private $tipo;
    private $descripcion;
    private $estado;
    function __construct($codigo, $codigoDep, $rutPersona, $tipo, $descripcion, $estado)
    {
        $this->codigo = new Property($codigo);
        $this->codigoDep = new Property($codigoDep);
        $this->rutPersona = new Property($rutPersona);
        $this->tipo = new Property($tipo);
        $this->descripcion = new Property($descripcion);
        $this->estado = new Property($estado);
    }
    public static function onlyPK($codigo)
    {
        return new self($codigo, false, false, false, false, false);
    }
    public static function makeFromAssocRow($row)
    {
        $codigo = $row["Codigo"];
        $codigoDep = $row["Codigo_dep"];
        $rutPersona = $row["Rut_persona"];
        $tipo = $row["Tipo_retroalimentacion"];
        $descripcion = $row["Descripcion"];
        $estado = $row["Estado_msg"];
        $newObject = new self($codigo, $codigoDep, $rutPersona, $tipo, $descripcion, $estado);
        return $newObject;
    }
    public static function insertNuevo($conn, $codigo, $codigoDep, $rutPersona, $tipo, $descripcion, $estado)
    {
        $sql = "INSERT INTO solicitud(`Codigo`, `Codigo_dep`, `Rut_persona`, `Tipo_retroalimentacion`, `Descripcion`, `Estado_msg`) VALUES ($codigo, '$codigoDep', '$rutPersona', '$tipo', '$descripcion', '$estado');";
        $resultado = mysqli_query($conn, $sql);
        $newObject = new self($codigo, $codigoDep, $rutPersona, $tipo, $descripcion, $estado);
        return $newObject;
    }
    public static function delete($conn, $codigo)
    {
        $sql = "DELETE FROM solicitud WHERE `Codigo`=$codigo;";
        $resultado = mysqli_query($conn, $sql);
    }
    public function update($conn)
    {
        $columns = array();
        if ($this->codigoDep->hasChanged()) {
            $codigoDep = $this->codigoDep->getValue();
            array_push($columns, "`Codigo_dep`='$codigoDep'");
        }
        if ($this->rutPersona->hasChanged()) {
            $rutPersona = $this->rutPersona->getValue();
            array_push($columns, "`Rut_persona`='$rutPersona'");
        }
        if ($this->tipo->hasChanged()) {
            $tipo = $this->tipo->getValue();
            array_push($columns, "`Tipo_retroalimentacion`='$tipo'");
        }
        if ($this->descripcion->hasChanged()) {
            $descripcion = $this->descripcion->getValue();
            array_push($columns, "`Descripcion`='$descripcion'");
        }
        if ($this->estado->hasChanged()) {
            $estado = $this->estado->getValue();
            array_push($columns, "`Estado_msg`='$estado'");
        }
        if (empty($columns)) {
            return;
        }
        $pk = $this->getCodigo();
        $columns = implode(", ", $columns);
        $sql = "UPDATE solicitud SET $columns WHERE `Codigo`=$pk";
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
    public function getCodigoDep()
    {
        return $this->codigoDep->getValue();
    }
    public function setCodigoDep($codigoDep)
    {
        $this->codigoDep->setValue($codigoDep);
    }
    public function getRutPersona()
    {
        return $this->rutPersona->getValue();
    }
    public function setRutPersona($rutPersona)
    {
        $this->rutPersona->setValue($rutPersona);
    }
    public function getTipo()
    {
        return $this->tipo->getValue();
    }
    public function setTipo($tipo)
    {
        $this->tipo->setValue($tipo);
    }
    public function getDescripcion()
    {
        return $this->descripcion->getValue();
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion->setValue($descripcion);
    }
    public function getEstado()
    {
        return $this->estado->getValue();
    }
    public function setEstado($estado)
    {
        $this->estado->setValue($estado);
    }
}
