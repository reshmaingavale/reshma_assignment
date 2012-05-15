<?php
$myFile = "testFile.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "My name is Reshma\n";
fwrite($fh, $stringData);
$stringData = "reshma!!!!! 2\n";
fwrite($fh, $stringData);
fclose($fh);
?>
