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
	private $values;
	
	public function __construct(Nette\Database\Connection $database)
	{
		$this->database = $database;
		//$this->user ->database->table('user_profile') = array();
		//$this-> users = array();
	}
	
	protected function createComponentProfileForm()
	{
		$form = new Nette\Application\UI\Form;
		
		$form->addText('email', 'Email (Username):')
			->setRequired();

		$form->addText('name', 'Your Name:')
			->setRequired();
		
		$form->addText('title', 'Title:');
		$form->addText('affiliation', 'Affiliation:');
		$form->addPassword('password', 'Password:')
			->setRequired();

		$form->addText('phone', 'Phone:');
		
		$form->addSubmit('submit', 'test');
		
		$form->onSuccess[] = $this->profileFormSucceeded;

		return $form;
	}
	
	public function profileFormSucceeded(Nette\Application\UI\Form $form)
	{
		if (!$this->user->isLoggedIn()) {
			$this->redirect("Login:");
		}
	
		$values = $form->getValues();
		$id = $this->user->getId();
		$email = $this->database->table('user')->get($id)->username;
	
		if ($email) {
			$user = $this->database->table('user_profile')->where('email', $email);
			$user->update($values);
			$this->database->exec("UPDATE user SET username=?, password=? WHERE id=?", 
					$values['email'], $values['password'], $id);
		} else {
			$user = $this->database->table('user_profile')->insert($values);
		}
	
		$this->flashMessage('User created', 'success');
		$this->redirect('Profile:edit');
	}
	
	public function actionEdit()
	{
		if (!$this->user->isLoggedIn()) {
			$this->redirect('Login:');
		}
	
		$id = $this->user->getId();
		$email = $this->database->table('user')->get($id)->username;
		$user = $this->database->table('user_profile')->where('email', $email)->fetch();
		if (!$user) {
			$this->error('User not found');
		}
		$this['profileForm']->setDefaults(array(
			'email' => $user->email,
			'name' => $user->name,
			'title' => $user->title,
			'affiliation' => $user->affiliation,
			'password' => $user->password,
			'phone' => $user->phone
		));
	}
}


