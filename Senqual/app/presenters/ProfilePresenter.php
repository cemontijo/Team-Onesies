<?php

/**
 * Profile presenter.
 */
class ProfilePresenter extends BasePresenter
{
	/** @var Nette\Database\Connection */
	private $database;
	private $name;
	private $title;
	private $email;
	private $password;
	private $phone;
	
	
	public function __construct(Nette\Database\Connection $database)
	{
		$this->database = $database;
	}

	public function renderDefault()
	{
		$this->template->profile = $this->database->table('user_profile');
		$test=$this->database->table('user_profile');
		
		
	}
	public function setName($name)
	{
		
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


