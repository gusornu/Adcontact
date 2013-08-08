<?PHP 
/*
*$nivel_dir: obtener configuracion de los niveles de la base de datos
*/
$nivel_dir="../";
include ($nivel_dir.'includes/config.php');
//variables necesarias
//include ($nivel_dir.'includes/existeconexion.php');
require_once($nivel_dir.'template/pop2.php');


   //echo $_GET["rep"];
   //echo $_GET["fecha1"];
   //echo $_GET["fecha2"];
$fecha1= $_GET["fecha1"];
$fecha2= $_GET["fecha2"];

if ($_GET["rep"]=="rsm"){
 $qdp=mysql_query("SELECT nombre as medio, count(*) as seguimientos FROM medio, seguimiento where medio.id_medio=seguimiento.id_medio AND seguimiento.fecha BETWEEN '$fecha1' AND '$fecha2' group by medio;");
 $nom_rep="SEGUIMIENTOS  P/C MEDIO";
}else if ($_GET["rep"]=="mp") {
 $qdp=mysql_query("SELECT medio.nombre as medio, count(*) as medios FROM persona, medio where persona.`id_medio`=medio.id_medio and persona.fecha BETWEEN '$fecha1' AND '$fecha2' group by medio;");
 $nom_rep="CONTACTOS P/C MEDIO";
} else if ($_GET["rep"]=="ep"){
echo  $qdp=mysql_query("SELECT escuela.nombre as escuela, count(*) as personas FROM persona, escuela where persona.`id_escuela`=escuela.id_escuela and persona.fecha BETWEEN '$fecha1' AND '$fecha2' group by escuela;") ;
 $nom_rep="CONTACTOS POR ESCUELA";
} else if ($_GET["rep"]=="est"){
 $qdp=mysql_query("SELECT estados.`estado`, count(*) as personas FROM persona, estados where persona.`id_estado`=estados.`id_estado` and persona.fecha BETWEEN '$fecha1' AND '$fecha2' group by estado;") ;
 $nom_rep="CONTACTOS POR ESTADO";
}else if ($_GET["rep"]=="ins"){
 $qdp=mysql_query("SELECT escuela.nombre as escuela, count(*) as personas FROM persona, escuela where persona.`id_escuela`=escuela.id_escuela and persona.fecha BETWEEN '$fecha1' AND '$fecha2' and estatus=35 group by escuela;") ;
 $nom_rep="INSCRITOS POR ESCUELA";
}



?>

<div class="form clearfix">
    <div class="form-header">
        <h2 class="form-title"><?php echo $nom_rep;?> </h2>
    </div>
    
     <div class="error_list clearfix">
    <div id="myform_errorloc"></div></div>
    
    
    <table>
   <tr>
        <td>PERIODO: <?php echo $fecha1;?> - <?php echo $fecha2;?></tr>

<script src="../template/amcharts/amcharts.js" type="text/javascript"></script>         
        <script type="text/javascript">
            var chart;
            var legend;
var chartData= [<?php while( $rdp=mysql_fetch_array($qdp) )
    {
		
		
if ($_GET["rep"]=="rsm")
{
 echo "{ country:\"".$rdp['medio']."\", litres:".$rdp['seguimientos']."}";
}else if ($_GET["rep"]=="mp") {
 echo "{ country:\"".$rdp['medio']."\", litres:".$rdp['medios']."}";
} else if ($_GET["rep"]=="ep"){
  echo "{ country:\"".$rdp['escuela']."\", litres:".$rdp['personas']."}";
}else if ($_GET["rep"]=="est"){
  echo "{ country:\"".$rdp['estado']."\", litres:".$rdp['personas']."}";
}else if ($_GET["rep"]=="ins"){
  echo "{ country:\"".$rdp['escuela']."\", litres:".$rdp['personas']."}";
}
   
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
                    <input type="radio" checked="true" name="group" id="rb1" onclick="setLabelPosition()">Etiqueta Exterior
                    <input type="radio" name="group" id="rb2" onclick="setLabelPosition()"> / Interior</td>
                <td>
                    <input type="radio" name="group2" id="rb3" onclick="set3D()">3D
                    <input type="radio" checked="true" name="group2" id="rb4" onclick="set3D()">2D</td>
                <td></td>
            </tr>
        </table>
     </tr>
   </table>

  </form> 

   


