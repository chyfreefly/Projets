<?php 
session_start();
    include("config.inc.php");
/*    checkLogin();
    database_connect();*/
$action=$_GET['action'];
$row='';
$do = 'add';
if($action=='edit')
{
	$id = $_GET['id'];
	$result = mysql_query("select * from article where idA=".$id);
	$row = mysql_fetch_array($result);
	$do = 'updateArticle&id='.$id;
}
else if($action=='view')
{
	$id = $_GET['id'];
	$result = mysql_query("select * from article where idA=".$id);
	$row = mysql_fetch_array($result);
	$do = '';
}
else if($action=='add'){
	$do = 'add';
	}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ajouter coup de coeur</title>
<link href="css/style.css" rel="stylesheet" />
<script src="js/admin_js.js"></script>
</head>
<table width="780" height="450" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #9CBED6; margin-top:15px;">
	<tr>
		<td align="center" valign="top">
		<table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC" align="center">

<tr bgcolor="#E7E7E7">
	<td height="28"  align="center">
	<b>Mettre a jour coup de coeur</b>
	</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<td width="100%" colspan="">

<form name="form1" action="db_article.php?action=<?php echo $do;?>" enctype="multipart/form-data" method="post" >
<input type="hidden" name="dopost" value="save" />
<input type="hidden" name="channelid" value="1" />
<input type="hidden" name="id" value="2" />

  <table width="98%"  border="0" align="center" cellpadding="2" cellspacing="2" id="needset">
    <tr>
      <td height="24" class="bline">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="90">&nbsp;Titre(Majuscule)：</td>
          <td>
          	<input name="title" type="text" id="title" value="<?php echo $row['title'];?>" style="width:388px">
          </td>
          <td width="90"></td>
          <td></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="24" class="bline"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr>
            <td width="90">&nbsp;Auteur：</td>
            <td>
              <input name="author" type="text" id="author" style="width:160px" value="<?php echo $row['author'];?>" size="16"></td>
            <td width="90"></td>
            <td></td>
          </tr>
        </table>

        </td>
    </tr>
    <tr>
      <td height="24" class="bline">
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="90">&nbsp;Image：</td>
            <td>
            
			<input type="file" name="image">
			</td>

          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="24" bgcolor="#F1F5F2">&nbsp;Contenu de l'article：</td>
    </tr>
    <tr>
      <td  align="center"><textarea name="content" cols="80"
			rows="20"><?php echo $row['content'];?></textarea>

			    </td>
    </tr>
      </table>
<?php if($action!='view'){?>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
      <td width="45%" align="right"><input type="reset" value="Reset"></td>
      <td width="5%" ></td>
      <td width="45%" align="left"><input type="submit" value="Upload"></td>
  </tr>

</table>
<?php }?>
</form>
	</td>
</tr>
</table> 

		</td>
	</tr>
</table>