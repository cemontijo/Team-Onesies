<?php

/**
 * Monitor presenter.
 */
class MonitorPresenter extends BasePresenter
{
	/** @var Nette\Database\Connection */
	private $database;
	
	public function __construct(Nette\Database\Connection $database)
	{
		$this->database = $database;
	}
	
	
	public function renderDefault()
	{
		$monitors = $this->database->table('monitors');
		if (!$monitors) {
			$this->error('No monitors found');
		}
		
		$rules = $this->database->table('rules');
		if (!$rules) {
			$this->error('No monitors found');
		}
		$this->template->monitors = $monitors;
		$this->template->rules = $rules;
	}

}
