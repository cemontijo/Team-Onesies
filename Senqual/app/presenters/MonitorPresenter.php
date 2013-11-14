<?php

use Senqual\Model\Monitor;

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
		if (!$this->user->isLoggedIn()) {
			$this->redirect('Login:');
		}
		
		$monitors = new Senqual\Model\MonitorRepository($this->database);
		$rules = new Senqual\Model\RulesRepository($this->database);
		
		$this->template->monitors = $monitors->getAll();
		$this->template->rules = $rules->getAll();
	}
	
	public function actionAddRule($id, $monitorId)
	{	
		if (!$this->user->isLoggedIn()) {
			$this->redirect('Login:');
		}
		
		$rule = Senqual\Model\Rule::get($this->database, $id);
		$monitor = Senqual\Model\Monitor::get($this->database, $monitorId);
		
		$monitor->addRule($rule);
		$monitor->save();
		
		$this->flashMessage("Rule has been added!");
		
		$user = Senqual\Model\User::create($this->database, 0);
		$user->setUsername("admin");
		$user->setPassword("admin");
		$user->setName("Administrator");
		$user->save();
		
		$this->redirect("Monitor:");
	}
	
	public function actionRemoveRule($id, $monitorId)
	{
		if (!$this->user->isLoggedIn()) {
			$this->redirect('Login:');
		}
		
		$rule = Senqual\Model\Rule::get($this->database, $id);
		$monitor = Senqual\Model\Monitor::get($this->database, $monitorId);
		
		if ( $monitor->removeRule($rule) )
		{
			$monitor->save();
			$this->flashMessage("Rule has been removed!");
		}
		else 
		{
			$this->flashMessage("Error: Was not able to remove Rule!");
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
			$this->redirect('Login:');
		}
	
		$values = $form->getValues();
		$id = $values['id'];
		$name = $values['name'];
	
		// new Entry?
		if ( $id < 0 )
		{
			$monitor = Monitor::create($this->database, $this->user->getId());
			$this->flashMessage('Monitor has been created', 'success');
		}
		else 
		{
			$monitor = Monitor::get($this->database, $id);
			$this->flashMessage('Monitor has been renamed', 'success');
		}
		
		// update entry
		$monitor->setName($name);
		$monitor->save();
	
		$this->redirect('Monitor:');
	}

}
