<html>
<button>Click here</button>
<?php
$connexion = mysqli_connect('localhost', 'user', 'password', 'wp_database');

		$requete1="select ID_exp, exp_sujet, exp_theme_id, exp_lieu_nom, exp_lieu_add, exp_lieu_ville, exp_description, exp_prix, exp_nb_participants, exp_dispo_id from wp_exp";
		$res1=mysqli_query($connexion, $requete1);
		$row1=mysqli_fetch_assoc($res1);

	//while ($row=mysqli_fetch_assoc($res)
	
		$add=$row1['exp_lieu_nom'];
		
		
	

	
?>


<script>
$(document).ready(function(){
	$(document).on("click","button",function get_coord(){
	var address = <?php echo $add;?>
	$.ajax({
	  url:"http://maps.googleapis.com/maps/api/geocode/json?address="+address+"&sensor=false",
	  type: "POST",
	  success:function(res){
      $lat=res.results[0].geometry.location.lat;
      $lng=res.results[0].geometry.location.lng;
   }
	 });
	 $.post( "carte.php", { lat: $lat, lng: $lng })
     .done(function( data ) {
    alert( "Data Loaded: " + data );
  });
	 });
	 
});
</script>