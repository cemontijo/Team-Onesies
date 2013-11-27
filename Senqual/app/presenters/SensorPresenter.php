<?php

/**
 * Sensor presenter.
 */
 
 use Nette\Application\UI;
 
class SensorPresenter extends BasePresenter
{
	/** @var Nette\Database\Connection */
private $database;
	
	public function __construct(Nette\Database\Connection $database)
	{
		$this->database = $database;
		//$this->user ->database->table('user_profile') = array();
		//$this-> users = array();
	}
	
	public function renderDefault()
	{/**
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
	**/
	}
	
	
	protected function createComponentSensorForm()
	{
		$form = new UI\Form;
		$form->addText('identifier', 'Identifier:')
			->setRequired('ID');

		$form->addText('serialNo', 'Serial Number:')
			->setRequired('Serial Number');
			
		$form->addText('type', 'Type:')
			->setRequired('Sensor Type');
			
		$form->addText('location', 'Location:')
			->setRequired('Location');
			
		$form->addText('latitude', 'Latitude:')
			->setRequired('Latitude');
			
		$form->addText('longitude', 'Longitude:')
			->setRequired('Longitude');
			
		$form->addText('precAcc', 'Precision/accuracy:')
			->setRequired('Precision/accuracy');

		$form->addText('fields', 'Fields:')
			->setRequired('Fields');
					
		
		$form->addSubmit('send', 'Submit');

		// call method signInFormSucceeded() on success
		$form->onSuccess[] = $this->sensorFormSucceeded;
		return $form;
	}
	
	
	
	
	public function sensorFormSucceeded($form)
	{
		$values = $form->getValues();

		$arrayValues = array(
			'identifier' => $values['identifier'],
			'SN' => $values['serialNo'],
			'Type' => $values['type'],
			'Location' => $values['location'],
			'Latitude' => $values['latitude'],
			'Longitude' => $values['longitude'],
			'PrecAccur' => $values['precAcc'],
		);
		
		/*
		//Stores new profile in DB
		$this->database->table('user_profile')->insert($arrayValues);
		$this->database->table('user')->insert(array(
			'username' => $values['email'],
			'password' => $values['password'],
			'role' => 1
		));
		*/
	}

}
