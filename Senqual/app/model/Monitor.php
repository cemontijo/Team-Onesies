<?php

class Monitor extends DataObject
{
	public function __construct(Nette\Database\Connection $database, $id)
	{
		parent::__construct($database, $id, 'monitors');
	}
	
	public function getName()
	{
		return $this->row['name'];
	}
	
	public function setName($name)
	{
		$this->row['name'] = $name;
		echo $name;
	}
}

?>