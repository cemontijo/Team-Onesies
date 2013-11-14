<?php

namespace Senqual\Data;
use Nette\Database;

abstract class DataObject implements IDataObject
{
	/** @var Nette\Database\Connection */
	protected $database;
	private $table;
	protected $row;
	private $tableName;
	private $id;
	private $isDeleted;
	private $userId;
	
	protected function __construct(Database\Connection $database, $userId, 
			$id, $tableName)
	{
		$this->database = $database;
		$this->userId = $userId;
		$this->tableName = $tableName;
		$this->table = $database->table($tableName);
		$this->id = $id;
		$this->load();
	}
	
	public static function create(Database\Connection $database, $username)
	{
		$cls = get_called_class();
		return new $cls($database, $username);
	}
	
	public static function get(Database\Connection $database, $id)
	{
		$cls = get_called_class();
		return new $cls($database, null, $id);
	}
	
	public function load()
	{
		if($this->id > 0)
		{
			// throws an error when row with id doesn't exists
			$this->row = $this->table->get($this->id);
		}
		else 
		{
			$this->row = array();
		}
		$this->isDeleted = false;
	}
	
	public function save() 
	{
		if($this->isDeleted) return false;
		
		if($this->id < 0)
		{
			//
			//insert row if not already in table
			//
			
			// if new entry $row is array, else it is a Database\Selection object
			// convert to array
			if ( is_array($this->row) )
			{
				$rowArray = $this->row;
			}
			else 
			{
				$this->row->toArray();
			}
			
			// drop id for insert - retrieve Autoincrement Id from DB
			unset($rowArray['id']);
			
			// set creator and time of creation
			$rowArray['created_by'] = $this->userId;
			$rowArray['created_at'] = date("Y-m-d H:i:s");
			
			// insert row into db
			$this->row = $this->table->insert($rowArray);

			// id of this has to be changed to id of row from db
			$this->id = $this->row->id;
		}
		else
		{
			$this->row->update();	
		}	
		
		return true;
	}

	public function delete() 
	{
		$this->table->delete($this->id);
		$this->isDeleted = true;
	}
	
	public function isDeleted()
	{
		return $this->isDeleted;
	}
	
	public function getId()
	{
		if ( $this->isDeleted ) return -2;
		return $this->id;
	}
	
	public function equals(IDataObject $dataObject)
	{
		return $this->row == $dataObject->getDataRow();
	}
	
	public function getDataRow()
	{
		return $this->row;
	}
	
	public function getTableName()
	{
		return $this->tableName;
	}

}//DataObject
?>