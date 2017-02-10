/*
Author : Rodolphe MOULIN 13/05/2015
Run by updateJsonData
Input stationBus : that's number to bar position / station
Action : Clear canvas and draw new canvas to indicate bus position / station
*/
function moncanvas(stationBus,idBus) {

var canvas = document.getElementById('myCanvas'+idBus);
var context = canvas.getContext('2d');
context.restore();	//Restore X and Y reference point
	
context.lineCap = 'round';	//End bars : round
context.lineWidth = 15;	//Width bars
context.font = "12pt Verdana";	//Text police
context.textAlign = "left";
context.textBaseline = "top";
var TextX = 10;
var TextY = 20;
var TranslateX = 44;
var TranslateY = 0;
var listeStation = ["Jean Macé","Arago","Emile Gueymard","Grenoble Gares","Félix Viallet","Docteur Mazet","Victor Hugo","Docteur Martin","Chavant","Grenoble Hôtel de Ville","Sablons","Carronnerie - Ile d'amour","Pleine fleurie","Aiguinards - Hexagone","La revirée","Le Brêt","Piscine des Buclos","Meylan Mairie","Granier","Malacher","Les Béalières","Maupertuis"];
var NBSTATION = listeStation.length;
var RotationText = Math.PI / 3;
listeStation.reverse(); //Reverse table order
//Background bar
context.beginPath();
context.moveTo(TextX,TextY);
context.lineTo(980,TextY);
context.strokeStyle = "lightblue"; // Color background bar
//shadow Background bar
context.shadowOffsetX = 2;
context.shadowOffsetY = 2;
context.shadowBlur = 5;
context.shadowColor = 'black';
context.stroke();
context.closePath();
//no shade for others
context.shadowOffsetX = 0;
context.shadowOffsetY = 0;
context.shadowBlur = 0;

//progression bar bus 
context.beginPath();
context.moveTo(TextX,TextY);
context.lineTo(stationBus,TextY);
context.strokeStyle = "blue"; // Color progress bar
context.stroke();
context.closePath();

context.beginPath();
context.save(); //Important, Save position, cause we will go translate reference axes. We will restore when we reload progression bus station

//Line to station bus
context.lineWidth = 5;
context.globalCompositeOperation = "destination-over";	//bar over line station

//Draw line Station bus
context.strokeStyle = "black";
context.translate(TranslateX, TranslateY);
for(var nbStation=0; nbStation < NBSTATION; nbStation++) {
	context.moveTo(TextX,TextY-15); //line begin by
	context.lineTo(TextX,TextY+18);	//line end by
	context.stroke();	//Draw line
	context.translate(TranslateX, TranslateY);
}


context.restore();
context.save();
//Write station bus
context.translate(TranslateX, TranslateY);
for(var nbStation=0; nbStation < NBSTATION; nbStation++) {
	context.rotate(RotationText);
	context.fillText(listeStation[nbStation],TextX+40,TextY-10);
	context.rotate(-RotationText);
	context.translate(TranslateX, TranslateY);
}
context.closePath();
}