<?php $nivel_dir="../"; 
require_once($nivel_dir.'template/pop.php');
require_once($nivel_dir.'includes/config.php');
?>
<script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>
<?php
$message=0;
// connect to the mysql database server.
mysql_connect ($dbhost, $dbusername, $dbuserpass);
//select the database
mysql_select_db($dbname) or die('Cannot select database'); 

if(isset($_GET['id']))
{
    $id=$_GET['id'];
      $query = "SELECT * FROM `persona` WHERE id=$id ";
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
        $nombre = $user['nombre'];
        $apellido_pat = $user['apellido_pat'];
        $apellido_mat = $user['apellido_mat'];
        $sexo = $user['sexo'];
        $tel_casa = $user['tel_casa'];
        $tel_celular = $user['tel_celular'];
        $observaciones = $user['observaciones'];
        $estatus = $user['estatus'];
        $mail     = $user['mail'];
        $id_municipio = $user['id_municipio'];
        $id_escuela = $user['id_escuela'];
        $id_medio=$user['id_medio'];

  }
  
  if(isset($_GET['estado']))
   {
   

  $estado = mysql_real_escape_string($_GET['estado']);
    
   // echo "<option value='00'>ERROR!!! con id".$estado."</option> ";
    $query = "SELECT * FROM municipios WHERE id_estado='$estado'";
    
    $result = mysql_query($query);
  //  if(!$result)
  //  {    
    while ($row = mysql_fetch_array($result)) {
        echo "<option value='" .$row{'id_municipio'}."'>" . $row{'municipio'} . "</option>";
    }
   // }
    //else
    //{
    // echo "<option value='00'>ERROR!!!</option> ";

   // }

   }
  if(isset($_GET['update']))
   {
    if(isset($_POST['contestado']))
      {

        $contestado=1;
      }else{
        $contestado=0;
      }
   
   $query = "UPDATE persona SET nombre='".$_POST['nombre']."', apellido_pat='".$_POST['apellido_pat']."', apellido_mat='".$_POST['apellido_mat']."',
     sexo='".$_POST['sexo']."', tel_casa='".$_POST['telefono']."', tel_celular='".$_POST['celular']."', observaciones='".$_POST['observaciones']."', 
     estatus='".$_POST['estatus']."', mail='".$_POST['email']."', id_medio='".$_POST['medio']."', contestado='".$contestado."', id_municipio='".$_POST['municipio']."', id_escuela = '".$_POST['escuela']."'
     WHERE id = '".$_POST['id']."'";
    //echo $query;
    $result = mysql_query($query) or die(mysql_error());
    if(!$result)
    {
     echo "occurrio un problema";
     
    }
    else
    {

     $_SESSION["usuario"]=1;
     header("Location: ../includes/cerrar.php");

    }
   }

   if(isset($_GET['insertar']))
   {
      if(isset($_POST['contestado']))
      {

        $contestado=1;
      }else{
        $contestado=0;
      }
      $query = "INSERT INTO persona
      (nombre, apellido_pat, apellido_mat,sexo,tel_casa,tel_celular,observaciones,estatus,mail,id_medio,contestado,id_municipio,id_escuela)
      VALUES
      ('$_POST[nombre]', '$_POST[apellido_pat]','$_POST[apellido_mat]','$_POST[sexo]', '$_POST[telefono]', '$_POST[celular]', '$_POST[observaciones]', '$_POST[estatus]','$_POST[email]','$_POST[medio]','$contestado',$_POST[municipio]','$_POST[escuela]')";
    //echo $query; exit;
    $result = mysql_query($query) or die(mysql_error());
    if(!$result)
    {
     echo "occurrio un problema";
     
    }
    else
    {
        $_SESSION["usuario"]=2;
        header("Location: ../includes/cerrar.php");
    }
   
   }
?>

<?php if(isset($_GET['borrado'])){ 

$id= $_POST['id'];
$query = "DELETE FROM persona WHERE id = '".$id."';";
$result = mysql_query($query) or die(mysql_error());
if(!$result)
    {
     echo "occurrio un problema";
     
    }
    else
    {
        
        $_SESSION["usuario"]=3;
        header("Location: ../includes/cerrar.php");
        //echo $query;
       // echo $id;
    }

 }?>
<?php if(isset($_GET['borrar'])){ 
    $id_borrar=$_GET['id'];
    ?> 

<div class="form clearfix">
    <div class="form-header">
        <h2 class="form-title">Borrar</h2>
    </div>


    <div class="error_list clearfix">
       
  
  <div id="myform_errorloc"></div></div>
   
    <form id="new_project" name="miform" action="persona.php?borrado" method="post">

    <h2> Realmente decea borrar?</h2>
        <div class="clearfix">
            <input type="hidden" name="id" value="<?=$id_borrar?>">

            <div class="button large"><input type="submit" value="Borrar"></div>
        </div>

    </form>
<?php } if(isset($_GET['editar'])){ ?> 
<div class="form clearfix">
    <div class="form-header">
        <h2 class="form-title">Editar Contacto Contacto</h2>
    </div>


    <div class="error_list clearfix">
       
  
  <div id="myform_errorloc"></div></div>
   
    <form id="new_project" name="myform" action="persona.php?update" method="post">

        <div>
            <label>Nombre</label>
            <input type="text" value="<?=$nombre?>" name="nombre" id="name" class="skinny" >
            
            <input type="text" name="apellido_pat" id="name" class="skinny" placeholder="Paterno" value="<?=$apellido_pat?>">
            
            <input type="text" name="apellido_mat" id="name" class="skinny" placeholder="Materno" value="<?=$apellido_mat?>">
            
        </div>


        <div>
            <label>Sexo</label>
            <select name="sexo" id="client_id" class="wide">
                <option value=""></option>
                

                            <option value="1" <?php
                    if($sexo=1){
                        echo"selected";
                    }
                ?>>Masculino</option>
                ;
                            <option value="2" <?php
                    if($sexo=2){
                        echo"selected";
                    }
                ?>>Femenino</option>
                ;
                        </select>
        </div>
        <div>
            <label>Telefono</label>
            <input type="text" name="telefono" class="wide" placeholder="6424234567" value="<?=$tel_casa?>">
            <label>Celular</label>
            <input type="text" name="celular" class="wide" placeholder="6421234567" value="<?=$tel_celular?>">
            <label>Email</label>
            <input type="text" name="email" class="wide" placeholder="exemplo@dominio.com " value="<?=$mail?>">
            
        </div>
        <div>
            <label>Observaciones</label>
            <textarea name="observaciones" class="wide"><?=$observaciones?></textarea>
        </div>

       <div>
            <label>Estatus</label>
            <select name="estatus" class="wide">
                <option value=""></option>

                            <option value="1" <?php
                    if($estatus=1){
                        echo"selected";
                    }
                ?>>Inscrito</option>
                ;
                            <option value="2" <?php
                    if($estatus=2){
                        echo"selected";
                    }
                ?>>Estudiando</option>
                ;
                        </select>
        </div>
        <div>
            <label>Medio</label>
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
        if ($id_medio==$newidy){echo "selected";}
        echo "> ". htmlspecialchars($newnamey) ." </option>";
        $i++;

    }
    
    ?>
                        </select>
        </div>
        <div>
            <label>Escuela</label>
            <select name="escuela" class="wide">
                <option value=""></option>

                          <?php 
$resultz=mysql_query("SELECT * FROM escuela;");
    
    $i=0;
    
while( $rowz=mysql_fetch_array($resultz) )
    {
    $newid=$rowz['id_escuela'];
    $newname=$rowz['nombre'];
    
        echo " <option value='".$newid."' ";
        if($id_escuela==$newid)
            {echo "selected";}
        echo "> ". htmlspecialchars($newname) ." </option>";
        $i++;

    }
    
    ?>
                        </select>
        </div>
        <div>
            <label>Municipio</label>
            <select name="municipio" class="wide">
                <option value=""></option>
<?php 
$resultx=mysql_query("SELECT * FROM municipios ;");
    
    $i=0;
    
while( $rowx=mysql_fetch_array($resultx) )
    {
    $newidx=$rowx['id_municipio'];
    $newnamex=$rowx['municipio'];
    
        echo " <option value='".$newidx."' ";
        if($id_municipio==0)
            {echo "selected";}
        echo "> ". htmlspecialchars($newnamex) ." </option>";
        $i++;

    }
    
    ?>
                        </select>
        </div>
    
        <div class="clearfix">
            <input type="hidden" name="id" value="<?=$id?>">

            <div class="button large"><input type="submit" value="Guardar"></div>
        </div>

    </form>
  <!--   <script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("myform");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 
 frmvalidator.addValidation("nombre","req","El nombre es requerido.");
 frmvalidator.addValidation("apellido_pat","req","El Apellido es requerido.");
  frmvalidator.addValidation("apellido_mat","req","El Apellido es requerido.");
   frmvalidator.addValidation("sexo","dontselect=0","Porfavor sellecione su sexo.");
      frmvalidator.addValidation("telefono","num","el numero de telefono solo puede contener numeros.");
        frmvalidator.addValidation("celular","num","el numero de celular solo puede contener numeros.");
          frmvalidator.addValidation("observaciones","req","Incluya sus observaciones.");
          frmvalidator.addValidation("email","req","Email requerido.");
        frmvalidator.addValidation("estatus","dontselect=0","Porfavor sellecione el estatus.");
        frmvalidator.addValidation("escuela","dontselect=0","Porfavor sellecione una escuela.");
        frmvalidator.addValidation("municipio","dontselect=0","Porfavor sellecione su municipio.");
        frmvalidator.addValidation("medio","req","Por favor seleciona el medio.");

//]]></script>-->

 <?php }  if(isset($_GET['nueva'])) {?>
    

    <div class="form clearfix">
    <div class="form-header">
    
    <h2 class="form-title">Nuevo Contacto</h2>
    </div>


    <div class="error_list clearfix">
       
  
  <div id="myform_errorloc"></div></div>
   
    <form id="new_project" name="myform" action="persona.php?insertar" method="post">

        <div>
            <label>Nombre</label>
            <input type="text" name="nombre" id="name" class="skinny" placeholder="Nombre" required>
            
            <input type="text" name="apellido_pat" id="name" class="skinny" placeholder="Paterno" required>
            
            <input type="text" name="apellido_mat" id="name" class="skinny" placeholder="Materno" required>
            
        </div>


        <div>
            <label>Sexo</label>
            <select name="sexo" id="client_id" class="wide" required>
                <option ></option>
                

                            <option value="1">Masculino</option>
                ;
                            <option value="2">Femenino</option>
                ;
                        </select>
        </div>
        <div>
            <label>Telefono</label>
            <input type='tel' pattern='[\+]\d{2}[\(]\d{3}[\)]\d{3}[\-]\d{4}' title='Numero de Telefono (Formato: +52(642)999-9999)' name="telefono" class="wide" placeholder="6424234567" required>
            <label>Celular</label>
            <input type='tel' pattern='[\+]\d{2}[\(]\d{3}[\)]\d{3}[\-]\d{4}' title='Numero de Telefono (Formato: +52(642)999-9999)' name="celular" class="wide" placeholder="6421234567" required>
            <label>Email</label>
            <input type="email" name="email" class="wide" placeholder="exemplo@dominio.com " required>
            
        </div>
        <div>
            <label>Observaciones</label>
            <textarea name="observaciones" class="wide" required></textarea>
        </div>

       <div>
            <label>Estatus</label>
            <select name="estatus" class="wide" required>
                <option ></option>

                            <option value="1">Inscrito</option>
                ;
                            <option value="2">Estudiando</option>
                ;
                        </select>
        </div>

        <div>
            <label>Medio</label>
            <select name="medio" class="wide" required>
                <option ></option>
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
            <label>Escuela</label>
            <select name="escuela" class="wide" required>
                <option value="0"></option>

                          <?php 
$resultz=mysql_query("SELECT * FROM escuela;");
    
    $i=0;
    
while( $rowz=mysql_fetch_array($resultz) )
    {
    $newid=$rowz['id'];
    $newname=$rowz['nombre'];
    
        echo " <option value='".$newid."' ";
        echo "> ". htmlspecialchars($newname) ." </option>";
        $i++;

    }
    
    ?>
                        </select>
        </div>
        <div>
            <script>
        $(function() {
        $("#estado").change(function() {
                $("#municipio").load("persona.php?estado=" + $("#estado").val());
            });
        
        });
    </script>
            <label>Estado</label>
            <select class="wide" id="estado" required>
                <option value="0"></option>
<?php 
$resultx=mysql_query("SELECT * FROM estados ;");
    
    $i=0;
    
while( $rowx=mysql_fetch_array($resultx) )
    {
    $newidx=$rowx['id_estado'];
    $newnamex=$rowx['estado'];
    
        echo " <option value='".$newidx."' ";
        echo "> ". htmlspecialchars($newnamex) ." </option>";
        $i++;

    }
    
    ?>
                        </select>
        </div>
        <div>
            <label>Municipio</label>
            <select class="wide" name="municipio" id="municipio" required>
                <option value="0">Seleccione un estado</option>
              </select>
        </div>
    
        <div class="clearfix">
            <input type="hidden" name="id" value="<?=$id?>">

            <div class="button large"><input type="submit" value="Crear"></div>
        </div>

    </form>
     <!-- <script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("myform");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 
 frmvalidator.addValidation("nombre","req","El nombre es requerido.");
 frmvalidator.addValidation("apellido_pat","req","El Apellido es requerido.");
  frmvalidator.addValidation("apellido_mat","req","El Apellido es requerido.");
   frmvalidator.addValidation("sexo","dontselect=0","Porfavor sellecione su sexo.");
      frmvalidator.addValidation("telefono","num","el numero de telefono solo puede contener numeros.");
        frmvalidator.addValidation("celular","num","el numero de celular solo puede contener numeros.");
          frmvalidator.addValidation("observaciones","req","Incluya sus observaciones.");
          frmvalidator.addValidation("email","req","Email requerido.");
        frmvalidator.addValidation("estatus","dontselect=0","Porfavor sellecione el estatus.");
        frmvalidator.addValidation("escuela","dontselect=0","Porfavor sellecione una escuela.");
        frmvalidator.addValidation("municipio","dontselect=0","Porfavor sellecione su municipio.");
        frmvalidator.addValidation("medio","req","Por favor seleciona el medio.");

//]]></script>-->

    <?php }?>
</div>