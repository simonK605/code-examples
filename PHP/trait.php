<?php
trait Test{
    /**
     * @return int
     */
    public function func(): int
    {
		return 1;
	}

    /**
     * @return int
     */
    public function func1(): int
    {
		return 2;
	}
}
trait Test1{
    /**
     * @return int
     */
    public function func(): int
    {
		return 1;
	}

    /**
     * @return int
     */
    public function func1(): int
    {
		return 2;
	}
}

class A{
	use Test, Test1{
		Test::func insteadof Test1;
		Test1::func1 insteadof Test;
	}
}

$obj = new A();
echo $obj->func();
echo $obj->func1();


