<?php
//
//File not used. If you have need connection by socket, you can use this code, with Ajax, method post (adress, port, fileToSaveData)
//Return response or code error
//
$address = $_POST["address"];
$port = $_POST["port"];
$save = $_POST["save"];
if($fp = @fsockopen($address, $port, $errno, $errstr, 2)) {
	$handle = fopen($save, "a+");
	$request = $_POST["request"];

	fwrite($fp, "$request\n");
	$log =  fread($fp, 26);

	fwrite($handle, "$log\r\n");
	$log = ($log);

	echo $log;
	
	fclose($fp);
	fclose($handle);
}
else {
	echo "$errno";
}
?>