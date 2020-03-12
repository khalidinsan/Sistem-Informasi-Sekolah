<?php
$dir    = 'c:/xampp/htdocs/ta_/count/a/';
$files1 = scandir($dir);
$files2 = scandir($dir, 1);
foreach ($files1 as $c){

  $file = "a/$c";
  $lines = count(file($file)); 
  $sum += $lines; 
	echo "There are <b>$lines</b> lines in <b>$c</b> <br>"; 
}
echo $sum;
?>
