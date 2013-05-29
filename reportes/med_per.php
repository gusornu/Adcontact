<?php $nivel_dir="../"; 
require_once($nivel_dir.'template/pop.php');

require_once($nivel_dir.'includes/config.php');
$message=0;
 


require ($nivel_dir.'includes/existeconexion.php');
require ($nivel_dir.'includes/existeconexion2.php');


//titulo
$tit="Reporte";

//titulo de pagina
$pagetit="Modulo de Busqueda";

//incluir toda la parte de ariba del template 
include($nivel_dir.'template/top.php'); 


 ?>
 
 
 
  
 
 
 <?php









  if(isset($_POST['estado']))
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








if(isset($_POST["submit"])){

	// Recibimos la variable buscar del formulario de búsqueda desde el método POST
	
	if($_POST["buscar"]!=""){
	$bus=$_POST["buscar"];	
	$buscar="nombre LIKE '%$bus%'";
	}else { $buscar="";}
	
	if($_POST["sexo"]!=""){
		if($_POST["buscar"]!=""){ $and="and";} else{ $and="";}
	$sexo=$_POST["sexo"];
	$sexob="$and sexo=$sexo";
	}else {	$sexob="";	}
	
	if($_POST["fecha"]!=""){
		if($_POST["sexo"]!=""){ $and1="and";} else{ $and1="";}
    $fech="$and1 DATE_FORMAT(persona.fecha, '%Y-%m-%d')='".$_POST["fecha"]."'";
	} else { $fech=""; }
	
		if($_POST["mail"]!=""){
			if($_POST["fecha"]!=""){ $and2="and";} else{ $and2="";}
	$mail=$_POST["mail"];
	$mail1="$and2 mail='$mail'";
	}else {	$mail1="";	}
	
		if($_POST["tel_casa"]!=""){
			if($_POST["mail"]!=""){ $and3="and";} else{ $and3="";}
	$tel_casa=$_POST["tel_casa"];
	$tel="$and3 tel_casa like '%$tel_casa%'";
	}else {	$tel="";	}
	
	if($_POST["estado"]!=""){
			if($_POST["tel_casa"]!=""){ $and3="and";} else{ $and3="";}
	$tel_casa=$_POST["tel_casa"];
	$tel="$and3 tel_casa like '%$tel_casa%'";
	}else {	$tel="";	}
	
	
	


	$query="SELECT * FROM persona WHERE $buscar $sexob $fech $mail1 $tel ORDER BY nombre ASC";
	$result = mysql_query($query) or die(mysql_error());
	// Si se encuentran los datos desplegamos los resultados
	// Si no, avisamos que no se hallaron
	if(mysql_num_rows($result) > 0){
		echo "Se encontraron los siguientes registros:<br/>";
		?>
        
        
        
        <table border=1>
		  <tbody>
		    <tr><strong>
		      <td>Nombre</td>
		      <td>Apellido Pat</td>
              <td>Apellido Mat</td>
		      <td>Sexo</td>
		      <td>Telefono</td>
		      <td>Celular</td>
              <td>Observaciones</td>
		      <td>Estatus</td>
              <td>Mail</td>
              <td>Municipio</td>
              <td>Escuela</td>
              <td>Medio</td>
              <td>Fecha</td>
		    </strong></tr>

		<?php      

		while($Rs=mysql_fetch_array($result)) {

		echo "<tr>".
		      "<td>".$Rs['nombre']."</td>".
		      "<td>".$Rs['apellido_pat']."</td>".
		      "<td>".$Rs['apellido_mat']."</td>".
		      "<td>".$Rs['sexo']."</td>".
		      "<td>".$Rs['tel_casa']."</td>".
		      "<td>".$Rs['tel_celular']."</td>".
			  "<td>".$Rs['observaciones']."</td>".
			  "<td>".$Rs['estatus']."</td>".
			  "<td>".$Rs['mail']."</td>".
			  "<td>".$Rs['id_municipio']."</td>".
			  "<td>".$Rs['id_escuela']."</td>".
			  "<td>".$Rs['id_medio']."</td>".
			  "<td>".$Rs['fecha']."</td>".
		    "</tr>";	   
		}

	}else{
		echo "No se hallaron registros que coincidan con el criterio de búsqueda";
	}
  
}else{	 
	?>   <script type="text/javascript">
function cambia(){
	document.formu.action="buscar.php";
	document.formu.submit();
}
</script>



 

 <form action="buscar.php"  method=Post name=formu id="formu">
   <table>
    <tr>
        <td>CONTACTOS POR CADA MEDIO EN UN PERIODO</tr>
   <?php  
$fecha1="2013-02-01";
$fecha2="2013-05-25";

 $qdp=mysql_query("SELECT medio.nombre as medio, count(*) as medios FROM persona, medio where persona.`id_medio`=medio.id_medio and persona.fecha BETWEEN '$fecha1' AND '$fecha2' group by medio;");?>
<script src="../template/amcharts/amcharts.js" type="text/javascript"></script>        
        <script type="text/javascript">
            var chart;
            var legend;
var chartData= [<?php while( $rdp=mysql_fetch_array($qdp) )
    {
    echo "{ country:\"".$nombre_medio=$rdp['medio']."\", litres:".$nombre_medio=$rdp['medios']."}";
           // $i++;
echo ",";
    } ?>];
           

            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();
                chart.dataProvider = chartData;
                chart.titleField = "country";
                chart.valueField = "litres";

                // LEGEND
                legend = new AmCharts.AmLegend();
                legend.align = "center";
                legend.markerType = "circle";
                chart.addLegend(legend);

                // WRITE
                chart.write("chartdiv");
            });

            // changes label position (labelRadius)
            function setLabelPosition() {
                if (document.getElementById("rb1").checked) {
                    chart.labelRadius = 30;
                    chart.labelText = "[[title]]: [[value]]";
                } else {
                    chart.labelRadius = -30;
                    chart.labelText = "[[percents]]%";
                }
                chart.validateNow();
            }


            // makes chart 2D/3D                   
            function set3D() {
                if (document.getElementById("rb3").checked) {
                    chart.depth3D = 10;
                    chart.angle = 10;
                } else {
                    chart.depth3D = 0;
                    chart.angle = 0;
                }
                chart.validateNow();
            }

            // changes switch of the legend (x or v)
            function setSwitch() {
                if (document.getElementById("rb5").checked) {
                    legend.switchType = "x";
                } else {
                    legend.switchType = "v";
                }
                legend.validateNow();
            }
        </script>
      <tr>
        <td>
	    <div id="chartdiv" style="width: 100%; height: 400px;"></div>
        <table align="center" cellspacing="20">
            <tr>
                <td>
                    <input type="radio" checked="true" name="group" id="rb1" onclick="setLabelPosition()">labels outside
                    <input type="radio" name="group" id="rb2" onclick="setLabelPosition()">labels inside</td>
                <td>
                    <input type="radio" name="group2" id="rb3" onclick="set3D()">3D
                    <input type="radio" checked="true" name="group2" id="rb4" onclick="set3D()">2D</td>
                <td>Legend switch type:
                    <input type="radio" checked="true" name="group3" id="rb5"
                    onclick="setSwitch()">x
                    <input type="radio" name="group3" id="rb6" onclick="setSwitch()">v</td>
            </tr>
        </table>
     </tr>
       <tr>
        <td><a href="esc_per.php">CONTACTOS POR ESCUELA EN UN PERIODO 
     </a></tr>
      <tr>
        <td><a href="med_per.php">CONTACTOS POR CADA MEDIO EN UN PERIODO              </a>        
     </tr>
      <tr>
        <td><a href="seg_med.php">SEGUIMIENTOS  POR CADA MEDIO EN UN PERIODO              </a>        
     </tr>
   </table>
 </form>
<?php } ?>