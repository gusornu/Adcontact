<?php $nivel_dir="../"; ?>
<link href="../template/css/pop/basic.css" media="screen" rel="stylesheet" type="text/css"/>
<link href="../template/css/pop/style.css" media="screen" rel="stylesheet" type="text/css"/>


<?php
require_once($nivel_dir.'includes/config.php');

// connect to the mysql database server.
mysql_connect ($dbhost, $dbusername, $dbuserpass);
//select the database
mysql_select_db($dbname) or die('Cannot select database'); 


if(isset($_GET['insert']))
   {

     if(isset($_POST['contestado']))
      {

        $contestado=1;
      }else{
        $contestado=0;
      }
        $ddate=$_POST["idpersona"]; 
      $fecha_seguimiento=date('Y-m-d', strtotime(str_replace('-', '/', $_POST["siguiente"]))); 
    $query = "INSERT INTO seguimiento
      (fecha_seguimiento, observacion,prioridad,id_persona,id_usuario,id_medio,contestado,estatus)
      VALUES
      ('$fecha_seguimiento', '$_POST[observacion]','$_POST[prioridad]','$_POST[idpersona]', '$_POST[idusuario]', '$_POST[medio]', $contestado, '$_POST[estatus]')";
    //echo $query; exit;
   $result = mysql_query($query) or die(mysql_error());
    if(!$result)
    {
     echo "occurrio un problema";
     
    }
    else
    {
     header("Location: ../includes/cerrar.php");

    }
   }
   if(isset($_GET['update']))
   {

     if(isset($_POST['contestado']))
      {

        $contestado=1;
      }else{
        $contestado=0;
      }
      $fecha_seguimiento=date('Y-m-d', strtotime(str_replace('-', '/', $_POST["fecha_seguimiento"]))); 
    $query = "UPDATE seguimiento SET fecha='".$_POST['fecha']."', fecha_seguimiento='".$_POST['fecha_seguimiento']."', observacion='".$_POST['observacion']."',
     prioridad='".$_POST['prioridad']."', id_persona='".$_POST['id_persona']."', id_usuario='".$_POST['id_usuario']."', id_medio='".$_POST['id_medio']."', contestado='".$contestado."',
     estatus='".$_POST['estatus']."' WHERE id_seguimiento = '".$_POST['id']."'";
    //echo $query; exit;
    $result = mysql_query($query) or die(mysql_error());
    if(!$result)
    {
     echo "occurrio un problema";
     
    }
    else
    {
     header("Location: ../includes/cerrar.php");

    }
   }
   if(isset($_GET['delete']))
   {
        $ddate=$_POST["idpersona"]; 
      $fecha_seguimiento=date('Y-m-d', strtotime(str_replace('-', '/', $_POST["siguiente"]))); 
    $query = "INSERT INTO seguimiento
      (fecha_seguimiento, observacion,prioridad,id_persona,id_usuario,id_medio,estatus)
      VALUES
      ('$fecha_seguimiento', '$_POST[observacion]','$_POST[prioridad]','$_POST[idpersona]', '$_POST[idusuario]', '$_POST[medio]', '$_POST[estatus]')";
    //echo $query; exit;
    $result = mysql_query($query) or die(mysql_error());
    if(!$result)
    {
     echo "occurrio un problema";
     
    }
    else
    {
     echo "agregados ala base de datos";
    }
   }

   if(isset($_GET['nuevo'])){

?>

<div class="form clearfix">
    <div class="form-header">
        <h2 class="form-title">Nuevo Seguimiento</h2>
    </div>


    

    <form id="new_project" action="seg.php?insert" method="post">

        <input type="hidden" name="idpersona"  value="<?PHP echo $_GET['id'];?>" />
        <input type="hidden" name="idusuario"  value="1" />
        <input type="hidden" name="fecha"  value="1" />
        <div>
            <label>Medio<input type="checkbox" name="contestado" value="1"></label>
            <select name="medio" class="wide">
                <option value="0"></option>
<?php 
$resulty=mysql_query("SELECT * FROM medio ;");
    
    $i=0;
    
while( $rowy=mysql_fetch_array($resulty) )
    {
    $newidy=$rowy['id_medio'];
    $newnamey=$rowy['nombre'];
    
        echo " <option value='".$newidy."' ";
        echo "> ". htmlspecialchars($newnamey) ." </option>";
        $i++;

    }
    
    ?>
                        </select>
        </div>
        <div>
            <label>Siguiente Seguimiento</label>
            <input type="date" name="siguiente">
        </div>

        <div>
            <label>Observaciones</label>
            <textarea name="observacion" class="wide"></textarea>
        </div>

        <div>
            <label>Prioridad</label>
            <select name="prioridad" class="wide">
                <option value=""></option>

                            <option value="1">Poca</option>
                ;
                            <option value="2">Media</option>
                            <option value="2">Alta</option>
                ;
                        </select>
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
    
        <div class="clearfix">
            <div class="button large"><input type="submit" value="Crear"></div>
        </div>

    </form>

</div>
<?PHP }

if(isset($_GET['editar'])){

    $id=$_GET['id'];
      $query = "SELECT * FROM `seguimiento` WHERE `id_seguimiento`=$id";

    //echo $query; exit;
    $result = mysql_query($query) or die(mysql_error());
    if(!$result)
    {
     echo "occurrio un problema";
     
    }
    else
    {
        

    }
        $user = mysql_fetch_assoc($result);
        $fecha = $user['fecha'];
        $fecha_seguimiento = $user['fecha_seguimiento'];
        $observacion = $user['observacion'];
        $prioridad= $user['prioridad'];
        $id_persona = $user['id_persona'];
        $id_usuario = $user['id_usuario'];
        $id_medio = $user['id_medio'];
        

  

?>

<div class="form clearfix">
    <div class="form-header">
        <h2 class="form-title">Editar Seguimiento</h2>
    </div>


    

    <form id="new_project" action="seg.php?update" method="post">
         <input type="hidden" name="id"  value="<?=$id?>" />
        <input type="hidden" name="id_persona"  value="<?=$id_persona?>" />
        <input type="hidden" name="id_usuario"  value="<?=$id_usuario?>" />
        <input type="hidden" name="fecha"  value="<?=$fecha?>" />

        <div>
            <label>Medio<input type="checkbox" name="contestado" value="1"></label>
            <select name="id_medio" class="wide">
                <option value="0"></option>
<?php 
$resulty=mysql_query("SELECT * FROM medio ;");
    
    $i=0;
    
while( $rowy=mysql_fetch_array($resulty) )
    {

    $newidy=$rowy['id_medio'];
    $newnamey=$rowy['nombre'];
    
        echo " <option value='".$newidy."' ";
        if ($id_medio==$newidy){echo "selected";}
        echo "> ". htmlspecialchars($newnamey) ." </option>";
        $i++;

    }
    
    ?>
                        </select>
        </div>
        <div>
            <label>Siguiente Seguimiento</label>
            <input type="date" name="fecha_seguimiento" value="<?=$fecha_seguimiento?>">
        </div>

        <div>
            <label>Observaciones</label>
            <textarea name="observacion" class="wide"><?=$observacion?></textarea>
        </div>

        <div>
            <label>Prioridad</label>
            <select name="prioridad" class="wide">
                <option value=""></option>

                            <option value="1">Poca</option>
                ;
                            <option value="2">Media</option>
                            <option value="2">Alta</option>
                ;
                        </select>
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
    
        <div class="clearfix">
            <div class="button large"><input type="submit" value="Editar"></div>
        </div>

    </form>

</div>
<?PHP }?>