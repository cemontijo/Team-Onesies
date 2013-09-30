<?php
class SensorDataRule extends GenericDatabase
{
	//private $id; //unique
	//private $creator;
	//private $DNL;
	//private $dateCreated;
	//private $scope_class, $scope_statement1, $scope_statement2, $scope_string;
	//private $pattern_class, $pattern_premise, $pattern_statement, $pattern_string;

	//private $database;
	
	public function __construct(Nette\Database\Connection $db, $ID)
	{
		//gets rules table
		parent::__construct($db, $ID, 'rules');
	}

	public function getID()
	{
		return $this->row['id'];
	}
	public function getCreator()
	{
		return $this->row['creator'];
	}
	public function getDNL()
	{
		return $this->row['dnl'];
	}
	public function getDateCreated()
	{
		return $this->row['date_created'];
	}
	public function getDateModified()
	{
		return $this->row['date_modified'];
	}
	public function getClass()
	{
		return $this->row['class'];
	}
	public function getScopeStatement1()
	{
		return $this->row['scope_statement1'];
	}
	public function getScopeStatement2()
	{
		return $this->row['scope_statement2'];
	}
	
	public function getRuleString()
	{
		return $this->row['rule_string'];
	}
	public function getScopeString()
	{
		return $this->row['scope_string'];
	}
	public function getPatternString()
	{
		return $this->row['pattern_string'];
	}

	
	public function getPatternPremise()
	{
		return $this->row['pattern_premise'];
	}
	public function getPatternStatement()
	{
		return $this->row['pattern_statement'];
	}

	
	public function setID($nuID)
	{
		$this->row['id'] = $nuID;
	}
	public function setCreator($nuCreator)
	{
		$this->row['creator'] = $nuCreator;
	}
	public function setDNL($nuDNL)
	{
		$this->row['dnl'] = $nuDNL;
	}
	public function setDateModified($nuDateModified)
	{
		$this->row['date_modified'] = $nuDateModified;
	}
	public function setClass($nuClass)
	{
		$this->row['class'] = $nuClass;
	}
	public function setScopeStatement1($nuSS1)
	{
		$this->row['scope_statement1'] = $nuSS1;
	}
	public function setScopeStatement2($nuSS2)
	{
		$this->row['scope_statement2'] = $nuSS2;
	}
	public function setScopeString($nuScopeStr)
	{
		$this->row['scope_string'] = $nuScopeStr;
	}
	public function setPatternString($nuScopeStr)
	{
		$this->row['scope_string'] = $nuScopeStr;
	}


	public function setPatternPremise($nuPatternPremise)
	{
		$this->row['pattern_premise'] = $nuPatternPremise;
	}
	public function setPatternStatement($nuPatternStatement)
	{
		$this->row['pattern_statement'] = $nuPatternStatement;
	}

	
	public function translateScope()
	{
		if($this->row['class'] == "global")
			this->scope_tsring = "For all readings,";

		else if($this->row['class'] == "beforeR")
			this->scope_string = "For all readings before the statement ".this->scope_statement1." becomes true,";

		else if($this->row['class'] == "afterL")
			this->scope_string = "For all readings after the statement ".this->scope_statement1." becomes true,";

		else if($this->row['class'] == "betweenLandR")
			this->scope_string = "For each interval of readings after which the statement ".this->scope_statement1.
								" becomes true and until the statement ".this->scope_statement2." first becomes true,";

		else if($this->row['class'] == "afterLuntilR")
			this->scope_string = "For each interval of readings after which the statement ".this->scope_statement1.
								" becomes true and until the statement ".this->scope_statement2." first becomes true,".
								" or until the end of the readings if ".this->scope_statement2." does not become true";
	}

	public function translatePattern()
	{
		if($this->row['class'] == "absence")
			this->pattern_string = "it is never the case that the statement ".this->pattern_statement.
									" is true within the duration.";

		else if($this->row['class'] == "universality")
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

}//SensorDataRules
?>
