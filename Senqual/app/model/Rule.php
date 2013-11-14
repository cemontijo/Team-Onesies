<?php

namespace Senqual\Model;

use Senqual\Data\DataObject;
use Nette\Database;

/*
 * Rule class
 */
class Rule extends DataObject
{
	
	/*
	 * Ctor
	 */
	public function __construct(Database\Connection $database, $username, $id)
	{
		parent::__construct($database, $username, $id, 'rules');
	}
	
	/*
	 * Getters / Setters
	 */
	public function getDnl()
	{
		return $this->row['dnl'];
	}
	
	public function setDnl($dnl)
	{
		$this->row['dnl'] = dnl;
	}
}

?>