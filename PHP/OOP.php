<?php

// Here the example OOP concepts

class Test{
    public $a;
    private $b;
    protected $c = 2;
    static $s = 2;

    public function __construct($a1, $b1, $c1){ // this method runs automatically when creating new object
    	$this->setA($a1);
    	$this->setB($b1);
    	$this->setC($c1);
    }

    // here are getters and setters for our properties
    /**
     * @return int
     */
    public function getA(): int
    {
    	return $this->a;
    }

    /**
     * @param $a
     * @return void
     */
    public function setA($a): void
    {
    	$this->a = $a;
    }

    /**
     * @return int
     */
    public function getB(): int
    {
    	return $this->b;
    }

    /**
     * @param $b
     * @return void
     */
    public function setB($b): void
    {
    	$this->b = $b;
    }

    /**
     * @return int
     */
    public function getC(): int
    {
    	return $this->c;
    }

    /**
     * @param $c
     * @return void
     */
    public function setC($c): void
    {
    	$this->c = $c;
    }

    /**
     * @return int
     */
    public function getS(): int // Fatal error. We can have access to static property only with static method
    {
    	return self::$s; // we can have access for static properties with this way (::)
    }

    /**
     * @param $s
     * @return void
     */
    public function setS($s): void
    {
    	self::$s = $s;
    }

    // this is static method which is returning $s static property
    /**
     * @return int
     */
    static function test(): int
    {
    	return self::$s;
    }
}

class Test1 extends Test{ // here we are extending all public, protected or static properties from Test class
    public function getTestA(){
    	return $this->a;
    }
}

echo Test1::test(); // 2 -- test() is static method, that's why we can call it from class
$obj = new Test1(4, 15, 2); // here we are creating another object

echo $obj->getTestA(); // 4 -- this public function can return property from Test class
