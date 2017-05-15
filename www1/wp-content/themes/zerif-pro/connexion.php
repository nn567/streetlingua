<div id="col2">
<h1>Connexion</h1>
<div id="connexion">


<?php
$connexion = mysqli_connect('localhost', 'user', 'password', 'wp_database');
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
		$resultat=mysqli_query($connexion,'SELECT user_login, user_pass FROM wp_users WHERE user_login=\''.$pseudo.'\';');
        $row=mysqli_fetch_assoc($resultat);
		
	if ($row['user_pass'] == ($_POST['password'])) // Acces OK !
	{
	    $_SESSION['pseudo'] = $row['user_login'];
		//header("location: index.php?page=index1.php");
		$message = '<p>Connexion reussie</p>';
		
 		
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
<form method="post" action="#">
	
<table>
<tr>
	<td><label for="pseudo">Pseudo :</label></td>
	<td><input name="pseudo"  type="text" id="pseudo" /><br /></td>
</tr>
<tr>
	<td><label for="password">Mot de Passe :</label></td>
	<td><input type="password" name="password" id="password" /></td>
</tr>
<tr style="text-align:center;">
			<td colspan=2><br/><br/>
			<input type="submit" name="valider" value="Connexion" />
			</td>
</tr>
<tr style="text-align:center;">
			<td colspan=2><br/><br/>
			<div class="choix">
			<a  href="index.php?page=ajout_joueuse_fin.php">Pas encore inscrit ?</a> </div>
			</td>
</tr>
</table>
</form>
</div>

<?php } ?>

