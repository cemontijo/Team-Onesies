<?php
public function ($str){
//parses the string
$parsedStmt = sscanf($str,"%s %s %s");

// show types and values
//print_r($parsedStmt);
return($parsedStmt);
}

?>
