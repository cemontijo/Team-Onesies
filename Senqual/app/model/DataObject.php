<?php

class DataObject implements IStoreable
{
	/** @var Nette\Database\Connection */
	protected $database;
	private $table;
	protected $row;
	private $id;
	private $isDeleted;
	
	public function __construct(Nette\Database\Connection $database, $id, $tableName)
	{
		$this->database = $database;
		$this->table = $database->table($tableName);
		$this->id = $id;
		$this->load();
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
			$this->row = $this->createNullRow();
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
			$this->row = $this->table->insert($rowArray);

			// update id
			$this->id = $this->row->id;
		}
		else
		{
			$this->row->update();	
		}	
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

}//DataObject
?>