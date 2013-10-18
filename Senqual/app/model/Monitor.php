<?php

/*
 * Monitor class
 */
class Monitor extends DataObject
{
	/*
	 * Private
	 */
	private $rules;
	
	/*
	 * Ctor
	 */
	public function __construct(Nette\Database\Connection $database, $id)
	{
		parent::__construct($database, $id, 'monitors');
	}
	
	/*
	 * Getters / Setters
	 */
	public function getName()
	{
		return $this->row['name'];
	}
	
	public function setName($name)
	{
		$this->row['name'] = $name;
	}
	
	public function getRules()
	{
		return $this->rules;
	}
	
	/*
	 * DataObject
	 */
	public function load()
	{
		parent::load();
		
		$this->rules = new MonitorRulesRepository($this->database,
				$this->getId());
	}
}

?>