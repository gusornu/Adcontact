
<?PHP 

//obtener configuracion de la base de datos
$nivel_dir="../";
include ($nivel_dir.'includes/config.php');
//variables necesarias
//include ($nivel_dir.'includes/existeconexion.php');

if ($_GET["id_esc"])
	{
		$query1 = "SELECT * FROM medio where id_medio=".$_GET["id_esc"]."";
		$result1 = mysql_query($query1) or die(mysql_error());
		$row1 = mysql_fetch_array($result1);
		$id_esc=$row1['id_medio'];
	
	}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>

<div id="inline">
	<h2>Esta seguro de borrar el medio</h2>

	<form id="form" name="form" action="inserta_med.php" method="post">
		<p>
		  <input name="del" type="hidden"  id="del"  value="<?php echo $_GET["del"]; ?>" >		  
		  <br>
		  
		  <br>
	  </p>
<button type="submit" id="send" >Aceptar</button>
	</form> 
	

</div>
</body>
</html>
