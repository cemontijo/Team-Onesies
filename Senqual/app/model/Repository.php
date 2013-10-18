<?php

abstract class Repository implements IStoreable
{
	/** @var Nette\Database\Connection */
	private $database;
	private $table;
	private $className;
	private $param;
	private $dataObjectList;
	
	public function __construct(Nette\Database\Connection $database, $tableName,
		$className, QueryParameter $param = NULL)
	{
		$this->database = $database;
		$this->table = $database->table($tableName);
		$this->className = $className;
		$this->param = $param;
	}
	
	public function load()
	{
		$this->dataObjectList = array();
		
		// fetch data from table depending on param
		if ( isset($this->param) )
		{
			$table = $this->table->where(
				$this->param->getName(), $this->param->getValue());
		}
		else
		{
			$table = $this->table;
		}
		
		foreach($table as $row)
		{
			$dataObject = new $this->className($this->database, $row->id);
			$observableDataObject = new ObservableDataObject($dataObject);
			array_push($this->dataObjectList, $observableDataObject);
		}
	}
	
	public function getAll()
	{
		$allList = array();
		foreach ($this->dataObjectList as $observableDataObject)
		{
			array_push($allList, $observableDataObject->getDataObject());
		}
	}

}//Repository
?>