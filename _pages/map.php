<!--
To use map, you must to have a key.
Get a key with Google console developer : https://console.developers.google.com/project
Project
1-Create project
Autorisation
2-Left of screen, select 'API and authentification->API, and search : Google Maps JavaScript API. I use API V3
3-Click of Active API
4-You can used free this API 25000 query/day, for your prototype, I think that's enough.
Key
5-Left of screen select 'API and authentification->Identifiant : Create a key->Server Key->Validate
6-Copy you key and modify link under. Example <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=[YOUR KEY]"></script>
-->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBNocSKnUTtFo4UD-LYQKb3XxAhuhTIVUU"></script>

<link rel=stylesheet href="styles/map.css">
<div id="map-canvas"></div>
<paper-button onclick="window.open('map_FullScreen.php','fullscreen=yes')" class="colored custom">
      <core-icon icon="fullscreen"></core-icon>
      Plein écran
 </paper-button>
 <script src="scripts/map.js" defer></script>