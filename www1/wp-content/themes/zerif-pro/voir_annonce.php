<!DOCTYPE html>
<!-- saved from url=(0036)http://localhost/www/page-d-exemple/ -->
<html lang="fr-CA"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
@import url(//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css);

.detailBox {
    width:500px;
    border:1px solid #bbb;
    margin:50px;
}
.titleBox {
    background-color:#fdfdfd;
    padding:10px;
}
.titleBox label{
  color:#444;
  margin:0;
  display:inline-block;
}

.commentBox {
    padding:10px;
    border-top:1px dotted #bbb;
}
.commentBox .form-group:first-child, .actionBox .form-group:first-child {
    width:80%;
}
.commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
    width:18%;
}
.actionBox .form-group * {
    width:100%;
}
.taskDescription {
    margin-top:10px 0;
}
.commentList {
    padding:0;
    list-style:none;
    max-height:200px;
    overflow:auto;
}
.commentList li {
    margin:0;
    margin-top:10px;
}
.commentList li > div {
    display:table-cell;
}
.commenterImage {
    width:30px;
    margin-right:5px;
    height:100%;
    float:left;
}
.commenterImage img {
    width:100%;
    border-radius:50%;
}
.commentText p {
    margin:0;
}
.sub-text {
    color:#aaa;
    font-family:verdana;
    font-size:11px;
}
.actionBox {
    border-top:1px dotted #bbb;
    padding:10px;
}</style>
<body>

<?php include "barre_navigation.php";?>
	
<div id="content" class="site-content">
	<div class="container" >

		
	</header><!-- .entry-header -->

	
	<div class="entry-content" >




<?php

 if (isset($_POST["ajout"]))
 {
	echo'
		<script>
	   // alert("ajout succes");
		</script>';
		
	$id = $_GET["w1"];	
	//$usr = $_GET["usr"];
	
		//$requete="select ID from wp_users where user_login=\"$usr\"";
		//$res=mysqli_query($connexion, $requete);
		//$row=mysqli_fetch_assoc($res);
		//$id_usr=$row['ID'];
		//echo $id_usr;
		//echo "<br>";
		//echo $id;
		

		//$req = "insert into wp_exp_participe(ID_user, ID_exp) values ('".$id_usr."','".$id."');";
		//$res1=mysqli_query($connexion, $req);
		//if (!$res1) echo "erreur";

//update table commandes pour inserer la date et l'etat de la commande 		
		$requete1="insert into wp_commandes(comm_date, comm_paye) values (NOW(),false)";
		$resultat1=mysqli_query($connexion, $requete1);
		if (!$resultat1) echo "erreur";
		$id_comm=mysqli_insert_id($connexion);
		
//on relie la commande a l'experience		
		$id_exp = $_GET["w1"];
		$requete2="insert into wp_fait_comm(ID_exp, ID_comm) values ('".$id_exp."','".$id_comm."');";
		$resultat2=mysqli_query($connexion, $requete2);
		if (!$resultat2) echo "erreur";	
 }

 if (isset($_SESSION["login"])) 
	 $set = true;//echo 'login ok'; else echo 'login non';

   if (isset($_GET["w1"])){
	   
	   
	   
	    $id = $_GET["w1"];
	   
		$requete1="select ID_exp, exp_sujet, exp_theme_id, exp_lieu_nom, exp_lieu_add, exp_lieu_ville, exp_description, exp_prix, exp_nb_participants, exp_dispo_id from wp_exp where ID_exp=\"$id\"";
		$res1=mysqli_query($connexion, $requete1);
		$row1=mysqli_fetch_assoc($res1);
		
		$id_exp = $row1['ID_exp'];
		$nom_exp = $row1['exp_lieu_nom'];
		
//on cherche a recuperer la personne qui a poste l'annonce

		$requete2="select ID_user, ID_exp from wp_exp_propose where ID_exp=\"$id_exp\"";
		$res2=mysqli_query($connexion, $requete2);
		if (!$res2) echo 'probleme requete';
		$row2=mysqli_fetch_assoc($res2);
		$id_usr = $row2['ID_user'];
		
		$requete3="select ID, user_login from wp_users where ID=\"$id_usr\"";
		$res3=mysqli_query($connexion, $requete3);
		$row3=mysqli_fetch_assoc($res3);
		
		$usr=$row3['user_login'];
		
		echo' 
			<form method="post" action="#">
			<div class="row">
			<div class="col-md-6">
			
				<h2>'.$row1['exp_sujet'].'</h2></br>
				<h4>Propose par : '.$row3['user_login'].'</h4>
				
				<h4>Lieu : '.$row1['exp_lieu_nom'].'</h4>
				<a data-toggle="modal" data-target="#myModal"> <h4>'.$row1['exp_lieu_add'].', '.$row1['exp_lieu_ville'].'</h4></a>
		
				<h4>Prix : '.$row1['exp_prix'].' euros</h4>
				<h4>Nombre de participants : '.$row1['exp_nb_participants'].' personnes</h4>
				<h4>Description : '.$row1['exp_description'].'</h4></div>
			';
			
			
			

		$add = $row1['exp_lieu_add'];
		$array = explode(' ',$add);
		$long = count($array);
		
		$num = $array[0];
		//echo $num;
		$nom = $array[1];
		//echo $nom;
		$nom1 = $array[2];
		$nom2 = $array[3];
			
		//echo "a1";
		//echo $array[0];
		
			
$url='https://maps.google.com/maps?q='.$num.'%2C+'.$nom.'+'.$nom.'+'.$nom2.'%2C+'.$row1['exp_lieu_ville'].'%2C+france&amp;t=m&amp;z=15&amp;output=embed&amp;iwloc=near" ';

}

else echo 'false';
?>
<div class="col-md-6">
<img alt="Bootstrap Image Preview" width="300px" height="300px" src="nature.jpg" />';
<br>
</div>
<!--
<div class="row">
<div class="col-md-6">
<div class="detailBox">
    <div class="titleBox">
      <label>Comment Box</label>
        <button type="button" class="close" aria-hidden="true">&times;</button>
    </div>

    <div class="actionBox">
        <ul class="commentList">
<?php 
	$req3 = "select ID_usr, ID_exp from wp_poste_f";
	$res3=mysqli_query($req3, $connexion);
	$row3=mysqli_fetch_assoc($res3);
	
	?>
	
	
            <li>
                <div class="commenterImage">
                  <img src="http://placekitten.com/50/50" />
                </div>
                <div class="commentText">
                    <p class=""><?php echo "afasf";?></p> <span class="date sub-text">on March 5th, 2014</span>

                </div>
            </li>
            <li>
                <div class="commenterImage">
                  <img src="http://placekitten.com/45/45" />
                </div>
                <div class="commentText">
                    <p class="">Hello this is a test comment and this comment is particularly very long and it goes on and on and on.</p> <span class="date sub-text">on March 5th, 2014</span>

                </div>
            </li>
            <li>
                <div class="commenterImage">
                  <img src="http://placekitten.com/40/40" />
                </div>
                <div class="commentText">
                    <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>

                </div>
            </li>
        </ul>
        <form class="form-inline" role="form">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Your comments" />
            </div>
            <div class="form-group">
                <button class="btn btn-default">Add</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>-->
<?php echo '<button class="btn btn-primary" name="ajout"><span class="glyphicon  glyphicon-shopping-cart"></span> Ajouter au panier</button> ';?>
</div>
</div>
</form>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<!----modal carte--->

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Localisation</h4>
        </div>
        <div class="modal-body">
        <iframe src=<?php echo $url?> width="500" height="350" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
</body>
</html>
