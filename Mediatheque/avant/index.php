<?php
    session_start();
?>
<!doctype html PUBLIC "-//W3C//DTD html 4.01 Transitional//EN" >
<html lang="fr">


<head>
	<title>MEDIATHEQUE</title>
	
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
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
		<li><a>Bienvenu <?php echo $_SESSION["Prenom"]?> !</li></a> <?php }?>	
		</div>
		<div class="clear"></div>
		<div class="main-content">
			<div class="bar">
				<header>
					<h1 class="header"><a>Mediatheque</a>
					</h1>
					<nav>
					<ul> 			
							<li><a href="index.php">HOME PAGE</a></li> 
							<li><a href="DVD-CD.php">DVD</a></li> 
							<li><a href="livre.php">LIVRE</a></li> 
							<li><a href="music.php">MUSIC</a></li> 
							
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
			 <?php
			require("config.inc.php");	
				
				$bdd = connect_db();	
				$reqc = $bdd->prepare("select * from article where publish='YES' order by idA desc limit 0,6");
				$reqt = $bdd->prepare("select * from article where publish='YES' order by idA desc limit 0,6");
			//	limiter le nombre maximum de coup du coeur est 6
				$reqc->execute();
				$reqt->execute();
				//$livres = array();
				 $i=0;
				 $j=0;
				?>
				
      <div class="clear"></div>
      <div class="backgrnd-image">
			   <?php while ($coupducoeur = $reqc->fetch()) {
					  $i++ 	
			   	?>
											<!--afficher les images-->
			 <a  href="coupducoeur.php?coupducoeur_id=<?php echo $coupducoeur['idA']; ?>"  class="slide<?php echo $i;?>" ><img  src=<?php echo $coupducoeur['image'];?> width="1000" height="350"/></a> 

            <?php } ?>
				</div>
			
				<ul id="main">
				  <?php while ($coupdutext = $reqt->fetch()) {
						 $j++ 
			   	?>
					<li class="slide<?php echo $j;?>">
						<a href="coupducoeur.php?coupducoeur_id=<?php echo $coupdutext['idA']; ?>"><!--lien pour l'information-->
						<span class="arrow"></span>
						<span class="scroll-header"><?php echo $coupdutext['title'];?></span> </br>
						<p><?php echo substr($coupdutext['content'],0,30);?></p>
               <!--obtenir une premiere partie de contexte d'une texte de longeur 30-->
					</a></li>
					<?php }?>
				</ul>
				 
			
			
			<div class="clear"></div>
			<div class="body-contents">
				<div class="left-body">
				<div class="the-latest">					
                 <div class="txthead">LES NOUVEAUX</div>
			    <?php
		
				
				
				$req = $bdd->prepare('SELECT DISTINCT * FROM ressource WHERE IDR >((SELECT MAX(IDR)FROM ressource )-2) ');
				$req->execute();
				$livres = array();?>
				
               <table  style="background-color:White">
			   <tr>
			   <?php while ($donnees = $req->fetch()) {?>
				
				<table>
				
					<tr>
					<?php if($donnees['Type']=="livre") {?>
					<a href="blanc.php?article_id=<?php echo $donnees['IDR']?>"><img src=<?php echo $donnees['Image'] ?> width="120" height="180"><br>
					<?php }?>
					<?php if($donnees['Type']=="music") {?>
					<a href="blancM.php?article_id=<?php echo $donnees['IDR']?>"><img src=<?php echo $donnees['Image'] ?> width="120" height="180"><br> 
					<?php }?>
					<?php if($donnees['Type']=="dvd") {?>
					<a href="blancD.php?article_id=<?php echo $donnees['IDR']?>"><img src=<?php echo $donnees['Image'] ?> width="120" height="180"><br> 
					<?php }?>

					
					</tr>
					<tr>
						<span class="titre"><?php echo $donnees['Titre'] ?></span>
					</tr>
					<tr>
					    <p>In<span class="green-text"><?php echo $donnees['AnneeSortie'] ?></span></p>
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
		   <div class="txthead">BEST OFFERS</div>
		   <div  class="clear"></div>
				<a href="livre.php" class="center-img"><img src="images/book.jpg" width="472" height="220">
			<div class="black-border">
				<p> LIVRE </p> 
			</div></a>
		    <a href="music.php" class="center-img">
				<img src="images/music.jpg" width="472" height="220">
				<div class="black-border"><p> MUSIC</p> 
				</div>
			</a>
			<div  class="clear"></div>
				<a href="DVD-CD.php" class="center-img"><img src="images/movie.jpg" width="472" height="220"><div class="black-border">
				<p> MOVIE </p> 
			</div></a>
		
		
		<div class="clear"></div>
		<div class="green-button">INTERESTING ARTICLE</div>
			<p class="grey-text">	Designer Edmar Cisneros has an interesting and unique philosophy regarding design that. It’s always entertaining to explore the works of a great caricature artist. This showcase from Web Designer Depot features some amazing and hilarious caricatures from Athony Geoffroy. This showcase from Web Designer Depot.
				</p>
		<div class="green-text"><a href="#">Read more...</a></div>
			</div>
				
		<div class="right">
		
        <form id="recherche" method="post" action="recherche.php" class="description">
		<input type="text" name="recherche" id="recherche" required placeholder="What are you looking for?"/>
		
		</form>


			
										
		<div  class="clear"></div>
				
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
	</div><!-- eo .body-content -->
	<footer>
		<div class="footer">
			<div class="footer-left">
				<div class="footer-heading">
					DEAD STOCKER
				</div>
				<p class="footer-text">The best blog about fashion.We love fashion and we cant't live without it.See the latest news and reviews</p>
			</div>
			<div class="footer-right">
				<nav>
					<div class="footer-nav">
					<a href="#">DEAD SPACER</a>
					<a href="#">DEAD ZONE</a>
					<a href="#">RACK SNATCH</a>
					<a href="#">TAGGER WATCH</a>
					<a href="#">ADVERTISE</a>
					<a href="#">PRIVACY POLICY</a>
					<a href="#">TERMS OF USE</a>
					</div>
				</nav>
				<div class="clear"></div>
				<div class="abt-ths-site-footer">
					<h5><a href="#">ABOUT THIS SITE</a></h5>
					<p class="footer-text-border">The best blog about wine
					and we can't live without it.See always the latest news and reviews.</p>
				</div>
				<div class="subscription-footer">
					<h5><a href ="#">SUBSCRIBE</a></h5>
					<p class="footer-text-border">Follow us: <a href="http://twitter.com/sumeetchawla/"><img src="images/twitter.png"> Twitter </a> <a href ="http://www.facebook.com/codepal"><img src="images/fb.png"> Facebook</a> <a href="http://feeds.feedburner.com/code-pal/"><img src="images/rss.png"> RSS</a></p>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div><!-- eo .footer -->		
	</footer>
	</div><!-- eo .page-wrap-->
	<p class="footer-link">Copyright 2015 | Website Developed By Yiran ZHANG,  Yang CHEN et Edgar FOLY
</body>
</html>