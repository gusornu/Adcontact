<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>

<div id="inline">
	<h2>Titulo del Formulario</h2>

	<form id="form" name="form" action="JavaScript:verifica()" method="post">
		<label for="uno">Nombre del campo</label><br>
		<input type="text" id="uno" name="uno" class="txt">
 		<br>
		<label for="dos">Nombre del campo</label><br>
		<input type="text" id="dos" name="dos" class="txt">
 		<br>
        <label for="tres">Nombre del campo</label><br>
		<input type="text" id="tres" name="tres" class="txt">
 		<br>
		
		<button type="submit" id="send" >Enviar Formulario</button>
	</form> 
	
	<script type="text/javascript" language="javascript">
	//$(document).ready(function() {
		//$(".modalbox").fancybox();
		//$("#form").submit(function() { return false; });
	//	});


		
function verifica(){
	 if(document.form.uno.value =="")
				  {
				  alert("¡Mensaje uno!");
				  document.form.uno.focus();
				  return (false);	  
				  }
				  if(document.form.dos.value=="")
				   {
				  alert("¡Mensaje dos!");
				  document.form.dos.focus();
				  return (false);	  
				  }
				  if(document.form.tres.value=="")
				  {
				  alert("¡Mensaje tres!");
				  document.form.tres.focus();
				  return (false);	  
				  }
				  else {
				alert("Se agregarán los datos a la base. Está seguro(a) de haber ingresado los valores correctos?");			  			
				document.form.action="inserta.php?varieb";
			      document.form.submit();
						}
}


   </script>
</div>
</body>
</html>
