<?php $nivel_dir="../"; ?>
<link href="../template/css/pop/basic.css" media="screen" rel="stylesheet" type="text/css"/>
<link href="../template/css/pop/style.css" media="screen" rel="stylesheet" type="text/css"/>


<?php
require_once($nivel_dir.'includes/config.php');
$message=0;
// connect to the mysql database server.
mysql_connect ($dbhost, $dbusername, $dbuserpass);
//select the database
mysql_select_db($dbname) or die('Cannot select database'); 

if(isset($_GET['process']))
   {
      $query = "INSERT INTO persona
      (nombre, apellido_pat, apellido_mat,sexo,tel_casa,tel_celular,observaciones,estatus,mail,id_municipio,id_escuela)
      VALUES
      ('$_POST[nombre]', '$_POST[apellido_p]','$_POST[apellido_m]','$_POST[sexo]', '$_POST[telefono]', '$_POST[celular]', '$_POST[observaciones]', '$_POST[estatus]','$_POST[email]','$_POST[municipio]','$_POST[escuela]')";
    //echo $query; exit;
    $result = mysql_query($query) or die(mysql_error());
    if(!$result)
    {
     echo "occurrio un problema";
     
    }
    else
    {
        $message=1;
    }
   
   }
?>


<div class="form clearfix">
    <div class="form-header">
        <h2 class="form-title">Nuevo Contacto</h2>
    </div>


    <div class="error_list clearfix">
       
  <?php if($message==1){?> 
  <div class="error">Verifique toda la informacion!</div></div>
   <?php }?> 
    <form id="new_project" action="nuevo.php?process" method="post">

        <div>
            <label>Nombre</label>
            <input type="text" placeholder="Nombre" name="nombre" id="name" class="skinny">
            
            <input type="text" name="apellido_p" id="name" class="skinny" placeholder="Paterno">
            
            <input type="text" name="apellido_m" id="name" class="skinny" placeholder="Materno">
            
        </div>


        <div>
            <label>Sexo</label>
            <select name="sexo" id="client_id" class="wide">
                <option value=""></option>

                            <option value="1">Masculino</option>
                ;
                            <option value="2">Femenino</option>
                ;
                        </select>
        </div>
        <div>
            <label>Telefono</label>
            <input type="text" name="telefono" class="wide" placeholder="6424234567">
            <label>Celular</label>
            <input type="text" name="celular" class="wide" placeholder="6421234567">
            <label>Email</label>
            <input type="text" name="email" class="wide" placeholder="exemplo@dominio.com">
            
        </div>
        <div>
            <label>Observaciones</label>
            <textarea name="observaciones" class="wide"></textarea>
        </div>

       <div>
            <label>Estatus</label>
            <select name="estatus" class="wide">
                <option value=""></option>

                            <option value="1">Inscrito</option>
                ;
                            <option value="2">Estudiando</option>
                ;
                        </select>
        </div>
        <div>
            <label>Escuela</label>
            <select name="escuela" class="wide">
                <option value=""></option>

                            <option value="1">Nutricion</option>
                ;
                            <option value="2">Ingenieria</option>
                ;
                        </select>
        </div>
        <div>
            <label>Escuela</label>
            <select name="municipio" class="wide">
                <option value=""></option>

                            <option value="1">Navojoa</option>
                ;
                            <option value="2">guatabampo</option>
                ;
                        </select>
        </div>
    
        <div class="clearfix">
            <div class="button large"><input type="submit" value="Crear"></div>
        </div>

    </form>

</div>
