<?php
/*
Ce fichier est à modifier en fonction du protocole qui sera choisi
Elle devra soit être appelé par une tâche cron toutes les minutes, ou bien appelé dans la fonction Position_ajax.php

Ce fichier
1-Se connecte au FTP
2-Liste les fichiers sur le FTP et copie chaque fichier dans le répertoir local (/log)
3-Concatène les fichiers dans 'mylog.txt'
*/

    // connection settings
    $ftp_server = SERVER_FTP;  //address of ftp server (leave out ftp://)
    $ftp_user_name = NAME_FTP; // Username
    $ftp_user_pass = PASS_FTP;   // Password
	
	$log = "[";
	
	if(($conn_id = ftp_connect($ftp_server, 21)) == false)
	{
		echo 'Erreur de connexion...';
	}
	ftp_pasv($conn_id, true);
	
    // login with username and password, or give invalid user message
    $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass) or die("<h1>You do not have access to this ftp server!</h1>");
	
	$liste_fichiers = ftp_nlist($conn_id, '.');
	//Files list & copy
	//If you want delete files on FTP, de-coment line 'ftp_delete'
	foreach($liste_fichiers as $fichier)	//List all files of FTP
	{
		if(@ftp_get($conn_id, "./log/$fichier", $fichier, FTP_BINARY)) {	//Download file on local directory
		//ftp_delete( $conn_id , $fichier ); //I've no try this line. To delete file on FTP
		$handle = fopen("./log/$fichier", "r") ; //Open local file
		$contents = fread($handle, filesize("./log/$fichier"));	//Read local file
		fclose($handle);
		if(json_decode($contents)) {	//If data file are JSON format, then we can used
			if($log=="[") {
				$log = $log.$contents;	//Return JSON value
			}
			else {
				$log = $log.",".$contents;	//Return JSON value
			}
			
		}
		}
	}
	$log = $log."]";

	ftp_close($conn_id); // close the FTP stream
	//concatenate files to 'C1.txt'
/*	$directory = "./TestBench";
	$myfile = "C1.txt";
	$fp1 = fopen("$directory/$myfile", 'a+');
	
	if ($handle = opendir("$directory")) {
	
    while (false !== ($entry = readdir($handle))) {
		if ($entry != "." && $entry != "..") {
			$file2 = file_get_contents("$directory/$entry");
			fwrite($fp1, $file2."\n");
			if($entry != "C1.txt") {
				unlink("$directory/$entry");
			}
		}
    }
	}*/
?>