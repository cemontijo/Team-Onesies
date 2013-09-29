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
	
	public function actionDeleteRule($id)
	{
		$splits = explode("&", $id);
		$ruleId = $splits[0];
		$monitorId = $splits[1];
		
		$this->database->table("monitor_rules")->where("rule_id=? AND monitor_id=?",$ruleId, $monitorId)->delete();
		$this->flashMessage("deleted");
		$this->redirect("Monitor:");
	}
	
	public function actionAddRule($id)
	{
		$splits = explode("&", $id);
		$ruleId = $splits[0];
		$monitorId = $splits[1];
	
		try {
			$this->database->exec('INSERT INTO monitor_rules',
					array("rule_id" => $ruleId, "monitor_id" => $monitorId));
		} catch (Exception $e) {
			$this->flashMessage("Entry already exists!");
		}
		$this->redirect("Monitor:");
	}
	
	protected function createComponentMonitorForm()
	{
		$form = new Nette\Application\UI\Form;
		$form->addText('modifiedId', 'Identifier (Name):')
		->setRequired();
		$form->addHidden('monitorId', -1);
	
		$form->addSubmit('create', 'Create');
		$form->onSuccess[] = $this->monitorFormSucceeded;
		 
		return $form;
	}
	
	public function monitorFormSucceeded(Nette\Application\UI\Form $form)
	{
		if (!$this->user->isLoggedIn()) {
			$this->error('You need to log in to create or edit posts');
		}
	
		$values = $form->getValues();
		$modifiedId = $values[0];
		$monitorId = $values[1];
	
		if ($monitorId>0) {
			$monitor = $this->database->table('monitors')->get($monitorId);
			$monitor->update($modifiedId);
		} else {
			$monitor = $this->database->table('monitors')->insert($modifiedId);
		}
	
		$this->flashMessage('Monitor was published', 'success');
		$this->redirect('Monitor:');
	}
	
	public function actionCreate()
	{
		if (!$this->user->isLoggedIn()) {
			$this->redirect('Login:');
		}
	}
	
	public function actionEdit($id)
	{
		if (!$this->user->isLoggedIn()) {
			$this->redirect('Login:');
		}
	
		$post = $this->database->table('monitors')->get($id);
		if (!$post) {
			$this->error('Monitor not found');
		}
		$this['monitorForm']->setDefaults(array($id,$id));
	}
	
	public function renderDefault()
	{
		if ( !$this->getUser()->isLoggedIn() ) $this->redirect('Login:');
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
