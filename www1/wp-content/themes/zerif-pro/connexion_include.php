<?php


global $_SESSION;
/*function ajouterActiviteSession($nouvelleActivite) {
		$_SESSION['activite'][] = date("Y-m-d H:i:s").' : '.$nouvelleActivite;
	}*/
$connexion = mysqli_connect('localhost', 'user', 'password', 'wp_database');

//if (isset($_SESSION['login'])) echo "vous etes deja connecte";

if (isset($_POST['valider']))
{
    $message='';
    if (empty($_POST['pseudo']) || empty($_POST['password']) ) //Oublie d'un champ
    {
       echo '
	    <script type="text/javascript">
		alert("Veuillez remplir tous les champ");
		</script>
		';
	}
    else //On verifie le mot de passe
    {
		$pseudo=mysqli_real_escape_string($connexion, $_POST['pseudo']);
		$resultat=mysqli_query($connexion,'SELECT ID, user_login, user_type, user_pass FROM wp_users WHERE user_login=\''.$pseudo.'\';');
        $row=mysqli_fetch_assoc($resultat);
		$id_usr=$row['ID'];
		
		if (($row['user_pass']) == md5($_POST['password'])) // Acces OK !
		{

			session_start();
			$_SESSION['login']=$pseudo;
						
			//if (isset($_SESSION['login'])){
			//echo '<script> alert("marche pas"); </script>';
			
			
			//header("location: index.php?page=index1.php");
			//$message = '<p>Connexion reussie</p>';
			
			//echo "<p>Cliquez <a href='./tableau_de_bord.php?usr=".$usr."'> ici </a> pour acceder au tableau de bord</p>";
			
			if ($row['user_type']=='mentor') echo '
				<script type="text/javascript">
			window.location = "./tableau_de_bord.php?usr='.$_SESSION['login'].'"</script>';
			
			if ($row['user_type']=='apprenti') echo '
				<script type="text/javascript">
			window.location = "./tableau_de_bord.php?usr='.$_SESSION['login'].'"</script>';
			
			//echo "<p>Cliquez <a href='./profil_mentor.php'> ici </a> pour acceder a votre profil</p>
			//	<br><p>Cliquez <a href='./ajout_annonce.php?usr=".$usr."'> ici </a> pour ajouter une annonce</p>";
			//else echo "<p>Cliquez <a href='./profil_apprenti.php'> ici </a> pour acceder a votre profil</p>";
			
 		
	}
	else // Acces pas OK !
	{
		echo '
	    <script type="text/javascript">
		alert("Erreur connexion, reesayez");
		</script>
		';
	}
    }
    //echo $message;
	

}

