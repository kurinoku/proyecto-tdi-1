<?php
class Solicitud
{
    public $codigo;
    public $codigoDep;
    public $rutPersona;
    public $tipo;
    public $descripcion;
    public $estado;
    function __construct($codigo, $codigoDep, $rutPersona, $tipo, $descripcion, $estado)
    {
        $this->codigo = $codigo;
        $this->codigoDep = $codigoDep;
        $this->rutPersona = $rutPersona;
        $this->tipo = $tipo;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
    }
    static function select($conn)
    {
        $consulta = "SELECT * FROM solicitud;";
        $resultado = mysqli_query($conn, $consulta);
        $row = mysqli_fetch_assoc($resultado);
        $codigo = $row["Codigo"];
        $codigoDep = $row["Codigo_dep"];
        $rutPersona = $row["Rut_persona"];
        $tipo = $row["Tipo_retroalimentacion"];
        $descripcion = $row["Descripcion"];
        $estado = $row["Estado_msg"];
        $newObject = new Solicitud($codigo, $codigoDep, $rutPersona, $tipo, $descripcion, $estado);
        return $newObject;
    }
    static function insertNuevo($conn, $codigo, $codigoDep, $rutPersona, $tipo, $descripcion, $estado)
    {
        $sql = "INSERT INTO solicitud(`Codigo`, `Codigo_dep`, `Rut_persona`, `Tipo_retroalimentacion`, `Descripcion`, `Estado_msg`) VALUES ('$codigo', '$codigoDep', '$rutPersona', '$tipo', '$descripcion', '$estado');";
        $resultado = mysqli_query($conn, $sql);
        $newObject = new Solicitud($codigo, $codigoDep, $rutPersona, $tipo, $descripcion, $estado);
        return $newObject;
    }
    static function delete($conn, $codigo)
    {
        $sql = "DELETE FROM solicitud WHERE `Codigo`='$codigo';";
        $resultado = mysqli_query($conn, $sql);
    }
}
