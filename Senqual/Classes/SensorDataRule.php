<?php
class SensorDataRule extends GenericDatabase
{
	public function __construct(Nette\Database\Connection $db, $ID)
	{
		//gets rules table
		parent::__construct($db, $ID, 'rules');
	}

	public function getID(){
		return $this->row['id'];
	}

	public function getCreator(){
		return $this->row['creator'];
	}

	public function getDNL(){
		return $this->row['dnl'];
	}

	public function getDateCreated(){
		return $this->row['date_created'];
	}

	public function getDateModified(){
		return $this->row['date_modified'];
	}

	public function getClass(){
		return $this->row['class'];
	}

	public function getScopeStatement1(){
		return $this->row['scope_statement1'];
	}

	public function getScopeStatement2(){
		return $this->row['scope_statement2'];
	}
	
	public function getRuleString(){
		return $this->row['rule_string'];
	}

	public function getScopeString(){
		return $this->row['scope_string'];
	}

	public function getPatternString(){
		return $this->row['pattern_string'];
	}

	public function getPatternPremise(){
		return $this->row['pattern_premise'];
	}

	public function getPatternStatement(){
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
	
	public function setScopeString()
	{
		if(getClass() == "global")
			$this->row['scope_string'] = "For all readings,";

		else if(getClass() == "beforeR")
			$this->row['scope_string'] = "For all readings before the statement ".getScopeStatement1()." becomes true,";

		else if(getClass() == "afterL")
			$this->row['scope_string'] = "For all readings after the statement ".getScopeStatement1()." becomes true,";

		else if(getClass() == "betweenLandR")
			$this->row['scope_string'] = "For each interval of readings after which the statement ".getScopeStatement1().
								" becomes true and until the statement ".getScopeStatement2()." first becomes true,";

		else if(getClass() == "afterLuntilR")
			$this->row['scope_string'] = "For each interval of readings after which the statement ".getScopeStatement1().
								" becomes true and until the statement ".getScopeStatement2()." first becomes true,".
								" or until the end of the readings if ".getScopeStatement2()." does not become true";
	}

	public function setPatternString()
	{
		if(getClass() == "absence")
			$this->row['pattern_string'] = "it is never the case that the statement ".getPatternStatement().
									" is true within the duration.";

		else if(getClass() == "universality")
			$this->row['pattern_string'] = "it is always the case that the statement ".getPatternStatement().
									" is true within the duration.";

		else if(getClass() == "existence")
			$this->row['pattern_string'] = "there is at least one reading in which the statement ".getPatternStatement().
									" is true within the duration.";

		else if(getClass() == "response")
			$this->row['pattern_string'] = "every reading where the statement ".getPatternPremise().
									" is true within the duration, is followed immediately by a reading where ".
									"the statement ".getPatternStatement()." is true within the duration.";
	}
	
	public function setRuleString()
	{
		//combines scope string and rule string
		$this->row['rule_string'] = getScopeString() . getPatternString();
	}


	public function setPatternPremise($nuPatternPremise)
	{
		$this->row['pattern_premise'] = $nuPatternPremise;
	}
	public function setPatternStatement($nuPatternStatement)
	{
		$this->row['pattern_statement'] = $nuPatternStatement;
	}

}//SensorDataRule
?>