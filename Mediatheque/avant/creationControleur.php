<?php

session_start();

if(isset($_POST["nom"]))
    $nom = $_POST["nom"];

 if(isset($_POST["prenom"]))
    $prenom = $_POST["prenom"];

if(isset($_POST["login"]))
    $login = $_POST["login"];

if(isset($_POST["tel"]))
    $tel = $_POST["tel"];

if(isset($_POST["pass"]))
    $pass = $_POST["pass"];

if(isset($_POST["pass2"]))
    $pass2 = $_POST["pass2"];

$Statut="user";
if($pass2!=$pass){ header("location:creation.php?inscrit=0&errLog=2"); }
else {
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=mediatheque;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}	
$req = $bdd->prepare('SELECT * FROM utilisateur WHERE Email=:login');
$req->bindValue(':login', $login, PDO::PARAM_STR);
$req->execute();
if (FALSE === ($res = $req->fetch()))
{
    $req = $bdd->prepare('INSERT INTO utilisateur (Nom,Prenom,Email,MotDePasse,Statut,Tel )
            VALUES(:nom, :prenom, :login, :mdp,:Statut,:tel)');
    $req->bindValue(':nom', $nom, PDO::PARAM_STR);
    $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $req->bindValue(':login', $login, PDO::PARAM_STR);
    $req->bindValue(':mdp', $pass, PDO::PARAM_STR);
    $req->bindValue(':Statut', $Statut, PDO::PARAM_INT);
	$req->bindValue(':tel', $tel, PDO::PARAM_STR);
    $req->execute();
    header('location:creation.php?inscrit=1&prenom='.$prenom);
	
	$r = $bdd->prepare('SELECT * FROM utilisateur WHERE Email=:login');
    $r->bindValue(':login', $login, PDO::PARAM_STR);
    $r->execute();
	$re = $r->fetch();
	$_SESSION["Prenom"] = $re['Prenom'] ;
	$_SESSION["IDU"]=$re['IDU'];
}
else
{
    header("location:creation.php?inscrit=0&errLog=1");     
}}