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
		$monitors = new Senqual\Model\MonitorRepository($this->database);
		$rules = new Senqual\Model\RulesRepository($this->database);
		
		$this->template->monitors = $monitors->getAll();
		$this->template->rules = $rules->getAll();
	}
	
	public function actionAddRule($id, $monitorId)
	{	
		$rule = Senqual\Model\Rule::get($this->database, $id);
		$monitor = Senqual\Model\Monitor::get($this->database, $monitorId);
		
		$monitor->addRule($rule);
		$monitor->save();
		
		$this->redirect("Monitor:");
	}
	
	public function actionRemoveRule($id, $monitorId)
	{
		$rule = Senqual\Model\Rule::get($this->database, $id);
		$monitor = Senqual\Model\Monitor::get($this->database, $monitorId);
		
		if ( $monitor->removeRule($rule) )
		{
			$monitor->save();
		}

		$this->flashMessage("Couldn't delete!");
		
		
		//$this->redirect("Monitor:");
	}

}
