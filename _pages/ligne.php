<!--
Goal : Display the bus lines
This code display only 2 lines : C1&C2. 
ToDo : To Generate all bus lines, to use database (no create)
-->
<h1>C1</h1>
<ul>
<li>Etat : <span id='etat0'></span></li>
<li>Mesure géographique : <span id='geo0'></span></li>
<li>Taux d'occupation : <span id='occup0'></span></li>
<li>Vitesse et accélération : <span id='vitesse0'></span></li>
<li>Température moteur : <span id='tempMot0'></span></li>
<li>Température climatisation : <span id='tempClim0'></span></li>
</ul>
<canvas id='myCanvas0' width="1100" height="250">
<p>Votre navigateur ne supporte pas les canvas <a href='http://caniuse.com'>http://caniuse.com</a></p>
</canvas>

<h1>C2</h1>
<ul>
<li>Etat : <span id='etat1'></span></li>
<li>Mesure géographique : <span id='geo1'></span></li>
<li>Taux d'occupation : <span id='occup1'></span></li>
<li>Vitesse et accélération : <span id='vitesse1'></span></li>
<li>Température moteur : <span id='tempMot1'></span></li>
<li>Température climatisation : <span id='tempClim1'></span></li>
</ul>
<canvas id='myCanvas1' width="1100" height="250">
<p>Votre navigateur ne supporte pas les canvas <a href='http://caniuse.com'>http://caniuse.com</a></p>
</canvas>

<script src="scripts/canvas.js"></script>
<script src="scripts/updateJsonData.js"></script>
