<?php

namespace Senqual\Model;

use Senqual\Data\DataObject;
use Nette\Database;

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
	protected function __construct(Database\Connection $database, $userId, $id=-1)
	{
		parent::__construct($database, $userId, $id, 'monitors');
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
		return $this->rules->getAll();
	}
	
	/*
	 * DataObject
	 */
	public function load()
	{
		parent::load();
		$this->rules = new MonitorRulesRepository($this->database, $this);
	}
	
	public function save()
	{
		parent::save();
		$this->rules->save();
	}
	
	public function addRule(Rule $rule)
	{
		$this->rules->add($rule);
	}
	
	public function removeRule(Rule $rule)
	{
		return $this->rules->remove($rule);
	}
}

?>