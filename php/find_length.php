<html>
<body>
<?php
if(isset($_POST['find'])){

$string1 = $_POST['string1'];
$string2   = $_POST['string2'];
$string1_length =strlen($string1);
$string2_length =strlen($string2);

echo "string1=".$string1_length."<br>";
echo "string2=".$string2_length;
}
?>
<form name="findme" method="post">
String1<input type="text" name="string1">
String2<input type="text" name="string2">
<input type="submit" name="find" value="find">
</form>
</body>
</html>
