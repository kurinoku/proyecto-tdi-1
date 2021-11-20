<?php
class Property
{
    private $value;
    private $changed;
    function __construct($value)
    {
        $this->value = $value;
        $this->changed = false;
    }
    public function setValue($value)
    {
        $this->value = $value;
        $this->changed = true;
    }
    public function getValue()
    {
        return $this->$value;
    }
    public function hasChanged()
    {
        return $this->changed;
    }
}
