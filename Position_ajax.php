<?php
/*
Input : Bus Number (example : "C1")
Action : read file TestBench/<BusNumber>.txt or read file on FTP <BusNumber>.txt or used socket
Output : Long, LatLng
TODO : When you protocol will be determined, you will have not need switch.
*/
header('Content-type: application/json');	//Format file JSON
$log="";
include_once("config.php");
if(isset($_POST["numero_bus"])) {
	$numero_Bus = $_POST["numero_bus"];

//Just to used differently of communication	
switch (MODE_COMM) {
    case "testbench":
        $log =  file_get_contents("TestBench/$numero_Bus.txt"); //By local file
        break;
    case "ftp":
        include("ftp.php") ;	//By FTP
        break;
    case "socket":
        $log = "{information : 'SocketNoImplemented'}" ; //By socket. No try
        break;
    default:
       $log = "{information : 'NoMode'}" ;
}
}
else {
	$log = "{information : 'NoPost'}" ;
}
echo $log;
?>