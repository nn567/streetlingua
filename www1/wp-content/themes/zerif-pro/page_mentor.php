<!DOCTYPE html>
<!-- saved from url=(0036)http://localhost/www/page-d-exemple/ -->
<html lang="fr-CA"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>

body{
    background:#eee;
}

hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid #FFFFFF;
}
a {
    color: #82b440;
    text-decoration: none;
}
.blog-comment::before,
.blog-comment::after,
.blog-comment-form::before,
.blog-comment-form::after{
    content: "";
	display: table;
	clear: both;
}

.blog-comment{

}

.blog-comment ul{
	list-style-type: none;
	padding: 0;
}

.blog-comment img{
	opacity: 1;
	filter: Alpha(opacity=100);
	-webkit-border-radius: 4px;
	   -moz-border-radius: 4px;
	  	 -o-border-radius: 4px;
			border-radius: 4px;
}

.blog-comment img.avatar {
	position: relative;
	float: left;
	margin-left: 0;
	margin-top: 0;
	width: 65px;
	height: 65px;
}

.blog-comment .post-comments{
	border: 1px solid #eee;
    margin-bottom: 20px;
    margin-left: 85px;
	margin-right: 0px;
    padding: 10px 20px;
    position: relative;
    -webkit-border-radius: 4px;
       -moz-border-radius: 4px;
       	 -o-border-radius: 4px;
    		border-radius: 4px;
	background: #fff;
	color: #6b6e80;
	position: relative;
}

.blog-comment .meta {
	font-size: 13px;
	color: #aaaaaa;
	padding-bottom: 8px;
	margin-bottom: 10px !important;
	border-bottom: 1px solid #eee;
}

.blog-comment ul.comments ul{
	list-style-type: none;
	padding: 0;
	margin-left: 85px;
}

.blog-comment-form{
	padding-left: 15%;
	padding-right: 15%;
	padding-top: 40px;
}

.blog-comment h3,
.blog-comment-form h3{
	margin-bottom: 40px;
	font-size: 26px;
	line-height: 30px;
	font-weight: 800;
}</style>
<body>

<?php include "barre_navigation.php";?>
	
<div id="content" class="site-content">
	<div class="container" >

		
	</header><!-- .entry-header -->

	
	<div class="entry-content" >
	
<?php 
	if (isset($_SESSION['login']))
	{
//recuperer annonces

		$usr = $_SESSION['login'];
		$requete="SELECT ID FROM wp_users where user_login=\"$usr\"";
		$result= mysqli_query($connexion, $requete);
		$row=mysqli_fetch_assoc($result);
		$id_usr=$row['ID'];	
		
		$requete2 = "SELECT * from wp_exp where ID_exp in (select ID_exp from wp_exp_propose where ID_user =\"$id_usr\")";
		$result2= mysqli_query($connexion, $requete2);

		//recuperer id_feedbacks 
		

	
?>
<div id="content" class="site-content">
	<div class="container" >
	<div class="entry-content" >
	
	<div class="row">
		<div class="col-md-6">
			<h1>Mes annonces </h1>
			<h3>
			<div class="container-fluid well span6">
			<?php
						while ($row2=mysqli_fetch_assoc($result2))
						{
			echo '
			
				<div class="row-fluid">
					<div class="span2" >
						<img style="float:left" width="100px" height="100px" src="nature.jpg" class="img-circle">
					</div>
					
					<div class="span8">
						<h3>'; echo $row2['exp_sujet']; echo '</h3>
						<h6>Lieu: '; 
						echo $row2['exp_lieu_nom'];
						echo '</h6>
						<h6>Prix: '; 
						echo $row2['exp_prix'];
						echo 
						' euros </h6>
						<h6>Date: dd/mm/yy</h6>	
					</div>
					
					<div class="span2">

                <a class="btn btn-info" data-toggle="dropdown" href="#">
                    Modifier l\'annonce
             
                </a>
				
                <a class="btn btn-danger" data-toggle="dropdown" href="#">
                    Supprimer l\'annonce
                    
                </a>
			</div>
			</div>	';	
			

				}
			?>
			</h3>
		</div>
		
		<div class="col-md-6">
		<h1>Feedbacks</h1>
			<div class="row-fluid">
		    <div class="blog-comment">
				
                <hr/>
				<ul class="comments">
				<?php
			$req3 = "select ID_user, ID_exp, ID_feed from wp_poste_f where ID_exp in (select ID_exp from wp_exp_propose where ID_user =\"$id_usr\")";
			$res3=mysqli_query($connexion,$req3);
			while($row3=mysqli_fetch_assoc($res3))
			{
				$feed_id=$row3['ID_feed'];
				$usr_id = $row3['ID_user'];
				$exp_id=$row3['ID_exp'];
				
				//recupere feedbacks
				$req4="select feed_texte, feed_date from wp_feedback where ID_feed=\"$feed_id\"";
				$res4=mysqli_query($connexion,$req4);
				$row4=mysqli_fetch_assoc($res4);
				
				
				//recupere personne qui a poste le fb
				
				$req5="select user_login from wp_users where ID=\"$usr_id\"";
				$res5=mysqli_query($connexion,$req5);
				$row5=mysqli_fetch_assoc($res5);
				
				//recupere experience
				
				$req6="select exp_sujet from wp_exp where ID_exp=\"$exp_id\"";
				$res6=mysqli_query($connexion,$req6);
				$row6=mysqli_fetch_assoc($res6);
				echo '
				<li class="clearfix">
				  <img src="http://bootdey.com/img/Content/user_2.jpg" class="avatar" alt="">
				  <div class="post-comments">
				      <p class="meta">';
					    echo $row4['feed_date'];
						
						echo'<a href="#"> ';
					  echo $row5['user_login'];
					  echo'
					 </a>  a commente sur l\'annonce <a>'; echo $row6['exp_sujet']; echo'</a>
				      <p>';
					  echo $row4['feed_texte'];
				     echo'     
				      </p>
				  </div>
				
				  
				</li>';
				
		}		
	}?>
				
				</ul>
			</div>
		</div>

			
		</div>
		
		
	</div>
	<div class="row">
	<div class="col-md-8">

		<a href="ajout_annonce.php" class="btn btn-primary">Ajouter une annonce</a>
</div>
	</div>
	
	


