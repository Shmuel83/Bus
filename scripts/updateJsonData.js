/*
Author : Rodolphe MOULIN 13/05/2015
Run by ligne.php

Action : Query bus data with query AJAX : Position_ajax.php, result by JSON format.
Reload new datas. Datas that's changed are write with red color 2 seconds.
Progress bar / stations is refresh too with scripts/canvas.js
*/
var updateInterval = INTERVAL;
var updateLine = function () {
	
				var monnoty = Load_noty(); //Load indication for user
				
				 $.ajax({
					method : 'POST',
					url : 'Position_ajax.php',
					data: { numero_bus : ID_BUS },
					dataType: "json"
				})
				.done(function( pos ) {
					console.log(pos);
					for(i=0 ; i<pos.length ; i++) {
						//Recuperation data JSON
						lat = parseFloat(pos[i]["latitude"]);
						lng = parseFloat(pos[i]["longitude"]);
						etat = pos[i]["state"];
						occup = parseFloat(pos[i]["fillingRatio"]);
						vitesse = parseFloat(pos[i]["speed"]);
						tempMot = parseFloat(pos[i]["tempMotor"]);
						tempClim = parseFloat(pos[i]["tempAir"]);
					
						lastStation = pos[i]["lastStation"]; //Used by canvas.js;
					
					
					
					//Modifications DOM
					if("lat:" + lat +" long:"+lng != $('#geo'+i).text()) {	//If previously this data is different
						$('#geo'+i).html('lat:' + lat +' long:'+lng);
						runAnimation('#geo'+i);
					}
					if(etat != $('#etat'+i).text()) {
						$('#etat'+i).html(etat);
						runAnimation('#etat'+i);
					}
					if(occup + "%" != $('#occup'+i).text()) {
						$('#occup'+i).html(occup + "%");
						runAnimation('#occup'+i);
					}
					if(vitesse + "km/h" != $('#vitesse'+i).text()) {
						$('#vitesse'+i).html(vitesse+"km/h");
						runAnimation('#vitesse'+i);
					}
					if(tempMot + "°C" != $('#tempMot'+i).text()) {
						$('#tempMot'+i).html(tempMot + "°C");
						runAnimation('#tempMot'+i);
					}
					if(tempClim  + "°C" != $('#tempClim'+i).text()) {
						$('#tempClim'+i).html(tempClim + "°C");
						runAnimation('#tempClim'+i);
					}
								

					//Mise à jour de l'avancement du bus, réalisé via un canvas, à optimiser bien sûr avec un base de donnée
					//Cette étape permet de savoir où l'on doit positionner la bar d'avancement par rapport à la station
					switch(lastStation) {
					case "Maupertuis":
						nbStation = 50;
						break;
					case "Les Béalières":
						nbStation = 50+(44*1);
						break;
					case "Malacher":
						nbStation = 50+(44*2);
						break;
					case "Granier":
						nbStation = 50+(44*3);
						break;
					case "Meylan Mairie":
						nbStation = 50+(44*4);
						break;
					case "Piscine des Buclos":
						nbStation = 50+(44*5);
						break;
					case "Le Brêt":
						nbStation = 50+(44*6);
						break;
					case "La revirée":
						nbStation = 50+(44*7);
						break;
					case "Aiguinards - Hexagone":
						nbStation = 50+(44*8);
						break;
					case "Pleine fleurie":
						nbStation = 50+(44*9);
						break;
					case "Carronnerie - Ile d'amour":
						nbStation = 50+(44*10);
						break;
					case "Sablons":
						nbStation = 50+(44*11);
						break;
					case "Grenoble Hôtel de Ville":
						nbStation = 50+(44*12);
						break;
					case "Chavant":
						nbStation = 50+(44*13);
						break;
					case "Docteur Martin":
						nbStation = 50+(44*14);
						break;
					case "Victor Hugo":
						nbStation = 50+(44*15);
						break;
					case "Docteur Mazet":
						nbStation = 50+(44*16);
						break;
					case "Félix Viallet":
						nbStation = 50+(44*17);
						break;
						case "Grenoble Gares":
						nbStation = 50+(44*18);
						break;
					case "Emile Gueymard":
						nbStation = 50+(44*19);
						break;
					case "Arago":
						nbStation = 50+(44*20);
						break;
					case "Jean Macé":
						nbStation = 50+(44*21);
						break;
					default:
						nbStation = 50;
						console.log("Pas de station trouvé : " + lastStation)
					}
					moncanvas(nbStation,i);	//Function on Canvas.js to draw canvas, progress bar / stations
					monnoty.close();	//Close notification
					$('core-icon').animate({width: "0px", height:"0px"}, CHANGE_VALUE);	//DeZoom of icon bus
				}
				});
						
	
};
function Load_noty() {
	var idnoty = noty({
		text:"Chargement des données...",
		layout:"topCenter",
		type:"warning",
		timeout:false,
		closeButton:true,
		closeOnSelfClick:true,
		closeOnSelfOver:false,
		killer: true,
		modal:false
	});
	return idnoty;
}
function runAnimation(idAnimation) {
	
	$(idAnimation).append('<core-icon icon="maps:directions-bus" style="width: 25px; height: 25px;"></core-icon>').delay(CHANGE_VALUE).queue(function(){
		$(idAnimation + ' core-icon').remove();
	});
}
$(document).ready(function() {	//Wait that all page is charged, then run this script

updateLine();
interval = setInterval(function(){updateLine()}, updateInterval);

});