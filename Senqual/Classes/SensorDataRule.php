<?php
class SensorDataRule extends GenericDatabase
{
	//private $ruleID; //unique
	//private $creator;
	//private $DNL;
	//private $dateCreated;

	//private $scope_class, $scope_statement1, $scope_statement2, $scope_string;
	//private $pattern_class, $pattern_premise, $pattern_statement, $pattern_string;

	/** @var Nette\Database\Connection */
	private $database;
	
	public function __construct(Nette\Database\Connection $db, $ID)
	{
		//gets rules table
		parent::__construct($db, $ID, 'rules');
	}

	public function getID()
	{
		return $row['id'];
	}
	public function getCreator()
	{
		return $row['creator'];
	}
	public function getDNL()
	{
		return $row['dnl'];
	}
	public function getDateCreated()
	{
		return $row['date_created'];
	}
	public function getDateModified()
	{
		return $row['date_modified'];
	}
	public function getClass()
	{
		return $row['class'];
	}
	public function getScopeStatement1()
	{
		return $row['scope_statement1'];
	}
	public function getScopeStatement2()
	{
		return $row['scope_statement2'];
	}
	public function getScopeString()
	{
		return $row['scope_string'];
	}
	public function getPatternPremise()
	{
		return $row['pattern_premise'];
	}
	public function getPatternStatement()
	{
		return $row['pattern_statement'];
	}



	public function setID($nuID)
	{
		$row['id'] = $nuID;
	}

	public function setCreator($nuCreator)
	{
		$row['creator'] = $nuCreator;
	}

	

	
	public function translateScope()
	{
		if(this->scope_class == "global")
			this->scope_tsring = "For all readings,";

		else if(this->scope_class == "beforeR")
			this->scope_string = "For all readings before the statement ".this->scope_statement1." becomes true,";

		else if(this->scope_class == "afterL")
			this->scope_string = "For all readings after the statement ".this->scope_statement1." becomes true,";

		else if(this->scope_class == "betweenLandR")
			this->scope_string = "For each interval of readings after which the statement ".this->scope_statement1.
								" becomes true and until the statement ".this->scope_statement2." first becomes true,";

		else if(this->scope_class == "afterLuntilR")
			this->scope_string = "For each interval of readings after which the statement ".this->scope_statement1.
								" becomes true and until the statement ".this->scope_statement2." first becomes true,".
								" or until the end of the readings if ".this->scope_statement2." does not become true";
	}

	public function translatePattern()
	{
		if(this->pattern_class == "absence")
			this->pattern_string = "it is never the case that the statement ".this->pattern_statement.
									" is true within the duration.";

		else if(this->pattern_class == "universality")
			this->pattern_string = "it is always the case that the statement ".this->pattern_statement.
									" is true within the duration.";

		else if(this->pattern_class == "existence")
			this->pattern_string = "there is at least one reading in which the statement ".this->pattern_statement.
									" is true within the duration.";

		else if(this->pattern_class == "response")
			this->pattern_string = "every reading where the statement ".this->pattern_premise.
									" is true within the duration, is followed immediately by a reading where ".
									"the statement ".this->pattern_statement." is true within the duration.";
	}

	public function __toString()
	{
		$display = $this->playlistName;//." (untyped)"; 
		return (string) $display;
	}

	public function displayPlaylist(){
		echo "<br><br>======================================================";
		echo "<br>".$this->playlistName."<br>";
		echo "======================================================";
		for($size=count($this->playlist),$i = 0; $i<$size; $i++)
		{
			echo "<br>Index: ".$i;			
			echo $this->playlist[$i];//->__toString();//playlist.get(i).toString();
		}
		echo "<br>======================================================";
	}

}//SensorDataRules
?>