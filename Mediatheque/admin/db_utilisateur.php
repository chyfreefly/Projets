﻿<?php 
include('config.inc.php');
$action=$_GET['action'];

if($action=='del')
{
	$id=trim($_GET['id']);
	mysql_query("delete from utilisateur where IDU=".$id.";");
	echo "<script language='javascript'>alert('Supprimer reussi!');location.href='utilisateur.php';</script>";
}elseif($action=='debloquer') {
   $id=trim($_GET['id']);
   mysql_query("update utilisateur set bloque='0' where IDU=$id");
   echo "<script language='javascript'>alert('Débloquer utiisateur reussi！');window.location.href='utilisateur.php';</script>";
}
else
{}
?>