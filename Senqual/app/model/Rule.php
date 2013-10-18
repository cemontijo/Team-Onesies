<?php

/*
 * Rule class
 */
class Rule extends DataObject
{
	
	/*
	 * Ctor
	 */
	public function __construct(Nette\Database\Connection $database, $id)
	{
		parent::__construct($database, $id, 'rules');
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