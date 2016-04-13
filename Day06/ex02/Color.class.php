<?php

Class Color
{
    static $verbose = false;
    public $red = 0;
    public $green = 0;
    public $blue = 0;

    public function __construct(array $kwargs)
    {
        if (array_key_exists('rgb', $kwargs)) {
            $this->red = ($kwargs['rgb'] >> 16) % 256;
            $this->green = ($kwargs['rgb'] >> 8) % 256;
            $this->blue = $kwargs['rgb'] % 256;
        } else
            if ((array_key_exists('red', $kwargs)) && (array_key_exists('green', $kwargs)) && (array_key_exists('blue', $kwargs))) {
                $this->red = ($kwargs['red'] % 256);
                $this->green = ($kwargs['green'] % 256);
                $this->blue = ($kwargs['blue'] % 256);
            }

        if (self::$verbose)
            printf('Color( red: %3d, green: %3d, blue: %3d ) constructed.' . PHP_EOL, $this->red, $this->green, $this->blue);
    }

    static function doc()
    {
        $doc = file_get_contents('./Color.doc.txt') . PHP_EOL;
        echo $doc;
    }

    public function add($color)
    {
        return new Color(array('red' => $this->red + $color->red, 'green' => $this->green + $color->green, 'blue' => $this->blue + $color->blue));
    }

    public function sub($color)
    {
        return new Color(array('red' => $this->red - $color->red, 'green' => $this->green - $color->green, 'blue' => $this->blue - $color->blue));
    }

    public function mult($f)
    {
        return new Color(array('red' => $this->red * $f, 'green' => $this->green * $f, 'blue' => $this->blue * $f));

    }

    public function __toString()
    {
        return (sprintf('Color( red: %3d, green: %3d, blue: %3d )', $this->red, $this->green, $this->blue));
    }

    public function __destruct()
    {
        if (self::$verbose)
            printf('Color( red: %3d, green: %3d, blue: %3d ) destructed.' . PHP_EOL, $this->red, $this->green, $this->blue);
    }

}