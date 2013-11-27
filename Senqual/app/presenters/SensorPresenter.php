<?php

/**
 * Sensor presenter.
 */
 
 use Nette\Application\UI;
 
class SensorPresenter extends BasePresenter
{
	/** @var Nette\Database\Connection */
	//private $sensorDatabase;
	//private $fieldsDatabase;

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
		//$this->sensorDatabase = $database;
		//$this->fieldsDatabase = $database;
		//$this->user ->database->table('user_profile') = array();
		//$this-> users = array();
	}
	
	public function renderDefault()
	{

		$this->template->sensors = $this->database->table('sensors');

	}
	
	protected function createComponentEditSensorForm()
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

		$form->addText('fields', 'Fields:');
			//->setRequired('Fields');
		
		$form->addText('measure', 'Measure:');
			//->setRequired('Measure');
			
					
		
		$form->addSubmit('send', 'Submit');
		//call method signInFormSucceeded() on success

		$form->onSuccess[] = $this->editSensorFormSucceeded;
		return $form;
	}
	
	
	public function editSensorFormSucceeded($form)
	{
		if (!$this->user->isLoggedIn()) {
			$this->redirect("Login:");
		}
	
		$values = $form->getValues();

		$sensor = $this->database->table('sensors')->where('identifier', "aaa");
		$sensor->update($values);
		
		/*
		$id = $this->sensors->getId();
		$email = $this->database->table('sensors')->get($id)->username;
	
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
*/


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
		
		$form->addText('measure', 'Measure:');
			//->setRequired('Measure');
			
					
		
		$form->addSubmit('send', 'Submit');

		//call method signInFormSucceeded() on success
		$form->onSuccess[] = $this->sensorFormSucceeded;
		return $form;
	}
	
	
	
	
	public function sensorFormSucceeded($form)
	{
		$values = $form->getValues();

		$arrayValues = array(
			'identifier' => $values['identifier'],
			'serial_number' => $values['serialNo'],
			'type' => $values['type'],
			'location' => $values['location'],
			'latitude' => $values['latitude'],
			'longitude' => $values['longitude'],
			'accuracy' => $values['precAcc'],
			//'creator' => "testName",
		);
		
		$arrayValues2 = array(
			'field_name' => "test2",
			'unit_measure' => "test2",
			'sensor_id' => $values['identifier'],
		);
		
		$this->database->table('sensors')->insert($arrayValues);
		$this->database->table('sensor_fields')->insert($arrayValues2);
		$this->flashMessage('Record Created', 'success');

	}

}
