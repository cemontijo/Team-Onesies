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
		$form->addText('name', 'Identifier (Name):')
		->setRequired();
		$form->addHidden('id', -1);
	
		$form->addSubmit('save', 'Save');
		$form->onSuccess[] = $this->monitorFormSucceeded;
		 
		return $form;
	}
	
	public function monitorFormSucceeded(Nette\Application\UI\Form $form)
	{
		if (!$this->user->isLoggedIn()) {
			$this->error('You need to log in to create or edit posts');
		}
	
		$values = $form->getValues();
		$id = $values['id'];
		$name = $values['name'];
	
		if ($id>0) {
			$this->database->exec('UPDATE monitors SET name=? WHERE id=?', $name, $id);
		} else {
			try {
				$this->database->exec('INSERT INTO monitors',
						array("name" => $name));
			} catch (Exception $e) {
				$this->flashMessage("Entry already exists!");
			}
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
	
	public function actionRename($id)
	{
		if (!$this->user->isLoggedIn()) {
			$this->redirect('Login:');
		}
	
		$monitor = $this->database->table('monitors')->get($id);
		if (!$monitor) {
			$this->error('Monitor not found');
		}
		$this['monitorForm']->setDefaults(array('id'=>$id,'name'=>$monitor->name));
	}
	
	public function renderDefault()
	{
		if ( !$this->getUser()->isLoggedIn() ){ $this->redirect('Login/denied');}
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
