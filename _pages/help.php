<h1>Aide</h1>
<p>A date du 26 Mai 2015, l'objectif du webservice est de récupérer des fichiers sur un FTP, mise à jour par une carte électronique</p>
<p>Le protocole des fichiers FTP n'étant pas encore en place, un testBench écris en Python permet de générer un fichier en local (/TestBench/C1.txt) et sur le FTP toutes les minutes avec la longitude, la latitude du bus C1 et d'autres informations</p>
<p>Les données sont récupérés via une requête AJAX toutes les minutes sur le FTP, télécharge et stocke en local dans le répertoire "log" les fichiers et les données sont ensuite traitées sur la carte "map.php" ainsi qu'affichées textuellement dans la page "ligne.php"</p>
<p>Le format des données est en JSON<code>
[{"state": "En service", "fillingRatio": 10, "speed": 43, "longitude": 5.7365413, "latitude": 45.189429800000006, "tempAir": 19, "lastStation": "Chavant", "tempMotor": 40, "idBus": "C1"},{"idBus": "C2",...}]
</code></p>
<p>Chaque Bus à son fichier texte sous forme JSON sur le FTP. Le webService peut gérer une infinité de bus (La page ligne devra être améliorer pour gérer plus de 2 bus, la page map gère bien une infinité de bus).
Chaque bus doit avoir un idBus différent. La requête AJAX récupère les données et renvoit une seul réponse sous format JSON les données de tous les bus.</p>
<p>Le squelette du site web a été réalisé à partir du webStarterKit, développé par Google</p>
<h2>Les fichiers importants</h2>
<ul>
<li>config.php et config.js permettent de modifier certains éléments comme la fréquence de rafraîchissement des données</li>
<li>index.php Pour le header, appellant la librairie JQuery</li>
<li>_pages/map.php Pour afficher la carte des transports. La clé de Google Maps JavaScript API v3 appartient à Rodolphe MOULIN, merci de la changer si possible. Les instructions pour obtenir une nouvelle clé sont écrites dans le fichier</li>
<li>scripts/map.js Pour mettre à jour la carte. Une requête ajax est envoyé vers Position_ajax.php avec une méthode POST</li>
<li>Position_ajax.php Renvoie les data des bus en JSON (lu dans le fichier) scripts/map.js (pour la carte)et scripts/updateJsonData.js (pour les lignes)</li>
<li>_pages/ligne.php Pour afficher sous format texte toutes les datas des bus</li>
</ul>
<h3>Quelques copies d'écran</h3>
<img src="images/help/printscreen_carte.jpg" />
<img src="images/help/printscreen_lignes.jpg" />