<?php

//example: $values = parse("temperature <= 115");
public function parse($str){
//parses the string
$parsedStmt = sscanf($str,"%s %s %s");

// show types and values
//print_r($parsedStmt);
return($parsedStmt);
}

?>
