# -*- coding: UTF-8 -*-
#-------------------------------------------------------------------------------
# Name:        module1
# Purpose:
#
# Author:      moulin
#
# Description   This is a testbench to simulate data GPS.
#               Run with PyScripter.
#Result         All 1 minutes, new local & FTP file is create with a new data
#
#
#Test with      Webserver, page map.php. You must see movement bus icon all minutes
#
#Error??        Check below link "C1.txt" or "Position_ajax.php"
#
# Created:     30/04/2015
# Copyright:   (c) moulin 2015
# Licence:     <your licence>
#-------------------------------------------------------------------------------
import time
import json
import ftplib

link = "C:/xampp/htdocs/Bus/TestBench/C1.txt"

host = "ftp.elsys-design.com" # adresse du serveur FTP
user = "elsys-140435" # votre identifiant
password = "coFPHAlb3X" # votre mot de passe
port = 21
ftp = ftplib.FTP('')
ftp.connect(host,port) # on se connecte
ftp.login(user,password)

lng = 5.7165413

monJSONinfo = {}
monJSONinfo["idBus"] = "C1"
monJSONinfo['fillingRatio'] = 11
monJSONinfo['tempMotor'] = 43
monJSONinfo['tempAir'] = 18
monJSONinfo['speed'] = 25
monJSONinfo['state'] = "En service"
monJSONinfo['lastStation'] = "Jean Macé"

for a in range(100): #I realise 100 bus deplacment, all minutes
    monfichier = open(link,"w")
    lng = lng + 0.0010000 #Bus deplacement by Longitude
    monJSONinfo['latitude'] = 45.189429800000006 #latitude no change
    monJSONinfo['longitude'] = lng
    json.dump(monJSONinfo, monfichier)
    #monfichier.write("LatLng 45.189429800000006," + str(lng)) #Ligne supprimable depuis que nous utilisons le JSON au lieu du texte
    monfichier.close()

    #Enregistrement dans le fichier FTP
    monfichier = open(link,"rb")
    ftp.storbinary('STOR C1.txt', monfichier) # ici j'indique le fichier à  envoyer sur le FTP
    monfichier.close()


    monfichier.close()
    time.sleep(5)

ftp.quit()
