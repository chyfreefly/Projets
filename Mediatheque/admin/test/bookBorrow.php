<?php session_start();?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link href="css/style1.css" rel="stylesheet">
		<script language="javascript">
		function checkutilisateur(form){
			if(form.email.value==""){
				alert("Entrer le Email d'utilisateur SVP!");form.email.focus();return;
			}
			form.submit();
		}
		function checkRessource(form){
			if(form.email.value==""){
				alert("Entrer le Email d'utilisateur SVP!");form.email.focus();return;
			}		
			if(form.inputkey.value==""){
				alert("Entrer le ID Ressource SVP!");form.inputkey.focus();return;
			}

			if(form.nombre.value-form.empruntNombre.value<=0){//fonction pour limiter le nombre maximum d'emprunt
				alert("Vous ne pouvez pas emprunter d'autres Ressource!");return;
			}
        form.submit();
	   }
		</script>
</head>
<body>
<table width="776"  border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><table width="100%" height="509"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tableBorder_gray">
  <tr>
    <td align="left" valign="top" style="padding:5px;"> &nbsp; <span class="word_orange">&nbsp;Localisation Actuelle：Emprunt et Retour &gt; Emprunt&gt;&gt;&gt; </span>      <table width="100%"  border="0" cellpadding="0" cellspacing="0">
	<?php
       include("config.inc.php"); 
		$sql=mysql_query("select * from utilisateur where Email='".$_POST[email]."'");
		$info=mysql_fetch_array($sql);
		$sqlsys=mysql_query("select * from systeme where id = '1'");
		$infoSystem=mysql_fetch_array($sqlsys);
//		$utilisateurId=$_POST[utilisateurId];
	?>
	<form name="form1" method="post" action="">
        <tr>
          <td height="72" align="center" valign="top" background="Images/main_booksort_1.gif" bgcolor="#F8BF73">
          <br>		  
          <table width="96%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#9ECFEE" class="tableBorder_grey">
          <tr>
              <td height="33" valign="top" background="Images/bookborr.gif">
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  
				
                    <tr>
                      <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="33" background="Images/bookborr.gif">&nbsp;</td>
                        </tr>
                      </table>
                        <table width="100%" height="21" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="24%" height="18" style="padding-left:7px;padding-top:7px;"><img src="Images/bg_line.gif" width="132" height="20"></td>
                            <td width="76%" style="padding-top:7px;">Email d'utilisateur：
                              <input name="email" type="text" id="email" size="24" value="<?php echo $info[Email];?>">
                            &nbsp;
                              <input name="Button" type="button" class="btn_grey" value="Confirmer" onClick="checkutilisateur(form1)"></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="13" align="left" style="padding-left:7px;"><hr width="90%" size="1"></td>
                      </tr>
                    <tr>
                      <td align="center"><table width="96%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="27">Nom：
                              <input name="nom" type="text" id="nom" value="<?php echo $info[Nom];?>">
                              <input name="utilisateurId" type="hidden" id="utilisateurId" value="<?php echo $info[IDU];?>"></td>
                            <td>Prenom
                              <input name="prenom" type="text" id="prenom" value="<?php echo $info[Prenom];?>"></td>
                          </tr>
                          <tr>
                          <td height="27">Tel：
                              <input name="tel" type="text" id="tel" value="<?php echo $info[Tel];?>"></td>
  <!--改成还剩几本书可以借-->    <td>Nombre limite d'emprunt：
                              <input name="nombre" type="text" id="nombre" value="<?php echo $infoSystem[valeur];?>" size="17">
                              </td>
                          </tr>
                      </table></td>
                    </tr>
                </table></td>
            </tr>
                 <tr>
                   <td height="32">&nbsp;Emprunter par：
                     <input name="f" type="radio" class="noborder" value="IDR" checked>
                     Id Ressource &nbsp;&nbsp;
                     <input name="inputkey" type="text" id="inputkey" size="50"><!--借书搜索栏的值-->
                     <input name="Submit" type="button" class="btn_grey" id="Submit" onClick="checkRessource(form1);" value="Confirmer">
                     <input name="operator" type="hidden" id="operator" value="<?php echo $_SESSION[adminname];?>">
    <input name="Button2" type="button" class="btn_grey" id="Button2" onClick="window.location.href='bookBorrow.php'" value="Reset">                   </td>
                 </tr> 
            <tr>
              <td valign="top" bgcolor="#D2E5F1" style="padding:5px"><table width="99%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9ECFEE" bgcolor="#FFFFFF">
                     <tr align="center" bgcolor="#E2F4F6">
                       <td width="20%" height="25">Titre</td>
                       <td width="12%">Date d'emprunt</td>
                       <td width="14%">Date limite de retour</td>
                       <td width="17%">Type</td>
                       <td width="14%">Emplacement</td>
                       <td width="10%">Prix(€)</td>
                       <td colspan="2">Opération</td>
                     </tr>
<?php
$utilisateurId=$info[IDU];
$sql1=mysql_query("select * from emprunt,exemplaire,ressource where emprunt.IDU='$utilisateurId' and emprunt.IDEX =exemplaire.IDEX and exemplaire.IDR=ressource.IDR and emprunt.StatutE !='Retour' ");
$info1=mysql_fetch_array($sql1);

$empruntNombre=mysql_num_rows($sql1);     //获取结果集中行的数目

		
do{
	if($info1[DateEmprunt] !=null) {
	$DateLimiteRetour=date("Y-m-d",strtotime("$info1[DateEmprunt]+ 30 days"));        //归还图书日期为当前期日期+30天期限
   }
   else {
	$DateLimiteRetour=null;
   }
	/*if($info1==false) {
	  $Operation=null;}
	else if(isset($info1[DateEmprunt]) ==false ) {
	  $Operation="Reservation";
   }
   elseif(isset($info1[DateEmprunt]) == true) {
	  $Operation="Emprunt";
		}*/
?>
                     <tr>
                       <td height="25" style="padding:5px;">&nbsp;<?php echo $info1[Titre];?></td>
                       <td style="padding:5px;">&nbsp;<?php echo $info1[DateEmprunt];?></td>
                       <td style="padding:5px;">&nbsp;<?php echo $DateLimiteRetour;?></td>
                       <td align="center">&nbsp;<?php echo $info1[Type];?></td>
                       <td align="center">&nbsp;<?php echo $info1[Emplacement];?></td>
                       <td width="14%" align="center">&nbsp;<?php echo $info1[Prix];?></td>
                       <td style="padding:5px;">&nbsp;<?php echo $info1[StatutE];?></td>
                       
                     </tr>
<?php 
}while($info1=mysql_fetch_array($sql1));
?>
   <input name="empruntNombre" type="hidden" id="empruntNombre" value="<?php echo $empruntNombre; ?>">

                   </table>			</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="19" background="Images/main_booksort_2.gif">&nbsp;</td>
        </tr>
	   </form>
<?php
if($_POST[inputkey]!=""){
$f=$_POST[f]; //f est Id Ressource ou nom de Ressource
$inputkey=trim($_POST[inputkey]);
$email=$_POST[email];

$borrowTime=date('Y-m-d');

$query=mysql_query("select * from ressource where $f='$inputkey'");
$result=mysql_fetch_array($query);   //检索图书信息是否存在
if($result==false){
	echo "<script language='javascript'>alert('Cet ressource n'exist pas！');window.location.href='bookBorrow.php?email=$email';</script>";
  }
   else{
   	
   	$query5=mysql_query("select * from exemplaire where IDR='$inputkey'  and Etat='1'");
   $result5=mysql_fetch_array($query5);   
 	if($result5==false) {//判断是否有可用的书
 			 	   echo "<script language='javascript'>alert('Il y a pas exemplaire disponible！');window.location.href='bookBorrow.php?email=$email';</script>";
    }
   else {
   	//检索该读者所借阅的图书是否与再借图书重复
  $query1=mysql_query("select * from emprunt,exemplaire where emprunt.IDEX = exemplaire.IDEX and emprunt.IDU='$utilisateurId' and exemplaire.IDR='$inputkey' and exemplaire.Etat='0' and  emprunt.StatutE ='Emprunt'");   
  $result1=mysql_fetch_array($query1);

   	if($result1==true) {
	   //如果借阅的图书已被该读者借阅，那么提示不能重复借阅 
		echo "<script language='javascript'>alert('Cet ressource a été emprunté par lui！');window.location.href='bookBorrow.php?email=$email';</script>";
	  }
   else{
		
    $query3=mysql_query("select * from emprunt,exemplaire where  emprunt.StatutE ='Reservation' and emprunt.IDEX=exemplaire.IDEX and exemplaire.IDR='$inputkey' and emprunt.IDU !='$utilisateurId'  and exemplaire.Etat ='0'");
    $result3=mysql_fetch_array($query3);
	if($result3==true){  
			   //如果借阅的图书已被其他读者预定，那么提示不能借阅 
 					echo "<script language='javascript'>alert('Cet ressource a été reservé par autre utilisateur！');window.location.href='bookBorrow.php?email=$email';</script>";
 	 }
	 else{
	     	 $query4=mysql_query("select * from emprunt,exemplaire where emprunt.StatutE ='Reservation' and emprunt.IDEX=exemplaire.IDEX and exemplaire.IDR='$inputkey' and emprunt.IDU ='$utilisateurId'  and exemplaire.Etat ='0'");
		    $result4=mysql_fetch_array($query4);
	 if($result4==true){ 
		//si cette ressource est reservé par cet utilisateur, il veut emprunter cette ressource, on enlève la  DateReserve et ajouter un DateEmprunt
					mysql_query("update emprunt set DateReserve = null,DateEmprunt='$borrowTime',StatutE ='Emprunt' where IDE='$result4[IDE]'");
					echo "<script language='javascript'>alert('预约图书借阅操作成功！');window.location.href='bookBorrow.php?email=$email';</script>";
		}
	 else {
	 	/*if($empruntNombre>5) {
	 		 	      echo "<script language='javascript'>alert('Le nombre d'emprunt ne peut pas supérieur à 5！');window.location.href='bookBorrow.php?email=$email';</script>";
	 	}else {*/

    $query2=mysql_query("select * from exemplaire where IDR ='$inputkey' and Etat =1");
    $result2=mysql_fetch_array($query2);
    $exempleid=$result2[IDEX];
	 if($result2==true){    //完成图书借阅操作

			mysql_query("insert into emprunt(IDU,IDEX,DateEmprunt,StatutE)values('$utilisateurId','$exempleid','$borrowTime','Emprunt')");
			mysql_query("update exemplaire set Etat = '0' where IDEX='$exempleid'");
 	      echo "<script language='javascript'>alert('图书借阅操作成功！');window.location.href='bookBorrow.php?email=$email';</script>";
       }
 	
 	   else{}
// 	                    }
 			           }
 			       }
 		      }
 		  }
    }
 }
?>
    </table></td>
  </tr>
</table>
    <?php include("copyright.php");?></td>
  </tr>
</table>
</body>
</html>