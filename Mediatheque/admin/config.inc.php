<?php	
error_reporting(0);

//@header("Content-Type:text/html;   charset=UTF-8");
//les informations pour se connecter à la Base de  donnée.
	mysql_connect("localhost","root","Cheny1006") or die("Connexion au mysql échoue！".mysql_error());
	mysql_select_db("mediatheque");
	mysql_query("SET NAMES UTF8");//pour afficher les caractères n'appartenant pas à l'anglais.


/***********************************************************************/
//Vérifier la connexion d'administrateur

function checkLogin($id)
{
    @session_start();
	if(!isset($_SESSION['id']))
	{
		echo "<script language='javascript'>alert('Connecter SVP！');parent.location.href='index.php';</script>";
	}
	if($id==0)return;
}
?>

