<?php

require_once 'Vertex.class.php';

class Vector
{
    private $_x, $_y, $_z, $_w = 0.0;
    public static $verbose = false;

    public function getX(){
        return $this->_x;
    }

    public function getY(){
        return $this->_y;
    }

    public function getZ(){
        return $this->_z;
    }

    public function getW(){
        return $this->_w;
    }

    public static function doc()
    {
        return file_get_contents("./Vector.doc.txt").PHP_EOL;
    }

    public function __construct(array $kwargs){

        if (array_key_exists('dest', $kwargs)){

            if (!array_key_exists('orig', $kwargs))
                $kwargs['orig'] = new Vertex(array('x'=>0, 'y'=>0, 'z'=>0, 'w'=>1));

            $this->_x = $kwargs['dest']->getX() - $kwargs['orig']->getX();
            $this->_y = $kwargs['dest']->getY() - $kwargs['orig']->getY();
            $this->_z = $kwargs['dest']->getZ() - $kwargs['orig']->getZ();
            $this->_w = $kwargs['dest']->getW() - $kwargs['orig']->getW();

            if (self::$verbose)
                printf('Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f ) constructed'.PHP_EOL,
                    $this->getX(), $this->getY(), $this->getZ(), $this->getW());
        }
    }

    public function __destruct(){
        if (self::$verbose)
            printf('Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f ) destructed'.PHP_EOL,
                $this->getX(), $this->getY(), $this->getZ(), $this->getW());
    }

    public function magnitude(){
        $magnitude = sqrt($this->getX() * $this->getX() + $this->getY() * $this->getY() + $this->getZ() * $this->getZ());
        return $magnitude;
    }

    public function normalize(){
        $magnitude = $this->magnitude();

        $normX = $this->getX() / $magnitude;
        $normY = $this->getY() / $magnitude;
        $normZ = $this->getZ() / $magnitude;

        return new Vector(array( 'dest' => new Vertex(array( 'x' => $normX, 'y' => $normY, 'z' => $normZ))));
    }

    public function add( Vector $rhs ){

        $newX = $this->getX() + $rhs->getX();
        $newY = $this->getY() + $rhs->getY();
        $newZ = $this->getZ() + $rhs->getZ();

        return new Vector(array( 'dest' => new Vertex(array( 'x' => $newX, 'y' => $newY, 'z' => $newZ))));
    }

    public function sub( Vector $rhs ){

        $newX = $this->getX() - $rhs->getX();
        $newY = $this->getY() - $rhs->getY();
        $newZ = $this->getZ() - $rhs->getZ();

        return new Vector(array( 'dest' => new Vertex(array( 'x' => $newX, 'y' => $newY, 'z' => $newZ))));
    }

    public function opposite(){

        return new Vector(array( 'dest' => new Vertex(array( 'x'=>-$this->getX(), 'y'=>-$this->getY(), 'z'=>-$this->getZ()))));
    }

    public function scalarProduct( $k ){

        return new Vector(array( 'dest'=>new Vertex(array('x'=>$this->getX() * $k, 'y'=>$this->getY() * $k, 'z'=>$this->getZ() * $k))));
    }

    public function dotProduct( Vector $rhs ){

        $dotX = $this->getX() * $rhs->getX();
        $dotY = $this->getY() * $rhs->getY();
        $dotZ = $this->getZ() * $rhs->getZ();

        return ($dotX + $dotY + $dotZ);
    }

    public function cos( Vector $rhs ){

        $devided = $this->dotProduct($rhs);
        $divisor = $this->magnitude() * sqrt( $rhs->getX() * $rhs->getX() + $rhs->getY() * $rhs->getY() + $rhs->getZ() * $rhs->getZ());

        return $devided / abs($divisor);
    }

    public function crossProduct( Vector $rhs ){

        return new Vector(array ('dest'=>new Vertex(array(
            'x'=>($this->getY() * $rhs->getZ() - $this->getZ() * $rhs->getY()),
            'y'=>($this->getZ() * $rhs->getX() - $this->getX() * $rhs->getZ()),
            'z'=>($this->getX() * $rhs->getY() - $this->getY() * $rhs->getX())
        ))));

    }

    public function __toString() {
        return (sprintf('Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )', $this->getX(), $this->getY(), $this->getZ(), $this->getW() ) );
    }
}