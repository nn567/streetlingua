<!DOCTYPE html>
<!-- saved from url=(0036)http://localhost/www/page-d-exemple/ -->
<html lang="fr-CA"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


<!--

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="pingback" href="http://localhost/www/xmlrpc.php">

<title>Connexion – streetlingua</title>
<link rel="dns-prefetch" href="http://fonts.googleapis.com/">
<link rel="dns-prefetch" href="http://s.w.org/">
<link rel="alternate" type="application/rss+xml" title="streetlingua » Flux" href="http://localhost/www/feed/">
<link rel="alternate" type="application/rss+xml" title="streetlingua » Flux des commentaires" href="http://localhost/www/comments/feed/">
<link rel="alternate" type="application/rss+xml" title="streetlingua » Connexion Flux des commentaires" href="http://localhost/www/page-d-exemple/feed/">
		<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2.2.1\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2.2.1\/svg\/","svgExt":".svg","source":{"concatemoji":"http:\/\/localhost\/www\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.7.4"}};
			!function(a,b,c){function d(a){var b,c,d,e,f=String.fromCharCode;if(!k||!k.fillText)return!1;switch(k.clearRect(0,0,j.width,j.height),k.textBaseline="top",k.font="600 32px Arial",a){case"flag":return k.fillText(f(55356,56826,55356,56819),0,0),!(j.toDataURL().length<3e3)&&(k.clearRect(0,0,j.width,j.height),k.fillText(f(55356,57331,65039,8205,55356,57096),0,0),b=j.toDataURL(),k.clearRect(0,0,j.width,j.height),k.fillText(f(55356,57331,55356,57096),0,0),c=j.toDataURL(),b!==c);case"emoji4":return k.fillText(f(55357,56425,55356,57341,8205,55357,56507),0,0),d=j.toDataURL(),k.clearRect(0,0,j.width,j.height),k.fillText(f(55357,56425,55356,57341,55357,56507),0,0),e=j.toDataURL(),d!==e}return!1}function e(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g,h,i,j=b.createElement("canvas"),k=j.getContext&&j.getContext("2d");for(i=Array("flag","emoji4"),c.supports={everything:!0,everythingExceptFlag:!0},h=0;h<i.length;h++)c.supports[i[h]]=d(i[h]),c.supports.everything=c.supports.everything&&c.supports[i[h]],"flag"!==i[h]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[i[h]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
		</script><script src="./Connexion – streetlingua_files/wp-emoji-release.min.js.download" type="text/javascript" defer=""></script>
		<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
} 
</style> -->
<!--<link rel="stylesheet" id="dashicons-css" href="./STREETLINGUA_files/dashicons.min.css" type="text/css" media="all">
<link rel="stylesheet" id="admin-bar-css" href="./STREETLINGUA_files/admin-bar.min.css" type="text/css" media="all">-->

    <body>
<?php include "barre_navigation.php"?>
<div id="content" class="site-content">
	<div class="container" style="min-height: 1px;">
				<div class="content-left-wrap col-md-9">	
				<div id="primary" class="content-area">
			<main itemscope="" itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage" id="main" class="site-main">
				




	<header class="entry-header">

		
	
		<h1 class="entry-title" itemprop="headline">Ajouter une nouvelle annonce</h1>		
	</header><!-- .entry-header -->

	
	<div class="entry-content">

	<div id="col2">

<div id="inscription">


<?php

$connexion = mysqli_connect('localhost', 'user', 'password', 'wp_database');
  


if ((isset($_POST['valider']))&&(isset($_GET['usr'])))
{
	//on definit des variables pour leurs attribuer les messsages d'erreur qui peuvent apparaitre au cours de l'inscription
		$valide=true;

		$message='';
		
		$usr = $_GET['usr'];
		$theme = mysqli_real_escape_string($connexion, $_POST['theme']);
		$prix = mysqli_real_escape_string($connexion, $_POST['prix']);
		$lieu = mysqli_real_escape_string($connexion, $_POST['lieu']);
		$add = mysqli_real_escape_string($connexion, $_POST['add']);
		$ville = mysqli_real_escape_string($connexion, $_POST['ville']);
		$nb_part= mysqli_real_escape_string($connexion, $_POST['nb_part']);
		$dispo = mysqli_real_escape_string($connexion, $_POST['dispo']);
		$duree = mysqli_real_escape_string($connexion, $_POST['duree']);
		$dispo_h = mysqli_real_escape_string($connexion, $_POST['dispo_h']);
		$description = mysqli_real_escape_string($connexion, $_POST['description']);
		$sujet = mysqli_real_escape_string($connexion, $_POST['sujet']);
		$langue = mysqli_real_escape_string($connexion, $_POST['langue']);
		
		
  //verif si tous les champs sont remplis
  
		if((empty($_POST['theme']) and empty($_POST['prix']) and empty($_POST['lieu']) and 
		empty($_POST['add']) and empty($_POST['nb_part'])and  empty($_POST['dispo']) and empty($_POST['dispo_h'])  and empty($_POST['description']) 
		and empty ($_POST['sujet']  )))
		
			{?>
				<script>
				alert('veuillez rentrer tous les champs');
				</script>
				<?php
				$valide = false;
			}
		else {
	
			// requete insertion
			$id_theme="SELECT ID_theme FROM wp_theme where theme_nom=\"$theme\"";
					$result5 = mysqli_query($connexion, $id_theme);
					$row=mysqli_fetch_assoc($result5);	
					$id_theme=$row['ID_theme'];	
					
			$requete = "INSERT INTO wp_dispo (dispo_date,dispo_heure, dispo_duree) VALUES('".$dispo."','".$dispo_h."','".$duree."');"; 
			mysqli_query($connexion, $requete);
			$id_dispo=mysqli_insert_id($connexion);
			

					
					
			$rempli_exp = "INSERT INTO wp_exp (exp_langue, exp_theme_id, exp_sujet, exp_lieu_nom, exp_lieu_add, exp_lieu_ville, exp_prix, exp_dispo_id, exp_nb_participants, exp_description) 
			VALUES ('".$langue."','".$id_theme."','".$sujet."','".$lieu."','".$add."','".$ville."','".$prix."','".$id_dispo."','".$nb_part."','".$description."');"; 
		
			$resInsert = mysqli_query($connexion, $rempli_exp);	
			$id_exp=mysqli_insert_id($connexion);
			
			$requete3="SELECT ID FROM wp_users where user_login=\"$usr\"";
			$result3= mysqli_query($connexion, $requete3);
			$row3=mysqli_fetch_assoc($result3);
			$id_usr=$row3['ID'];	
			
			if ($result3 == FALSE) echo 'non';
			
			$requete4="INSERT INTO wp_exp_propose (ID_user, ID_exp) values ('".$id_usr."','".$id_exp."');";
			 mysqli_query($connexion, $requete4);
			

//si le resultat renvoie une erreur, on l'affiche		
			if($resInsert == FALSE)
				{
			    echo " <p>Erreur lors de l'ajout de l'annonce !</p>";
				printf("Message d'erreur : %s\n", mysqli_error($connexion));
			    exit();
				}
				else 
				{
					//sinon on affiche un message de confirmation d'ajout
					$formulaireValide = TRUE;
					echo '<font color="green">';
					echo "<p>Confirmation de l'ajout de l'annonce</p></br>";
					echo "<p>Cliquez <a href='./tableau_de_bord.php'> ici </a> pour acceder au tableau de bordS</p>";
					echo '</font>';
					
					//header('Refresh: 2; url=./connexion.php'); 
				}
			
		}
			
}
 else {
?>
<form method="post" action="#">
	
<table>

<tr>
	<td><label style="font-weight:bold"  for="langue">Langue :</label></td>
	<td><input type="radio" name="langue" value="francais"/>Francais
    <input type="radio" name="langue" value="anglais"/>    Anglais</td>
</tr>

<tr>

	<td><label style="font-weight:bold"  for="login">Theme :</label></td>
	<td> <div class="select_styled"  > <select  name="theme" id="theme" >
			
				<?php
						$requete='SELECT theme_nom from wp_theme order by ID_theme DESC';
						$result=mysqli_query($connexion, $requete);
						
						echo '<option value=""></option>';
						while ($row=mysqli_fetch_assoc($result))
						{
							echo '<option value="'.$row['theme_nom'].'">'.$row['theme_nom'].'</option>';
						}
						?>
</tr>
<tr>
	<td><label style="font-weight:bold"  for="lieu">Sujet :</label></td>
	<td><input  name="sujet"  type="text" style=" border: 1px solid #A9A9A9;"id="sujet" /><br /></td>
</tr>
<tr>
	<td><label style="font-weight:bold"  for="lieu">Lieu :</label></td>
	<td><input  name="lieu"  type="text" style=" border: 1px solid #A9A9A9;"id="lieu" /><br /></td>
</tr>
<tr>
	<td><label style="font-weight:bold"  for="add">Adresse :</label></td>
	<td><input  name="add"  type="text" style=" border: 1px solid #A9A9A9;"id="add" /><br /></td>
</tr>
<tr>
	<td><label style="font-weight:bold"  for="ville">Ville :</label></td>
	<td><input  name="ville"  type="text" style=" border: 1px solid #A9A9A9;"id="ville" /><br /></td>
</tr>

<tr>
	<td><label style="font-weight:bold"  for="prix">Prix :</label></td>
	<td><input name="prix"  type="text" style=" border: 1px solid #A9A9A9;" id="prix" /><br /></td>
</tr>
<tr>
	<td><label style="font-weight:bold" for="dispo">Disponibilité jour:</label></td>
	<td><input id="datepicker" name="dispo" /></td>
</tr>

<tr>
	<td><label style="font-weight:bold" for="dispo_h">Disponibilité heure:</label></td>
	<td><input id="time" type="text" name="dispo_h" style=" border: 1px solid #A9A9A9;" /></td>
</tr>

<tr>
	<td><label style="font-weight:bold" for="duree">Duree:</label></td>
	<td><input type="text" name="duree" style=" border: 1px solid #A9A9A9;" id="duree" /> heures</td>
</tr>



<tr>
	<td><label style="font-weight:bold"  for="nb_part">Nombre de participants :</label></td>
	<td><input name="nb_part"  type="text" style=" border: 1px solid #A9A9A9;" id="nb_part" /><br /></td>
</tr>
<tr>
	<td><label style="font-weight:bold"  for="description">Description :</label></td>
	<td><textarea rows="4" cols="50" style=" border: 1px solid #A9A9A9;" name="description" >
</textarea></td>
</tr>

<tr style="text-align:center;">
			<td colspan=2><br/><br/>
			<input type="submit" name="valider" value="Ajouter l'annonce"/>
			</td>
</tr>

</table>
</form>
<style type="text/css">
.ui-datepicker-calendar tr, .ui-datepicker-calendar td, .ui-datepicker-calendar td a, .ui-datepicker-calendar th{font-size:inherit;}
div.ui-datepicker{font-size:14px;width:inherit;height:inherit;}
.ui-datepicker-title span{font-size:14px;}
</style>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
  <script type="text/javascript" src="datepair.js"></script>
<script type="text/javascript" src="jquery.datepair.js"></script>
  <script>
 $(function() {$( "#datepicker" ).datepicker({
  firstDay: 1,
  altField: "#datepicker",
  closeText: 'Fermer',
  prevText: 'Précédent',
  nextText: 'Suivant',
  currentText: 'Aujourd\'hui',
  monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
  monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
  dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
  dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
  dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
  weekHeader: 'Sem.',
  dateFormat: 'dd-mm-yy'});}); 
  

      $('#time').timepicker();
  
 </script>
</div>

<?php } ?>
</div>


	</div>
	</article></main>
	</div>
	
		


</body></html>