<?php
//Few webservice configuration

define('ID_BUS',"C1"); //ID of our Bus. This code manage only 1 bus, and not bus fleet
define('MODE_COMM',"testbench"); // 'testbench' to read data on local file 'testbench/ID_BUS.txt' | 'ftp' to read data file on FTP 'ID_BUS.txt | 'socket' to read data by socket

//FTP config
define('SERVER_FTP',"*******");
define('NAME_FTP',"*******");
define('PASS_FTP',"*********");

//If you want use socket or cURL, de-comment. Code example on 'tcp' directory, no implemented
define('IP_SOCKET',"169.254.102.195");
define('PORT_SOCKET',5025);


//If you must used database Mysql, de-comment. No implemented
/*
define('HOST_MYSQL',"localhost");
define('USER_MYSQL',"root");
define('PASS_MYSQL',"");
define('DB_MYSQL',"bus");
*/
?>