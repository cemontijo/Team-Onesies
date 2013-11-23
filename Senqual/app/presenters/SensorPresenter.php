<?php

/**
 * Sensor presenter.
 */
 
 use Nette\Application\UI;
 
class SensorPresenter extends BasePresenter
{
	/** @var Nette\Database\Connection */
	private $database;
	/**
	public function __construct(Nette\Database\Connection $database)
	{
		$this->database = $database;
	}
	**/
	
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
			->setRequired('SN');
			
		$form->addText('type', 'Type:')
			->setRequired('Sensor Type.');
			
		$form->addText('latitude', 'Latitude:')
			->setRequired('y coordinate');
			
		$form->addText('longitude', 'Longitude:')
			->setRequired('x coordinate.');
			
		$form->addText('precAcc', 'Precision/accuracy::')
			->setRequired('precision and accuracy');

		
		
		
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
