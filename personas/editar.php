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

  }
  if(isset($_GET['process']))
   {
    $query = "UPDATE persona" .
" SET nombre = '".$_POST[nombre]."'," .
" apellido_pat = '".$_POST[apellido_pat]."'," .
" apellido_mat = '".$_POST[apellido_mat]."'," .
" sexo = '".$_POST[sexo]."'," .
" tel_casa = '".$_POST[tel_casa]."'," .
" tel_celular = '".$_POST[tel_celular]."'," .
" observaciones = '".$_POST[observaciones]."'," .
" estatus = '".$_POST[estatus]."'" .
" mail = '".$_POST[mail]."'" .
" id_municipio = '".$_POST[id_municipio]."'" .
" id_escuela = '".$_POST[id_escuela]."'" .

" WHERE column1 = '".$_POST[id]."'";
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
?>


<div class="form clearfix">
    <div class="form-header">
        <h2 class="form-title">Editar Contacto Contacto</h2>
    </div>


    <div class="error_list clearfix">
       
  <?php if($message==1){?> 
  <div class="error">Verifique toda la informacion!</div></div>
   <?php }?> 
    <form id="new_project" action="editar.php?process" method="post">

        <div>
            <label>Nombre</label>
            <input type="text" value="<?=$nombre?>" name="nombre" id="name" class="skinny">
            
            <input type="text" name="apellido_p" id="name" class="skinny" placeholder="Paterno" value="<?=$apellido_pat?>">
            
            <input type="text" name="apellido_m" id="name" class="skinny" placeholder="Materno" value="<?=$apellido_mat?>">
            
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
            <label>Escuela</label>
            <select name="escuela" class="wide">
                <option value=""></option>

                          <?php 
$resultz=mysql_query("SELECT * FROM escuela;");
    
    $i=0;
    
while( $rowz=mysql_fetch_array($resultz) )
    {
    $newid=$rowz['id'];
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
            <div class="button large"><input type="submit" value="Crear"></div>
        </div>

    </form>

</div>
