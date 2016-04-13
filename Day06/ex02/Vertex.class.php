<?php

require_once 'Color.class.php';

class Vertex
{
    private $_x;
    private $_y;
    private $_z;
    private $_w = 1.0;
    private $_color;

    public static $verbose = false;

    public function getX()
    {
        return $this->_x;
    }

    public function setX($x)
    {
        $this->_x = $x;
    }

    public function getY()
    {
        return $this->_y;
    }

    public function setY($y)
    {
        $this->_y = $y;
    }

    public function getZ()
    {
        return $this->_z;
    }

    public function setZ($z)
    {
        $this->_z = $z;
    }

    public function getW()
    {
        return $this->_w;
    }

    public function setW($w)
    {
        $this->_w = $w;
    }

    public function getColor()
    {
        return $this->_color;
    }

    public function setColor($color)
    {
        $this->_color = $color;
    }

    public static function doc()
    {
        $doc = file_get_contents("./Vertex.doc.txt") . PHP_EOL;
        return $doc;
    }

    function __construct(array $kwargs)
    {
        if (array_key_exists('x', $kwargs) && array_key_exists('y', $kwargs) && array_key_exists('z', $kwargs)) {

            $this->setX($kwargs['x']);

            $this->setY($kwargs['y']);

            $this->setZ($kwargs['z']);

            if (array_key_exists('w', $kwargs))
                $this->setW($kwargs['w']);

            if (array_key_exists('color', $kwargs))
                $this->setColor($kwargs['color']);
            else
                $this->setColor(new Color(array('red' => 255, 'green' => 255, 'blue' => 255)));

            if (self::$verbose)
                printf('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) constructed' . PHP_EOL, $this->getX(), $this->getY(), $this->getZ(), $this->getW(), $this->getColor());
        }
    }

    function __destruct()
    {
        if (self::$verbose)
            printf('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) destructed' . PHP_EOL, $this->getX(), $this->getY(), $this->getZ(), $this->getW(), $this->getColor());
    }

    public function __toString()
    {
        if (self::$verbose)
            return (sprintf('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )', $this->getX(), $this->getY(), $this->getZ(), $this->getW(), $this->getColor()));
        else
            return (sprintf('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )', $this->getX(), $this->getY(), $this->getZ(), $this->getW()));
    }
}