<?php session_start();?>
<html>
<head>
<link href="CSS/style1.css" rel="stylesheet">
</head>
<body>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" class="tableBorder">
  <tr>
    <td>


	</td>
	</tr>
	<td>
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><table width="99%" height="510"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tableBorder_gray">
  <tr>
    <td height="510" align="center" valign="top" style="padding:5px;"><table width="98%" height="487"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" valign="top">
<form name="form1" method="post" action="">
		<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableBorder_gray">
   <tr>
     <td valign="top"><table width="100%" border="0" cellpadding="02" cellspacing="2" bordercolor="#E3F4F7">
       <tr>
         <td valign="top" bgcolor="#D2E6F1">

		 <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
           <tr>
             <td width="33%"><table width="100%" height="74" border="0" cellpadding="0" cellspacing="0">
               <tr>
                 <td height="27" colspan="2" align="center"><table width="90%" height="21" border="0" cellpadding="0" cellspacing="0">
                   <tr>
                     <td width="132" background="Images/bg_line.gif">&nbsp;</td>
                     <td>&nbsp;</td>
                   </tr>
                 </table></td>
               </tr>
               <tr>
                 <td width="8%" height="27">&nbsp;</td>
                 <td width="92%">Email d'utilisateur：</td>
               </tr>
               <tr>
                 <td height="27" colspan="2" align="center"><input name="email" type="text" id="email" value="<?php echo $info[Email];?>" size="24">
                   &nbsp;
                   <input name="Button" type="button" class="btn_grey" value="Confirmer" onClick="checkutilisateur(form1)"></td>
               </tr>
             </table></td>
             <td width="1%" align="center" valign="bottom"><img src="Images/borrow_fg.gif" width="18" height="111"></td>
             <td width="66%" align="right">
			 <table width="96%" border="0" cellpadding="0" cellspacing="0">
               <tr>
                 <td height="27">Nom：
                       <input name="nom" type="text" id="nom" value="<?php echo $info[Nom];?>"></td>
                 <td>Prenom：
                   <input name="prenom" type="text" id="prenom" value="<?php echo $info[Prenom];?>"></td>
               </tr>
               <tr>
                 <td height="27">Tel：
                   <input name="tel" type="text" id="tel" value="<?php echo $info[Tel];?>"></td>
                 <td>Nombre limite d'emprunt：
                   <input name="number" type="text" id="number" value="<?php echo $infoSystem[valeur];?>" size="17">
                   </td>
               </tr>
             </table>			 </td>
           </tr>
         </table>		 </td>
       </tr>
       <tr>
         <td valign="top" bgcolor="#D2E5F1"><table width="100%" height="35" border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#D2E3E6" bgcolor="#FFFFFF">
                   <tr align="center" bgcolor="#e3F4F7">
                     <td width="24%" height="25" bgcolor="#F0FAFB">Titre</td>
                     <td width="12%" bgcolor="#F0FAFB">Date d'emprunt</td>
                     <td width="13%" bgcolor="#F0FAFB">Date limite de retour</td>
                     <td width="10%" bgcolor="#F0FAFB">Type</td>
                     <td width="10%" bgcolor="#F0FAFB">Emplacement</td>
                     <td bgcolor="#F0FAFB">Prix(€)</td>
                     <td width="10%" bgcolor="#F0FAFB">Opération</td>
                     <td width="12%" bgcolor="#F0FAFB"><input name="Button22" type="button" class="btn_grey" value="Reset" onClick="window.location.href='bookBack.php'"></td>
                   </tr>
<?php

if($info){
 do{
           if($info[DateEmprunt] !=null) {
	        $DateLimiteRetour=date("Y-m-d",strtotime("$info[DateEmprunt]+ 30 days"));        //归还图书日期为当前期日期+30天期限
           }
           else {
	       $DateLimiteRetour=null;
           } 	
 

 	?>
 
                   <tr>
                     <td height="25" style="padding:5px;">&nbsp;<?php echo $info[Titre];?></td>
                     <td style="padding:5px;">&nbsp;<?php echo $info[DateEmprunt];?></td>
                     <td style="padding:5px;">&nbsp;<?php echo $DateLimiteRetour;?></td>
                     <td align="center">&nbsp;<?php echo $info[Type];?></td>
                     <td align="center">&nbsp;<?php echo $info[Emplacement];?></td>
                     <td width="13%" align="center">&nbsp;<?php echo $info[Prix];?></td>
                      <td style="padding:5px;">&nbsp;<?php echo $info[StatutE];?></td>
                     <td width="12%" align="center"><a href="bookBack_ok.php?IDE=<?php echo $info[IDE];?>&email=<?php echo $info[Email];?>">Retourner</a>&nbsp;</td>           
                   </tr>
<?php
}
while($info=mysql_fetch_array($sql));
}
 ?>
                 </table>                 </td>
       </tr>
     </table></td>
   </tr>
</table>
 </form> </td>
      </tr>
    </table>
</td>
  </tr>
</table></td>
  </tr>
</table>
</td>
</tr>
</table>
</body>
</html>