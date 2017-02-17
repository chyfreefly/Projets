<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Gestion Administrateur</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Chyfreefly" >

    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script language="javascript" src="js/admin_js.js"></script>

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>


    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>


  <body class="" onload="login.username.focus();"> 
    
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                </ul>
                <a class="brand" href="index.html"><span class="first">Médiathèque</span> <span class="second">Administrateur</span></a>
        </div>
    </div>
    
<div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Connexion</p>
            <div class="block-body">
                <form id="login" name="login" method="post" action="index_ok.php">
                    <label>Nom d'utilisateur</label>
                    <input type="text" name="username" id="username"  class="span12"/>
                    <label>Mot de passe</label>
                    <input type="password" class="span12"name="pwd" id="pwd" size="10" />
                    <input type="hidden" name="action" value="login" />
                    <input type="submit" name="login" id="login" value="Connexion" onclick="return check();" class="btn btn-primary pull-right"/> 
                    <!-- écrire fonction-->
                    <label class="remember-me"><input type="checkbox" name="remember-me" id="remember-me" /> Se souvenir de moi </label>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
        <p><a href="reset-password.html">Mot de passe oublié ?</a></p>
    </div>
</div>


   

    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>

