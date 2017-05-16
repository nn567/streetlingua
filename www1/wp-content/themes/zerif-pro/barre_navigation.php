<html lang="fr-CA"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
<style>
.navbar-footer-content { padding:15px 15px 15px 15px; }
.dropdown-menu {
padding: 0px;
overflow: hidden;
}
.navbar-content
{
    width:320px;
    padding: 15px;
    padding-bottom:0px;
}

</style>

<style>
#login-dp{
    min-width: 250px;
    padding: 14px 14px 0;
    overflow:hidden;
    background-color:rgba(255,255,255,.8);
}
#login-dp .help-block{
    font-size:12px    
}
#login-dp .bottom{
    background-color:rgba(255,255,255,.8);
    border-top:1px solid #ddd;
    clear:both;
    padding:14px;
}
#login-dp .social-buttons{
    margin:12px 0    
}
#login-dp .social-buttons a{
    width: 49%;
}
#login-dp .form-group {
    margin-bottom: 10px;
}
.btn-fb{
    color: #fff;
    background-color:#3b5998;
}
.btn-fb:hover{
    color: #fff;
    background-color:#496ebc 
}
.btn-tw{
    color: #fff;
    background-color:#55acee;
}
.btn-tw:hover{
    color: #fff;
    background-color:#59b5fa;
}
@media(max-width:768px){
    #login-dp{
        background-color: inherit;
        color: #fff;
    }
    #login-dp .bottom{
        background-color: inherit;
        border-top:0 none;
    }
}
</style>
   <?php 
   session_start();
   //$_SESSION['login']=$_GET['usr'];
   include "connexion_include.php";
   ?>

<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex2-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./index1.php">Streetlingua</a>
    </div>
    <div class="collapse navbar-collapse navbar-ex2-collapse">
      <ul class="nav navbar-nav">
        <li class="navbar-link"><a href="./index1.php">Accueil</a></li>
		<li class="navbar-link" ><a href="./tableau_de_bord.php">Annonces</a></li>
		<li class="navbar-link"><a href="#">A propos</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right" >
                                    <li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Mon Panier
                                        <b class="caret"></b></a> 
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="navbar-content">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            Mes annonces <br>
															<?php if (isset($_POST["ajout"]))
																		 {
																			$connexion = mysqli_connect('localhost', 'user', 'password', 'wp_database');
																			$id_exp = $_GET['w1'];
																			$requete="select exp_sujet from wp_exp where ID_exp=\"$id_exp\"";
																			$resultat=mysqli_query($connexion,$requete);
																			$row=mysqli_fetch_assoc($resultat);
																			$sujet = $row['exp_sujet'];
																			echo $sujet;
																		 }?>
                                                        </div></div>
														    
                                                </div>
                                                <div class="navbar-footer">
                                                    <div class="navbar-footer-content">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <a href="#" class="btn btn-default btn-sm">Voir pannier</a>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <a href="http://www.jquery2dotnet.com" class="btn btn-default btn-sm pull-right">Payer</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
											
                                        </ul>
										</ul>
										
	<?php if (!isset($_SESSION['login'])) {
	
echo 
	' <ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Connexion</b> <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-12">
								Connexion
								 <form class="form" role="form" method="post" action="#" accept-charset="UTF-8" id="login-nav">
										<label for="pseudo">Pseudo :</label>
										<input name="pseudo"  type="text" id="pseudo" /><br />

										<label for="password">Mot de Passe :</label>
										<input type="password" name="password" id="password" />


										<input id="subBtn" type="submit" name="valider" value="Connexion" />
										<!--<div class="checkbox">
											 <label>
											 <input type="checkbox"> Se souvenir de moi
											 </label>
										</div>
										-->
								 </form>
							</div>
							<div class="bottom text-center">
								<a href="./inscription.php"><b>Inscription</b></a>
							</div>
					 </div>
				</li>
			</ul>
        </li>
	</ul>'; }
	
	else {
                echo ' 								
	<ul class="nav navbar-nav navbar-right" style="margin-right: 15px" >
                                    <li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Mon Profil
                                        <b class="caret"></b></a> 
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="navbar-content">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <img src="http://placehold.it/120x120"
                                                                alt="Alternate Text" class="img-responsive" />
                                                            <p class="text-center small">
                                                                <a href="#">Changer Photo</a></p>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <span>Nom Prenom</span>
                                                            <p class="text-muted small">
                                                                mail@gmail.com</p>
                                                            <div class="divider">
                                                            </div>
                                                            <a href="#" class="btn btn-primary btn-sm active">Voir Profil</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="navbar-footer">
                                                    <div class="navbar-footer-content">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <a href="#" class="btn btn-default btn-sm">Changer mdp</a>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <form action="deconnexion.php" method="POST" >
																<input type="submit" class="btn btn-default btn-sm pull-right" value="Deconnexion"/>
																</form>
																
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
											
                                        </ul>
	</ul>
	
	';
	}?>
										
 </div>
 
  </div>
  
</nav>

<script>
deconnexion.addEventListener(deconnexion(),click);
</script>
