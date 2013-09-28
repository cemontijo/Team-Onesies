<?php

/**
 * Profile presenter.
 */
class ProfilePresenter extends BasePresenter
{
	/** @var Nette\Database\Connection */
	private $database;
	
	public function __construct(Nette\Database\Connection $database)
	{
		$this->database = $database;
	}

	public function renderDefault()
	{
		$this->template->users = $this->database->table('user_profile');
	}

}
