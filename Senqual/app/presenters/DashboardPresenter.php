<?php

/**
 * Profile presenter.
 */
class DashboardPresenter extends BasePresenter
{
	/** @var Nette\Database\Connection */
	private $database;
	private $name;
	private $title;
	private $email;
	private $password;
	private $phone;
	private $values;
	
	public function __construct(Nette\Database\Connection $database)
	{
		$this->database = $database;
		//$this->user ->database->table('user_profile') = array();
		//$this-> users = array();
	}
	/*
	public function load($id){
		$ruleRow = $database->tables('user_profile').select($id);
		$scope_class = $ruleRow('scope_class');
		$scope_statement1 = $ruleRow('scope_statement1');
		$scope_class = $ruleRow('scope_class');
		$scope_class = $ruleRow('scope_class');
		$scope_class = $ruleRow('scope_class');
		$scope_class = $ruleRow('scope_class');
		$scope_class = $ruleRow('scope_class');
		$scope_class = $ruleRow('scope_class');
		$scope_class = $ruleRow('scope_class');
	}
	*/

	public function renderDefault()
	{
		$this->template->data = $this->database->table('data');
<<<<<<< HEAD
		$this->template->testR = $this->database->table('rules');
=======
		$this->template->testR = $this->database->table('ruleTest');
		$this->template->rules = $this->database->table('rules');
>>>>>>> 131f15c6482ba025388a47ed20498342e8d71b47
		
		
		
	}
	public function editValues()
	{
		
	}
	public function handleUpdateData()
	{
		$id = $this->getParam('id');
		$fields = (array) $this->getParam('user_profile');
		$tableName = $this->getParam('user_profile');
		$row = $this->database->update($tableName, $fields, $id);
		
		
		
		//$control->getComponent('name')->render();
		//echo $contol;

	}



}
