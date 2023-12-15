<?php

// Here the example OOP Connection

class Test{
    /**
     * @var int|null
     */

	public int|null $id = null;

    /**
     * @var string
     */
	public string $name;

    /**
     * @var int
     */
    public int $age;

	public function getId(): ?int
    {
		return $this->id;
	}
	public function setId($id=null): void
    {
		$this->id = $id;
	}

	public function getName(): string
    {
		return $this->name;
	}
	public function setName($name=null): void
    {
		$this->name = $name;
	}

	public function getAge(): int
    {
		return $this->age;
	}
	public function setAge($age=null): void
    {
		$this->age = $age;
	}

	// query ****************************************************

	public function insert(){
		require_once "mysqli_config.php";
		$connection = Config::getConnect();
		$query = 'INSERT INTO table1(name, age) VALUES ("' . $this->getName() . '", "' . $this->getAge().'")';

        $connection->query($query);
		if($connection->error){
			return $connection->error;
		}
		return $connection->insert_id;
	}
}


$obj = new Test();
$obj->setName("Test Name");
$obj->setAge(22);

$obj->insert();