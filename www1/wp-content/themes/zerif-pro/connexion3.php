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
	<div class="container" style="min-height: 1px;">
				<div class="content-left-wrap col-md-9">	
				<div id="primary" class="content-area">
			<main itemscope="" itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage" id="main" class="site-main">
				




	
		<h1 class="entry-title" itemprop="headline">Connexion</h1>		


	
	<div class="entry-content">

<div id="connexion">


<?php
global $_SESSION;
function ajouterActiviteSession($nouvelleActivite) {
		$_SESSION['activite'][] = date("Y-m-d H:i:s").' : '.$nouvelleActivite;
	}
$connexion = mysqli_connect('localhost', 'user', 'password', 'wp_database');

if (isset($_SESSION['login'])) echo "vous etes deja connecte";

if (isset($_POST['valider']))
{
    $message='';
    if (empty($_POST['pseudo']) || empty($_POST['password']) ) //Oublie d'un champ
    {
        $message = '<p>une erreur s\'est produite pendant votre identification.
	Vous devez remplir tous les champs</p>
	<p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
    }
    else //On verifie le mot de passe
    {
		$pseudo=mysqli_real_escape_string($connexion, $_POST['pseudo']);
		$resultat=mysqli_query($connexion,'SELECT user_login, user_type, user_pass FROM wp_users WHERE user_login=\''.$pseudo.'\';');
        $row=mysqli_fetch_assoc($resultat);
		
	if (($row['user_pass']) == md5($_POST['password'])) // Acces OK !
	{
	    $_SESSION['login'] = $row['user_login'];
		$usr=$row['user_login'];
		ajouterActiviteSession('ajout de '.$_SESSION['login']);
		echo  $_SESSION['login'];
		//header("location: index.php?page=index1.php");
		$message = '<p>Connexion reussie</p>';
		
		echo "<p>Cliquez <a href='./tableau_de_bord.php?usr=".$usr."'> ici </a> pour acceder au tableau de bord</p>";
		if ($row['user_type']=='mentor')
		echo "<p>Cliquez <a href='./profil_mentor.php'> ici </a> pour acceder a votre profil</p>
			<br><p>Cliquez <a href='./ajout_annonce.php?usr=".$usr."'> ici </a> pour ajouter une annonce</p>";
		else echo "<p>Cliquez <a href='./profil_apprenti.php'> ici </a> pour acceder a votre profil</p>";
		
 		
	}
	else // Acces pas OK !
	{
	    $message = '<p>Une erreur s\'est produite 
	    pendant votre identification.<br /> Le mot de passe ou le pseudo 
            entré n\'est pas correcte.</p><p>Cliquez <a style="color:black" href="index.php?page=connexion.php">ici</a> 
	    pour revenir à la page précédente
	    <br /><br />Cliquez <a style="color:black" href="./index.php">ici</a> 
	    pour revenir à la page d accueil</p>';
	}
    }
    echo $message;
	

}
 else {
?>
<div class="row">
<div class="col-md-6">

<form method="post" action="#">
	
<label for="pseudo">Pseudo :</label>
<input name="pseudo"  type="text" id="pseudo" /><br />

<label for="password">Mot de Passe :</label>
<input type="password" name="password" id="password" />


<input type="submit" name="valider" value="Connexion" />

<a  href="./inscription.php">Pas encore inscrit ?</a>
		
</form>
</div>
</div>

<?php } ?>
</div>


	</div>
	</article></main>
	</div>
	
		


</body></html>