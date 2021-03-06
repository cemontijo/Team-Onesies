<?php

/**
 * Rules presenter.
 */
 use Nette\Application\UI;
 
class RulesPresenter extends BasePresenter
{
	/** @var Nette\Database\Connection */
	private $database;
	
	public function __construct(Nette\Database\Connection $database)
	{
		$this->database = $database;
	}
	
	public function renderDefault()
	{
		if ( !$this->getUser()->isLoggedIn() )
			$this->redirect('Login:');
			
		$this->template->sensors = $this->database->table('sensors');


		$rules = $this->database->table('rules');
		if (!$rules)
			$this->error('No rules found');
		
		$sensorFields = $this->database->table('sensor_fields');
		if (!$sensorFields)
			$this->error('No sensor fields found');
		
		$this->template->rules = $rules;
		$this->template->fields = $sensorFields;
	}

}
