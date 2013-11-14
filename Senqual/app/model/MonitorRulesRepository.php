<?php

namespace Senqual\Model;

use Senqual\Data\Repository;
use Nette\Database;

/*
 * MonitorRulesRepository class
 */
class MonitorRulesRepository extends Repository
{
	/*
	 * Private
	*/
	private $monitor;
	
	/*
	 * Ctor
	*/
	public function __construct(Database\Connection $database, $monitor)
	{
		parent::__construct($database, 'monitor_rules', 'Senqual\\Model\\Rule',
				"rule_id", $monitor);
		$this->monitor = $monitor;
	}
}

?>