<?php
 
foreach($_GET['monitor'] as $key=>$value) {
    mysql_query("UPDATE monitors SET chosen = '$key' WHERE Categoryt_ID ='$value';");
}

?>
