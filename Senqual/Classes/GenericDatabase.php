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
				$row = $database->tables($tableName).select($id);
			}
			catch(Exception e)
			{//if NOT in table, error
				return false; 
			}
		
		else 
			$row = createNullRow();
	}

	private function createNullRow()
	{
		

	}
	
	public function save() 
	{
		if($id < 0)//insert row if not already in table
			$database->tables($tableName).insert($row);	

		else
		{
			try{//assume row is already in table
				$database->tables($tableName).update($row);	
			}
			catch(Exception e)
			{//error if row is NOT in table 
				return false; }
		}	
	}

	public function delete() 
	{
		$database->tables($tableName).delete($id);
	}

}//GenericDatabase
?>