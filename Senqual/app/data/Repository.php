<?php

namespace Senqual\Data;

use Nette\Database;
use Nette;

abstract class Repository implements IStoreable
{
	/** @var Nette\Database\Connection */
	private $database;
	private $table;
	private $tableName;
	private $className;
	private $relation;
	private $dataObjectList;
	private $idName;
	
	public function __construct(Database\Connection $database, $tableName,
		$className, $idName = NULL, IDataObject $relation = NULL)
	{
		$this->database = $database;
		$this->tableName = $tableName;
		$this->table = $database->table($tableName);
		$this->className = $className;
		$this->relation = $relation;
		$this->idName = $idName;
		
		$this->load();
	}
	
	public function load()
	{
		$this->dataObjectList = array();
		
		// fetch data from table depending on relation
		if ( $this->isRelation() )
		{
			$table = $this->table->where(
				$this->getRelationIdName(), $this->relation->getId());
		}
		else
		{
			$table = $this->table;
		}
		
		foreach($table as $row)
		{
			$dataObject = call_user_func($this->className.'::get', $this->database, 
					$row[$this->getIdName()]);
			$observableDataObject = new ObservableDataObject($dataObject);
			array_push($this->dataObjectList, $observableDataObject);
		}
	}
	
	public function save()
	{
		foreach ($this->dataObjectList as $observableDataObject)
		{
			$dataObject = $observableDataObject->getDataObject();
			
			if ( $observableDataObject->getStatus() == ObservableDataObject::REMOVE)
			{
				if ( $this->isRelation() )
				{
					$row = $this->table->where(
							$this->getRelationIdName()."=? AND ".$this->getIdName()."=?",
							$this->relation->getId(), $dataObject->getId());
					$row->delete();
				}
				else
				{
					$dataObject->delete();
				}
			}
			else if ( $observableDataObject->getStatus() == ObservableDataObject::ADD)
			{
				if ( $this->isRelation() )
				{
					$this->table->insert(array(
							$this->getRelationIdName()=>$this->relation->getId(),
							$this->getIdName()=>$dataObject->getId()));					
				}
				else
				{
					$dataObject->save();
				}
			}
			else 
			{
				$dataObject->save();
			}
		}
	}
	
	public function getAll()
	{
		$allList = array();
		foreach ($this->dataObjectList as $observableDataObject)
		{
			if ( $observableDataObject->getStatus() != ObservableDataObject::REMOVE )
				array_push($allList, $observableDataObject->getDataObject());
		}
		return $allList;
	}
	
	public function add(IDataObject $dataObject)
	{
		$index = $this->exists($dataObject);
		if ( $index >= 0 )
		{
			$observableDataObject = $this->dataObjectList[$index];
			if ( $observableDataObject->getStatus() == ObservableDataObject::REMOVE )
				$observableDataObject->setStatus(ObservableDataObject::UNCHANGED);
		}
		else
		{
			array_push($this->dataObjectList, 
				new ObservableDataObject($dataObject, ObservableDataObject::ADD));
		}
	}
	
	public function remove(IDataObject $dataObject)
	{
		$index = $this->exists($dataObject);
		
		if ( $index >= 0 )
		{
			$observableDataObject = $this->dataObjectList[$index];
			if ( $observableDataObject->getStatus() == ObservableDataObject::ADD )
			{
				unset($this->dataObjectList[$index]);
			}
			else 
			{
				$observableDataObject->setStatus(ObservableDataObject::REMOVE);
			}
			return true;
		}

		return false;
	}
	
	public function exists(IDataObject $dataObject)
	{
		for($i=0; $i<count($this->dataObjectList); $i++)
		{
			$observableDataObject = $this->dataObjectList[$i];
			$listObject = $observableDataObject->getDataObject();
			
			if ( $dataObject === $listObject ) return $i;
			
			if ( $dataObject->getId() == $listObject->getId() &&
				$dataObject->getId() > 0 ) return $i;
		}
		return -1;
	}
		
	private function getIdName()
	{
		if ( $this->isRelation() ) return $this->idName;
		return "id";
	}
	
	public function isRelation()
	{
		return isset($this->relation);
	}
	
	private function getRelationIdName()
	{
		return substr($this->relation->getTableName(), 0, -1)."_id";
	}

}//Repository
?>