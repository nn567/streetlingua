<?php
	$connexion = NULL;

	// connexion à la BD
	function connectBD() {
		global $connexion;		
		$connexion = mysqli_connect(SERVEUR, UTILISATEURICE, MOTDEPASSE, BDD);
		if (mysqli_connect_errno()) {
		    printf("Échec de la connexion : %s\n", mysqli_connect_error());
		    exit();
		}
	}
global $login;

	function deconnectBD() {
		global $connexion;
		mysqli_close($connexion);
	}

	function ajouterActiviteSession($nouvelleActivite) {
		$_SESSION['activite'][] = date("Y-m-d H:i:s").' : '.$nouvelleActivite;
	}
	
	function erreur($err='')
{
   $mess=($err!='')? $err:'Une erreur inconnue s\'est produite';
   exit('<p>'.$mess.'</p>
   <p>Cliquez <a href="./index.php">ici</a> pour revenir à la page d\'accueil</p></div></body></html>');
}

?>
