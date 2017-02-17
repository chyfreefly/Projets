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
				<div class="the-latest">					
					<div class="txthead">Les Nouveaux</div>
                <?php
                include("config.inc.php");

                $req = $bdd->prepare('SELECT DISTINCT * FROM ressource,dvd WHERE type="dvd" and IDR=IDD and IDR >((SELECT MAX(IDD)FROM dvd )-2) ');
				$req->execute();
				$livres = array();?>
				
               <table  style="background-color:White">
			   <tr>
			   <?php while ($donnees = $req->fetch()) {?>
				
				<table>
				
					<tr>
						<a href="blancD.php?article_id=<?php echo $donnees['IDR']?>"><img src=<?php echo $donnees['Image'] ?> width="120" height="180"><br>
					</tr>
					<tr>
						<span class="titre"><?php echo $donnees['Titre'] ?></span>
					</tr>
					<tr>
					    <p>by<span class="green-text"><?php echo $donnees['Acteur'] ?></span></p>
					</tr>
					<div class="border"></div>
					<tr>
					<div>
					   <p><span class="description"> <?php echo$donnees['Description'] ?></span></P>
					</div>
					</tr>
					
					<div class="green-border"></div>
				</table>			
				 <?php } ?>
				 <tr>
				 </table>
			</div>
		</div> 
				<div class="center">
		<div class="center">
		    <p ><a href="DVD-CD.php" class="txthead">Categorie>><span class="categorie"><?php echo$_GET['catD_id'] ?></p>
	        <?php
               $com=0;
			   require("config.inc.php");
				$req = $bdd->prepare('SELECT * FROM ressource,dvd WHERE type="dvd" and IDR=IDD and GenreD="'.$_GET['catD_id'].'"');
				$req->execute();
				
				?>
            <table  style="background-color:White">
			   <?php
			    while ($donnees = $req->fetch()) {
			      ?>
				   <?php 
				 if(fmod($com,3)==0){echo '<tr>';}
				 ?>
				<td>
				<table>
					<tr>
						<?php 
						
						echo '<a href="blancD.php?article_id='.$donnees['IDR'].'"><img src=' .$donnees['Image']. ' width=120 height=180/><br>';
						
						?>
					</tr>
					<tr>
					    <?php echo $donnees['Titre'] ?>
					</tr>
					<tr>
						<td width="120"><p class="description">by<span class="green-text"><?php echo $donnees['Acteur'] ?></span></p></td>
					</tr>
					<tr>
					    <p><span class="description"> <?php echo $donnees['Prix'] ?>€</span></P>
						
					</tr>
					
				</table>
				 </td>				
				<?php 
				 if(fmod($com,3)==2){echo '</tr><br>';}
				 $com=$com+1;
				 } ?>
				</tr>
				 </table>
		<div class="clear"></div>
		
			</div>
			</div>
		<div class="right">
		<div class="txthead"> LES PLUS POPULAIRE </div>
						
				 <?php
			
					$populaire = $bdd->prepare('select distinct IDR,count(IDR)as nb from exemplaire where Etat=0 group by IDR order by nb desc limit 5');
					$populaire->execute();
				 ?>
				 <table>
				 <tr>
				   <?php while ($p = $populaire->fetch()) {?>
					<table>
						<tr>
						<?php
						$getp = $bdd->prepare('select * from ressource where IDR='.$p['IDR'].'');
						$getp->execute();
						$getpnom = $getp->fetch();
						?>
						<?php if($getpnom['Type']=="livre"){?>
						<p><span class="number"><?php echo $p['nb']?> </span> <span class="green-popular-text"><a href="blanc.php?article_id=<?php echo $p['IDR']?> ">
						<?php echo $getpnom['Titre'];}?></a></p>
						<?php if($getpnom['Type']=="music"){?>
						<p><span class="number"><?php echo $p['nb']?> </span> <span class="green-popular-text"><a href="blancM.php?article_id=<?php echo $p['IDR']?> ">
						<?php echo $getpnom['Titre'];}?></a></p>
						<?php if($getpnom['Type']=="dvd"){?>
						<p><span class="number"><?php echo $p['nb']?> </span> <span class="green-popular-text"><a href="blancD.php?article_id=<?php echo $p['IDR']?> ">
						<?php echo $getpnom['Titre'];}?></a></p>
						
				        <div class="r-border"></div>
						
						</tr>
						</tr>
					</table>			
					 <?php } ?>
					 <tr>
					 </table>
				
					 <tr>
					 </table>
				
			
			<div class="txthead">Nouveaux Commentaire</div>
			
			
			 <?php
		
				$r = $bdd->prepare('SELECT DISTINCT * FROM commentaire WHERE idc >((SELECT MAX(idc)FROM commentaire )-3) ');
				$r->execute();
				?>
               <table>
			   <tr>
			   <?php while ($d = $r->fetch()) {?>
				<table>
					<tr>
					<?php
					$getNom = $bdd->prepare('SELECT Prenom FROM utilisateur WHERE IDU='.$d['idU'].'');
				    $getNom->execute();
					$nom = $getNom->fetch();
					
					$getTitre = $bdd->prepare('SELECT * FROM ressource WHERE IDR='.$d['idR'].'');
				    $getTitre->execute();
					$titre = $getTitre->fetch();
					?>
					<div class="twitbackgrnd">
					<div class="twitcontents">
					<?php if ($titre['Type']=="livre"){?>
					<a href="blanc.php?article_id=<?php echo $d['idR']?>"><span class="green-popular-text" >@<?php echo $titre['Titre']?>:<span class="number"><?php echo $d['texte'] ?></span><br><span class="green-popular-text" >From <?php echo $nom['Prenom']?></div></a>
					<?php }?>
					<?php if ($titre['Type']=="music"){?>
					<a href="blancM.php?article_id=<?php echo $d['idR']?>"><span class="green-popular-text" >@<?php echo $titre['Titre']?>:<span class="number"><?php echo $d['texte'] ?></span><br><span class="green-popular-text" >From <?php echo $nom['Prenom']?></div></a>
					<?php }?>
					<?php if ($titre['Type']=="dvd"){?>
					<a href="blancD.php?article_id=<?php echo $d['idR']?>"><span class="green-popular-text" >@<?php echo $titre['Titre']?>:<span class="number"><?php echo $d['texte'] ?></span><br><span class="green-popular-text" >From <?php echo $nom['Prenom']?></div></a>
					<?php }?>
					<div class="twitcontents">
					
					</div>
					</tr>
					</tr>
				</table>			
				 <?php } ?>
				 <tr>
				 </table>
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