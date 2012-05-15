<?php session_start(); 

$username="reshma"; 
$password="reshma123";
####code to authorise user for this page	
function authenticate() 
{
    header('WWW-Authenticate: Basic realm="Enter Your Login detail to access the page"');
    header('HTTP/1.0 401 Unauthorized');
    echo "You must enter a valid login ID and password to access this resource\n";
    exit;
}

if ($_SERVER['PHP_AUTH_USER']==$username  && $_SERVER['PHP_AUTH_PW']==$password &&$_SESSION['authorized']==1)
{
  		echo "You are logged in"; //do other stuff needed here
} 
else 
{
	$_SESSION['authorized']=1;
    authenticate();		
}
###code for authorization ends here

?>

<a href="access1.php?act=logout">Logout</a><br />
<br />
<a href="access1.php">Go to first page </a>
