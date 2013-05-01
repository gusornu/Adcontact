<?PHP $nivel_dir=""; 


//obtener configuracion de la base de datos

require ($nivel_dir.'includes/config.php');
session_start();
     if (isset($_SESSION["id_usuario"]))
     {
        header ('Location: '.$nivel_dir.'contacto.php');exit; 
     }
//variables necesarias

?>
<!-- InstanceBeginEditable name="head" -->
<?php
//titulo
$tit="Adminitrador de Contactos";

//titulo de pagina
$pagetit="Login";
?>

<HTML>
<!-- InstanceEndEditable -->
<?php
//incluir toda la parte de ariba del template 
//include($nivel_dir.'template/top.php'); 
?>

<!-- InstanceBeginEditable name="EditRegion2" -->

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="template/css/basic.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="template/css/style.css" media="screen" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="template/js/jquery.ba-bbq.min.js"></script>
    <script type="text/javascript" src="template/js/main.js"></script>
    <!--[if IE]>
    <link href="css/ie.css" media="screen" rel="stylesheet" type="text/css"/>
    <![endif]-->

 
    <title>Administrador de contactos</title>
</head>
 

<body>
<div id="header">
    <div class="wrapper clearfix">
        <div class="logo-container">
            <h2 id="logo"><a class="ie6fix"
                             href="#">Administrador de contactos</a>
            </h2>
        </div>
        
        <?PHP //include('template/nav.php'); ?>

    </div>
</div>


<div id="modal" class="jqmWindow jqmID1">
    <div id="modal-body"></div>
</div>



<div id="content" class="clearfix">
<div class="clear"></div>
    <div class="tmp"></div>
    <div id="alert" class="">
        </div>
<div class="form clearfix">
    <div class="form-header">
        <h2 class="form-title">Identificarse</h2>
    </div>

<form id="login" action="validar_usuario.php" method="post">
	
	<div>
		<label>Usuario</label>
		<input name="usuario" type="text" class="wide">
	</div>
	
	<div>
		<label>Contrasena</label>
		<input name="password" type="password" id="password" class="wide" />
	</div>

	<div class="clearfix button-container">
            <div class="button large"><input type="submit" value="Entrar"></div>
        </div>
	
</form>
<!-- InstanceEndEditable -->
<?PHP 
//incluir footer y la parte de abajo
//include($nivel_dir.'template/bottom.php');
// Footer
//include($nivel_dir.'template/footer.php');

?>
</div></div> <!-- end content-->
</body>
</html>
<!-- InstanceEnd -->