<?php

/*
 * MonitorRulesRepository class
 */
class MonitorRulesRepository extends Repository
{
	/*
	 * Private
	*/
	private $rules;
	private $monitor;
	
	/*
	 * Ctor
	*/
	public function __construct(Nette\Database\Connection $database, $monitor)
	{
		parent::__construct($database, 'monitor_rules');
		$this->monitor = $monitor;
	}
	
	/*
	 * Get All
	 */
	public function getAll()
	{
		if (!$this->rules)
		{
			$this->rules = array();
			foreach($this->table->where("monitor_id", $this->monitor->getId()) 
					as $row)
			{
				array_push($this->rules, 
					new Rule($this->database, $row->id));
			}
		}
		return $this->rules;
	}
}

?>