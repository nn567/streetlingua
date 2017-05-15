<!DOCTYPE html>
<!-- saved from url=(0036)http://localhost/www/page-d-exemple/ -->
<html lang="fr-CA"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>

<?php include "barre_navigation.php";?>
	

	
<div id="content" class="site-content">
	<div class="container" style="min-height: 1px; margin-right: 60px;">
				
				<div id="primary" class="content-area">
			<main itemscope="" itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage" id="main" class="site-main">
				

<div class="row">
<div class="col-md-12">

</div>
	


<?php

$connexion = mysqli_connect('localhost', 'user', 'password', 'wp_database');


//barre de recherche pour trouver des annonces qui nous correspond 	

 if (isset($_GET["usr"]))
	   //echo 'succes login'; 
	   $usr = $_GET["usr"];
	   

 if (isset($_GET["c"]))
	   //echo 'succes login'; 
	   $c = $_GET["c"]; 
   
 if (isset($_POST["chercher"])){
	 
	 $lieu = mysqli_real_escape_string($connexion, $_POST['lieu']);
	 
	 $requete="select ID_exp, exp_sujet, exp_langue, exp_theme_id, exp_lieu_nom, exp_lieu_add, exp_lieu_ville, exp_description, exp_prix, exp_nb_participants, exp_dispo_id from wp_exp where exp_lieu_ville=\"$lieu\"";
     $res=mysqli_query($connexion, $requete);
	
 }
  
 if (!isset($_POST["chercher"])){
	 
	$requete="select ID_exp, exp_sujet, exp_langue, exp_theme_id, exp_lieu_nom, exp_lieu_add, exp_lieu_ville, exp_description, exp_prix, exp_nb_participants, exp_dispo_id from wp_exp";
    $res=mysqli_query($connexion, $requete);
	
 }

 //cuisine id = 1
 $requete_theme_cuisine="select count(*) as nb_cuisine from wp_exp where exp_theme_id=1";
 $res_cuisine=mysqli_query($connexion, $requete_theme_cuisine);
 $row_cuisine=mysqli_fetch_assoc($res_cuisine);
 $nb_cuisine=$row_cuisine['nb_cuisine'];
 
 //voyages id = 2
 $requete_theme_voyage="select count(*) as nb_voyage from wp_exp where exp_theme_id=2";
 $res_voyage=mysqli_query($connexion, $requete_theme_voyage);
 $row_voyage=mysqli_fetch_assoc($res_voyage);
 $nb_voyage=$row_voyage['nb_voyage'];
 
 //sport id = 3
 
 $requete_theme_sport="select count(*) as nb_sport from wp_exp where exp_theme_id=3";
 $res_sport=mysqli_query($connexion, $requete_theme_sport);
 $row_sport=mysqli_fetch_assoc($res_sport);
 $nb_sport=$row_sport['nb_sport'];
 

//$requete1="select wp_connexion.ID_user from wp_connexion inner join wp_users on wp_users.ID=wp_connexion.ID_user where wp_users.user_login=\"$usr\"";
//$resultat1=mysqli_query($connexion,$requete1);



$j = 0;
$k=false;
//affichage des annonces
echo '<div class="row">';
for ($j = 0; $j<3; $j++)
{
	$i=0;
		echo '<div class="row">';
		
		if ($k==true) 

			echo '<div class="col-md-2">
					</div>';
		
		while (($row=mysqli_fetch_assoc($res))&& ($i<3))
		{

				if ($k==false)
		{
					echo '<div class="col-md-2" style="margin-top: 60px;">
					
					<div class="list-group">
				  <a href="#" class="list-group-item"><span class="badge badge-inverse">';echo $nb_voyage; echo '</span> Voyage</a>
				  <a href="#" class="list-group-item active"><span class="badge badge-success">';echo $nb_cuisine; echo '</span> Cuisine</a>
				  <a href="#" class="list-group-item"><span class="badge badge-info">';echo $nb_sport; echo '</span> Sport</a>
				    <a href="#" class="list-group-item"><span class="badge badge-warning">0</span> Cours</a>
				   <a href="#" class="list-group-item"><span class="badge badge-danger">0</span> Decouverte</a>
					<a href="#" class="list-group-item"><span class="badge badge-danger">00</span> Decouverte</a>
</div>
				</div>';
				$k=true;
		}
		
			echo '
		<div class="col-md-3" style="margin-left: 20px;">
					<br><br>
					
					<input type="hidden" name="varname" value='.$row['ID_exp'].'>
					
					<h3>'.$row['exp_sujet'].'</h3>
					<img alt="Bootstrap Image Preview" width="100px" height="100px" src="nature.jpg" />';
		
					echo'
					<h4>Lieu : '.$row['exp_lieu_nom'].'</h4>
					<h4>Prix : '.$row['exp_prix'].' euros</h4>
					<button class="btn btn-primary" id="'.$row['ID_exp'].'" >Voir l\'annonce </button>';
					$i++;	

					 echo 
					 '<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
		<script>

		$(document).ready(function(){
			
		  $(document).on("click","button",function(){
			$id = ($(this).attr(\'id\'));
			$user = "<?php echo $usr; ?>";
			$c = "<?php echo $c; ?>";
			if ($.isNumeric($id)){
			window.location.href = "voir_annonce.php?w1=" + $id + "&c=" + $c;
			}
		  });
		});
		</script>
		</div>
		';
		}
		echo '</div>';
}		

?>






	</div>
	</article></main>
	</div>
	
		


</body></html>