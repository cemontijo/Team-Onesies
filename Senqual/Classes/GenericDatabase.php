<?php
private class GenericDatabase 
{
	/** @var Nette\Database\Connection */
	private $database;
	private $row, $tableName;
	private $id;
	
	public function __construct(Nette\Database\Connection $db, $ID, $table_name)
	{
		$this->database = $db;
		$this->tableName = $table_name;
		$this->id = $ID;
		load();
	}
	
	public function load()
	{
		if($id > 0)//assume row exists in table
		{
			try{
				$this->row = $this->database->tables($this->tableName)->select($this->id);
			}
			catch(Exception e)
			{//if NOT in table, error
				return false; 
			}
		
		else 
			$this->row = createNullRow();
	}

	private function createNullRow()
	{
		return null;
	}
	
	public function save() 
	{
		if($this->id < 0)//insert row if not already in table
			$this->database->tables($this->tableName)->insert($this->row);	

		else
		{
			try{//assume row is already in table
				$this->database->tables($this->tableName)->update($this->row);	
			}
			catch(Exception e)
			{//error if row is NOT in table 
				return false; }
		}	
	}

	public function delete() 
	{
		$this->database->tables($this->tableName)->delete($this->id);
	}

}//GenericDatabase
?>