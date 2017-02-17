<?php
    session_start();
?>
<!doctype html PUBLIC "-//W3C//DTD html 4.01 Transitional//EN" >
<html>


<head>
	<title>Mediatheque</title>
	<link rel="shortcut icon">
	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script src="js/jquery-1.8.2.js"></script>
	<script src="js/jquery.cycle.all.js"></script>
	<script src="js/main.js"></script>
	<script src="script.js"></script>
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
		<div id='cssmenu'>
<ul>
   <li class='active'><a href="MonCompte.php"><span>Mon Compte</span></a></li>
   <li class='has-sub'><a href='#'><span>Les Emprunts</span></a>
      <ul>
         <li><a href="MonCompteControleur.php?action=histoir"><span>Historique</span></a></li>
         <li><a href="MonCompteControleur.php?action=emprunts"><span>Les emprunts courants</span></a></li>
      </ul>
   </li>
      <li class='last'><a href="MonCompteControleur.php?action=modifier"><span>Modifier Mon Compte</span></a></li>
</ul>
</div>
		
		</div> 
        <div class="center">
        <?php
        include("config.inc.php");

        $req = $bdd->prepare('SELECT * FROM utilisateur WHERE IDU='.$_SESSION["IDU"].' ');
		$req->execute();
		$donnees = $req->fetch();
		$r = $bdd->prepare('SELECT * FROM emprunt WHERE StatutE="Emprunt" and IDU='.$_SESSION["IDU"]. '');
		$r->execute();
		
	    ?>
		<table  class="CSSTableGenerator">
		<tr><td><span class="titre"></span><span><?php echo $donnees['Prenom'];?>.</span><span><?php echo $donnees['Nom'];?></span></td>
		</tr>
 		<tr><td><span class="titre">Mot de passe: </span><span class="description"><?php echo $donnees['MotDePasse'];?></span></td></tr>
		<tr><td><span class="titre">Tel: </span><span class="description"><?php echo $donnees['Tel'];?></span></td></tr>
		<tr><td><span class="titre">Email: </span><span class="description"><?php echo $donnees['Email'];?></span></td></tr>
        <tr><td><span class="titre">Penalite: </span><span class="description"><?php 
		$penalite=0;
		while($f = $r->fetch()){
		$date=floor((strtotime(date('Y-m-d'))-strtotime($f['DateEmprunt']))/86400);
		if($date>30){$penalite=$penalite+$date-30;}
		} 
		 echo $penalite;
		 ?>€</span></td></tr>
		</table>
		</div>
		<div class="right">
		
				<div class="clear"></div>
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