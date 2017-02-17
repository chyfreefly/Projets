<?php
session_start();
?>
<!doctype html PUBLIC "-//W3C//DTD html 4.01 Transitional//EN" >
<html lang="fr">


<head>
	<title>Mediatheque</title>
	<link rel="shortcut icon">
	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script src="js/jquery-1.8.2.js"></script>
	<script src="js/jquery.cycle.all.js"></script>
	<script src="js/main.js"></script>
</head>

<body>

	<div class="page-wrap">
		<div class="top-menu">								
			<?php 
		if(isset($_SESSION["Prenom"]))
		{?>     
		<li> <a href="panier.php" > <img src="images/panier.png" style="width:30px;height:30px" /></a><a>Bienvenu <?php echo $_SESSION["Prenom"]?> !</li></a> <?php }?>	
		</div>
		<div class="clear"></div>
		<div class="main-content">
			<div class="bar">
				<header>
					<h1 class="header"><a>MEDIATHEQUE</a>
					</h1>
					<nav>
					<ul> 			
							<li><a href="index.php">Home Page</a></li> 
							<li><a href="DVD-CD.php">DVD</a></li> 
							<li><a href="livre.php">Livre</a></li> 
							<li><a href="music.php">Music</a></li> 
							<?php 
							if(isset($_SESSION["Prenom"]))
							{
							   ?>     
								 
								<li><a href="deconnect.php">Deconnection</li></a>   
								<li><a href="MonCompte.php">Mon Compte</li> </a> 
							<?php 
							}
							else {
							?>
							<li><a href="connexion.php">Connection|Creer compte</li> </a><?php 
							}?>
							
						</ul>
					</nav>
					
				</header>
			</div>	
			<div class="clear"></div>
			<div class="clear"></div>
			<div class="body-contents">
				<div class="left-body">
				
		</div> 
			<div class="center">
				    <?php if(isset($_GET["inscrit"]) && $_GET["inscrit"]=="1")
					{?> <form class="form-container">
						<h2 > Inscription reussie </h2>
                        <h2> Bienvenu sur Mediatheque <?php echo $_SESSION["Prenom"] ?> !</h2>
						</form>
					<?php
					} 
					else
					{?> 
					  
					  <form id="myForm"  method="post" action="creationControleur.php" class="form-container">
						<div class="form-title"><h2>INSCRIPTION</h2></div>
						<br /> 
						
						<p class="form-title">Nom :</p>
						<input  class="form-field" type="text" name="nom" id="nom" required pattern="^[a-zéèàêâùïüëA-Z]+([ \'-][a-zéèàêâùïüëA-Z']+)*$"
							   value="<?php if(isset($_GET['nom'])) echo $_GET['nom']; ?>" />
						
						<p class="form-title">Prenom :</p>
						<input class="form-field"type="text" name="prenom" id="prenom" required pattern="[a-zéèàêâùïüëA-Z]+\-?[a-zéèàêâùïüëA-Z]+"
							   value="<?php if(isset($_GET['prenom'])) echo $_GET['prenom']; ?>" />
						
						<p class="form-title">Telephone :</p>
						<input  class="form-field" type="text" name="tel" id="tel" required pattern="^0[0-9]{9}"
							   value="<?php if(isset($_GET['tel'])) echo $_GET['tel']; ?>" />
					
						<p class="form-title">Email :</p>
						<input  class="form-field" type="email" name="login" id="login" required 
							   value="<?php if(isset($_GET['login'])) echo $_GET['login']; ?>" />
						
							<?php if(isset($_GET["errLog"]) && $_GET["errLog"]=="1") { ?>
							<p class="errForm">Ce adresee E-mail est deja utilise!</p>
							<?php } ?>
						<br /> 
						<br />
						<p for="form-title">Mot de passe :</p>
						<input  class="form-field" type="password" name="pass" id="pass" required pattern=".{6,20}" />
						<br /> 
						<br />
						<div class="control-group">
						<div class="controls">
						<p for="pass2">Ressaisissez votre mot de passe :</p>
						<input class="form-field"  type="password" name="pass2" id="pass2" required pattern=".{6,20}" />
					    <?php if(isset($_GET["errLog"]) && $_GET["errLog"]=="2") { ?>
							<p class="errForm">Les deux mots de passe doivent etre identiques</p>
							<?php } ?>
						</div>
						</div> 
						<br /> 
						<br />
						<input id="val1" type="submit" value="Envoyer" class="submit-buttontri"/>
					</form>
					<?php } 
					?>
					
							
				</div>
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div><!-- eo .body-content -->
	<footer>
		<div class="footer">
			<div class="footer-left">
				<div class="footer-heading">
					MEDIATHEQUE
				</div>
				<p class="footer-text">Hôtel de ville
										2, Esplanade Pierre-Yves-Cosnier
										94807 Villejuif Cedex<br>
										Tél.: 01 45 59 20 00  </p>
			</div>
			<div class="footer-right">
				<nav>
					<div class="footer-nav">
					<div class="footer-text">
					Horaires d'ouverture
				    </div>
					<a href="#">Lundi, mardi, mercredi : de 8h30 à 12h et de 13h30 à 18h</a>
					<a href="#">Jeudi : accueil central, de 8h30 à 12h et de 13h30 à 18h (autres services accueillant le public : 8h à 12h. fermeture l'après-midi).</a>
					<a href="#">Vendredi : de 8h30 à 12h et de 13h30 à 17h</a>
					<a href="#">Samedi : de 8h30 à 12h</a>
					
					</div>
				</nav>
				<div class="clear"></div>
				
				
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div><!-- eo .footer -->		
	</footer>
	</div><!-- eo .page-wrap-->
	<p class="footer-link">Copyright 2015 | Website Developed By ZHANG Yiran CHEN YANG et Edgar</p>
</body>
</html>