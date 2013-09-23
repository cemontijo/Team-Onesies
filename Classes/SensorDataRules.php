<?php
class SensorDataRule 
{
	private $duration; 
	private $definition;
	
	private $ruleID; //unique
	private $creator;
	private $dateCreated;

	private $scope_class, $scope_statement1, $scope_statement2, $scope_string;
	private $pattern_class, $pattern_premise, $pattern_statement, $pattern_string;


	public function __construct($pName) {
		$this->playlistName = $pName;
		$this->playlist = array();
	}

	public function setDuration($nuDuration)
	{
		$this->duration = $nuDuration;
	}

	public function setDefinition($nuDef)
	{
		$this->definition = $nuDef;
	}

	public function setUser($nuCreator)
	{
		$this->creator = $nuCreator; 
	}
	
	public function add($mediaFile) 
	{//Adds object to the end of the playlist
	
		//array_push($this->playlist, $mediaFile);
		$this->playlist[] = $mediaFile;
	}

	public function delete($deleteInd) 
	{
		unset($this->playlist[$deleteInd]);
		
		//re-indexes playlist
		$this->playlist = array_values($this->playlist);
	}

	
	public function translateScope()
	{
		if(this->scope_class == "global")
			this->scope_string = "For all readings,";

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
