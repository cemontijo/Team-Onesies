<?php

use Nette\Application\UI;


/**
 * Sign in/out presenters.
 */
class LoginPresenter extends BasePresenter
{
	/** @var Nette\Database\Connection */
	private $database;
	
	public function __construct(Nette\Database\Connection $database)
	{
		$this->database = $database;
		//$this->user ->database->table('user_profile') = array();
		//$this-> users = array();
	}

	/**
	 * Sign-in form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm()
	{
		$form = new UI\Form;
		$form->addText('username', 'Username:')
			->setRequired('Please enter your username.');

		$form->addPassword('password', 'Password:')
			->setRequired('Please enter your password.');

		$form->addCheckbox('remember', 'Keep me signed in');

		$form->addSubmit('send', 'Sign in');

		// call method signInFormSucceeded() on success
		$form->onSuccess[] = $this->signInFormSucceeded;
		return $form;
	}
	
	protected function createComponentNewUserForm()
	{
		$form = new UI\Form;
		$form->addText('username', 'Username:')
			->setRequired('Please enter your username.');

		$form->addText('title', 'Title:')
			->setRequired('Please enter your title.');
			
		$form->addText('affiliation', 'Affiliation:')
			->setRequired('Please enter your affiliation.');
			
		$form->addText('email', 'Email:')
			->setRequired('Please enter your E-mail.');
			
		$form->addPassword('password', 'Password:')
			->setRequired('Please enter your password.');
			
		$form->addPassword('rpassword', 'rPassword:')
			->setRequired('Please re-enter your password.');

		$form->addText('phone', 'Phone:');
			//('Please enter your phone number.');
		
		
		$form->addCheckbox('remember', 'Keep me signed in');
		$form->addSubmit('send', 'Submit');

		// call method signInFormSucceeded() on success
		$form->onSuccess[] = $this->newUserFormSucceeded;
		return $form;
	}

	public function newUserFormSucceeded($form)
	{
		$values = $form->getValues();

		$arrayValues = array(
			'email' => $values['email'],
			'name' => $values['username'],
			'title' => $values['title'],
			'affiliation' => $values['affiliation'],
			'password' => $values['password'],
			'phone' => $values['phone'],
			);

		//Stores new profile in DB
		$this->database->table('user_profile')->insert($arrayValues);
		$this->database->table('user')->insert(array(
			'username' => $values['email'],
			'password' => $values['password'],
			'role' => 1
		));
	}
	
	public function signInFormSucceeded($form)
	{
		$values = $form->getValues();

		if ($values->remember) {
			$this->getUser()->setExpiration('14 days', FALSE);
		} else {
			$this->getUser()->setExpiration('20 minutes', TRUE);
		}

		try {
			$this->getUser()->login($values->username, $values->password);
			$this->redirect('Sensor:');

		} catch (Nette\Security\AuthenticationException $e) {
			$form->addError($e->getMessage());
		}
	}


	public function actionDenied()
	{
		$this->flashMessage('Login required.', 'error');
		$this->redirect('Login:');
	}
	
	public function actionOut()
	{
		$this->getUser()->logout();
		$this->flashMessage('You have been signed out.', 'success');
		$this->redirect('Login:');
	}

}
