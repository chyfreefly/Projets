<?php
session_start();
?>
<!doctype html PUBLIC "-//W3C//DTD html 4.01 Transitional//EN" >
<html lang="fr">


<head>
	<title>Médiathèque</title>
	<link rel="shortcut icon">
	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link href="./css/WebStyle.css" rel="stylesheet" type="text/css" />
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

                $req = $bdd->prepare('SELECT DISTINCT * FROM ressource,music WHERE type="music" and IDR=IDM and IDR >((SELECT MAX(IDM)FROM music )-2) ');
				$req->execute();
				$livres = array();?>
				
               <table  style="background-color:White">
			   <tr>
			   <?php while ($donnees = $req->fetch()) {?>
				
				<table>
				
					<tr>
					<?php if($donnees['Type']=="livre") {?>
					<a href="blanc.php?article_id=<?php echo $donnees['IDR']?>"><img src=<?php echo $donnees['Image'] ?> width="120" height="180"><br></a>
					<?php }?>
					<?php if($donnees['Type']=="music") {?>
					<a href="blancM.php?article_id=<?php echo $donnees['IDR']?>"><img src=<?php echo $donnees['Image'] ?> width="120" height="180"><br></a> 
					<?php }?>
					<?php if($donnees['Type']=="dvd") {?>
					<a href="blancD.php?article_id=<?php echo $donnees['IDR']?>"><img src=<?php echo $donnees['Image'] ?> width="120" height="180"><br> </a>
					<?php }?>

					
					</tr>
					<tr>
						<span class="titre"><?php echo $donnees['Titre'] ?></span>
					</tr>
					<tr>
					    <p>by<span class="green-text"><?php echo $donnees['Artiste'] ?></span></p>
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
		<?php
	
				   $res = $bdd->prepare('SELECT * FROM ressource,music WHERE IDR=IDM and IDR='.$_GET['article_id']);
				   $res->execute();
                   $info = $res->fetch();
						echo '<form action="panier.php" type="post"">';
						echo '<br>';
						echo'<img src=' .$info['Image']. ' width=200 height=280/><br>';
						echo '<br>';
						echo '<p><span class="titre"><input type="text" name="l" id="l" value='.$info['Titre'].'></span></p>';
						echo '<br>';
						echo '<p>by<span class="green-text">'.$info['Artiste'].'</span></p>';
						echo '<br>';
						echo '<p>Price: <span class="titre"><input type="text" name="p" id="p" value='.$info['Prix'].'></span></p>';
						echo '<p style="visibility: hidden"> <span class="titre"><input type="text" name="r" id="r" value='.$info['IDR'].'></span></p>';
						
						
						echo '<p><span class="titre">AnneeSortie: '.$info['AnneeSortie'].'</span></p>';
						echo '<br>';
						echo '<p><span class="titre">Editeur: '.$info['EditeurM'].'</span></p>';
						echo '<div class="border"></div>';
						echo '<p><span class="description">'.$info['Description'].'</span></p>';
						echo '<br>';
						echo '<audio controls>
							  <source src=' .$info['Ressource']. ' type="audio/mpeg">
							  Your browser does not support the audio element.
							  </audio>
							  <br>';
						echo '<br>';
						echo '<p style="visibility: hidden"><span class="titre"><input type="text" name="q" id="q" value=1></span></p>';

						try
							{
								$bdd = new PDO('mysql:host=localhost;dbname=mediatheque;charset=utf8', 'root', 'root');
							}
							catch (Exception $e)
							{
									die('Erreur : ' . $e->getMessage());
							}
							$p = $bdd->prepare('select * from exemplaire where Etat=1 and IDR='.$info['IDR'].'');
							$p->execute();
							if (FALSE === ($resultat = $p->fetch()))
							{
							  echo '<input type="button" class="ButtonNonDisponible" name="action" value="Non disponible"/></form>';
							}else{
						    echo '<input type="submit" class="ButtonAjout" name="action" value="ajout"/></form>';}
						
		?>
		
		<?php
		if(isset($_SESSION['IDU'])) {
	   $bd_commentaire = $bdd->prepare('select * from commentaire,utilisateur where idR='.$_GET['article_id'].' and commentaire.IDU=utilisateur.IDU');
		$bd_commentaire->execute();

      ?>
		
		  <table   class="commentaire" style="border: #CCC dashed 1px; margin-bottom:20px"  width="500px"> 
<?php $i=0;
			
		if($result_commentaire = $bd_commentaire->fetch()){//ignorer  les warning 
		
		echo"<tr>";
					echo "<td class='cell1'>";
				 
					echo "<p><br/>".$i." étage</p>";
					echo "<hr class='hr0' /><br/>";
					
					//Générer l'adresse de page des contributions d'un internaute
					echo "Utilisateur: $result_commentaire[Prenom]";
					echo "</td>";					
					echo "<td class='cell2'>";
					echo "Publié le ".$result_commentaire['dateC'];
					echo "<hr class='hr0' />";

					echo	 $result_commentaire['texte']."</td>";
					echo "</tr>";
				while($result_commentaire = $bd_commentaire->fetch())//obtenir  tous les données de commentaire
				{
					
					$i++;	//pour afficher le numéro de commentaire 												
					echo"<tr>";
					echo "<td class='cell1'>";
				 
					echo "<p><br/>".$i." étage</p>";
					echo "<hr class='hr0' /><br/>";

					//Générer l'adresse de page des contributions d'un internaute
					echo "Utilisateur: $result_commentaire[Prenom]";
					echo "</td>";
					echo "<td class='cell2'>";
					echo "Publié le ".$result_commentaire['dateC'];
					echo "<hr class='hr0' />";

					echo	 $result_commentaire['texte']."</td>";
					echo "</tr>";
					
				}				
		
      	 }
		else
		{echo "<tr><td>Il n'y a pas de commentaire.Veuillez ajouter un commentaire SVP.</td></tr>";}		
			?>
		  </table>			
		  <table  class="formulaire" >
		  <tr >
		  <td style="text-align: center;">Commenter
		  <?php
				if(isset($_POST['texte']))
				{
				$texte=$_POST['texte'];//Pour obtenir le texte de commentaire
				date_default_timezone_set("Europe/Paris");//la date de commentaire 
				$DateC=date("m/d/Y_H:i:s");
				//Insérer les commentaires dans la table de la base de données 
				if(isset($_SESSION['IDU']))
			   $sql = $bdd->prepare('insert into commentaire(idU,idR,dateC,texte) values ("'.$_SESSION['IDU'].'","'.$info['IDR'].'","'.$DateC.'","'.$texte.'")');
				if($sql->execute())//envoyer la commande à la base de données 
		  		{
					//Actualiser la page après une réaction
					echo "Réagir reussir!<meta http-equiv='refresh' content='0; url=$_SERVER[PHP_SELF]?article_id=$_GET[article_id]'>";
				}
				else
				{
					
					echo "Entrez votre commentaire,S'il vous plaît.";
				}		  
		  		}		  	  
		  ?>
		 		  </td>
    	</tr>
    	</table>
		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="commentaire ">				
					
					<p><textarea name="texte" id="texte" cols="68" rows="10"  width="500px"></textarea></p>		
			 <p>
					<label>
				<input type="submit" class="commentaireA" name="button" id="button" value="Réagir " />
				</label>	
			 </p>
						  
			</form>
  <?php    }      ?>
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