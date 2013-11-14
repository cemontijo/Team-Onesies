<?php

use Nette\Application\UI;
use Senqual\Model\User;


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
	}

	public function createComponentSignInForm()
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
	
	public function createComponentNewUserForm()
	{
		$form = new UI\Form;
		
		$form->addText('email', 'Email:')
			->setRequired('Please enter your E-mail.');
		
		$form->addText('name', 'Name:')
			->setRequired('Please enter your username.');

		$form->addText('title', 'Title:')
			->setRequired('Please enter your title.');

		$form->addText('affiliation', 'Affiliation:')
			->setRequired('Please enter your affiliation.');

		$form->addPassword('password', 'Password:')
			->setRequired('Please enter your password.');

		$form->addPassword('rpassword', 'rPassword:')
			->setRequired('Please re-enter your password.');

		$form->addText('phone', 'Phone:');
			//('Please enter your phone number.');

		$form->addCheckbox('remember', 'Keep me signed in');
		$form->addSubmit('send', 'Submit');
		
		// call method newUserFormSucceeded() on success
		$form->onSuccess[] = $this->newUserFormSucceeded;
		return $form;
	}
	
	public function newUserFormSucceeded($form)
	{
		$values = $form->getValues();
		
		$user = User::create($this->database, $this->user->getId());
		
		$user->setEmail($values['email']);
		$user->setPassword($values['password']);
		$user->setName($values['name']);
		$user->setTitle($values['title']);
		$user->setAffiliation($values['affiliation']);
		$user->setPhone($values['phone']);

		$user->save();
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
			$this->redirect('Homepage:');

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
