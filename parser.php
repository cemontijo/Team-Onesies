<?php

//example: $values = parse("temperature <= 115");
public function parse($str){
//parses the string
$parsedStmt = sscanf($str,"%s %s %s");

//debug
//print_r($parsedStmt);

return($parsedStmt);
}

?>
