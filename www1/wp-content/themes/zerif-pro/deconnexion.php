<?php 
session_start();
if (isset($_SESSION['login']))
{
	session_destroy();

	header('Location: index1.php');
}
	echo "deconnexion reussie";
?>