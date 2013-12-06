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
		$this->template->testR = $this->database->table('rules');		
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
