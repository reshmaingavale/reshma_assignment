<?php session_start(); 

if($_GET['act']=='logout')
	session_destroy();

?>

<a href="access2.php">Click here to go to the second page
</a>
