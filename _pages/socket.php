<script type="text/javascript" src="noty/packaged/jquery.noty.packaged.min.js"></script>
<script type="text/javascript">
function IP_noty() {
	noty({
		text:"Atttention, connection échoué avec l'appareil",
		layout:"topCenter",
		type:"warning",
		animation:{
			open:"animated flipInX",
			close:"animated flipOutX",
			speed:500
		},
		timeout:false,
		closeButton:true,
		closeOnSelfClick:true,
		closeOnSelfOver:false,
		modal:false
	});
}
</script>
<style>
core-field {
      border: 1px solid #ddd;
      margin: 10px;
      height: 40px;
    }
</style>
<?php
//Default input
$request = "";
$texteSubmit = "Lancer la mesure";
$date = date('ymd_his');
$save = $date."_monlog.txt";

//After submit user, Go to mesure
if(isset($_POST["submit"])) {
	$request = $_POST["requete"];
	if($host = gethostbyaddr(IP_SOCKET)) {
		$texteSubmit = "Attente de la connection...";
	}
	else{
		echo"<script>IP_noty();</script>";
	}
	$save = $_POST["save"];
}

//Settings
echo "<form method='post' id='ask' >
<h3>Requête manuel</h3>
<core-field><core-icon icon='assignment'></core-icon><label for='mesure'>Requête</label> <select name='requete' id='requete' style='border:none' flex><option value='$request'> $request</option><option value='LONG?'>LONG?</option><option value='LAT?'>LAT?</option><option value='VIT?'>VIT?</option><option value='MOT?'>MOT?</option><option value='MEAS:CURR:DC?'>MEAS:CURR:DC?</option><option value='CLIM?'>CLIM?</option><option value='OCCUP?'>OCCUP?</option></select></core-field>
<core-field><core-icon icon='save'></core-icon><label for='save'>Save</label><input type='text' name='save' id='save' value='$save' flex></core-field>
<paper-input-decorator label='myPaper'><input name='submit' id='submit' type='submit' value='$texteSubmit' is='core-input'/></paper-input-decorator></form>";
?>

<script type="text/javascript">
window.onload = function () {

		var updateChart = function () {
							
				//Send socket query
				 $.ajax({
					method : 'POST',
					url : 'ajax.php', // La ressource ciblée
					data: { request : "<?php echo $request ?>", save :  "<?php echo $save ?>" },
					dataType: "json"
				})
				.done(function( reponse ) {
					alert(reponse);
				})
				.fail(function(jqXHR, textStatus) {
					IP_noty();
				});


	

		};
		 if(document.getElementById("submit").value=="Attente de la connection..."){
			// generates first set of dataPoints
			updateChart(); 
		 }
				 
	}
</script>