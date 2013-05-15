<?php $nivel_dir="../"; 
require_once($nivel_dir.'template/pop.php');

require_once($nivel_dir.'includes/config.php');
$message=0;
 


//require ($nivel_dir.'includes/existeconexion.php');
require ($nivel_dir.'includes/existeconexion2.php');


//titulo
$tit="Reporte";

//titulo de pagina
$pagetit="Modulo de Busqueda";

//incluir toda la parte de ariba del template 
include($nivel_dir.'template/top.php'); 


 ?>
 
 
 
 
         <script src="../template/amcharts/amcharts.js" type="text/javascript"></script>         
        <script type="text/javascript">
            var chart;
            var chartData = [{
                year: 2005,
                income: 23.5,
                expenses: 18.1
            }, {
                year: 2006,
                income: 26.2,
                expenses: 22.8
            }, {
                year: 2007,
                income: 30.1,
                expenses: 23.9
            }, {
                year: 2008,
                income: 29.5,
                expenses: 25.1
            }, {
                year: 2009,
                income: 24.6,
                expenses: 25.0
            }];

            AmCharts.ready(function () {
                // SERIAL CHART  
                chart = new AmCharts.AmSerialChart();
                chart.pathToImages = "../template/amcharts/amcharts/images/";
                chart.dataProvider = chartData;
                chart.categoryField = "year";
                chart.startDuration = 1;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridPosition = "start";

                // value
                // in case you don't want to change default settings of value axis,
                // you don't need to create it, as one value axis is created automatically.
                
                // GRAPHS
                // column graph
                var graph1 = new AmCharts.AmGraph();
                graph1.type = "column";
                graph1.title = "Income";
                graph1.valueField = "income";
                graph1.lineAlpha = 0;
                graph1.fillAlphas = 1;
                chart.addGraph(graph1);

                // line
                var graph2 = new AmCharts.AmGraph();
                graph2.type = "line";
                graph2.title = "Expenses";
                graph2.valueField = "expenses";
                graph2.lineThickness = 2;
                graph2.bullet = "round";
                chart.addGraph(graph2);

                // LEGEND                
                var legend = new AmCharts.AmLegend();
                chart.addLegend(legend);

                // WRITE
                chart.write("chartdiv");
            });
        </script>
 
 
 
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
	     <td colspan=10>
	     <div id="chartdiv" style="width:600px; height:400px;"></div></td>
	    </tr>
       <tr>
	    <td colspan=20><label>Elige una o Multiples Opciones de Busqueda</label><br></td>
	    </tr>
	  <tr>
	    <td><label>Nombre o Apellido</label><br><input name='buscar'  type='text' maxlength='20'><br></td>
	    <td><label>Sexo</label><br><select name='sexo'>
        							<option value=''>Elige una Opción</option>
									<option value='1'>Masculino</option>
									<option value='2'>Femenino</option>
	    </select><br></td>
        <td><label>Fecha</label><br><input type='date'  name='fecha' maxlength='20'><br></td>
	    <td><label>Correo</label><br><input name='mail'  type='mail' maxlength='20'><br></td>
	    </tr>
       <tr>
	    <td><br><label>Telefono</label><br><input name='tel_casa'  type='numeric' maxlength='20'><br></td>
	    <td><div>
            <script>
        $(function() {
        $("#estado").change(function() {
                $("#municipio").load("buscar.php?estado=" + $("#estado").val());
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
                <option value="0">Seleccione un municipio</option>
              </select>
        </div>
    
      </td>
	    <td><br><label>Estatus</label><br><select name='estatus'>
        							<option value=''>Elige una Opción</option>
									<option value='1'>Abierto</option>
									<option value='2'>Cerrado</option>
	    </select><br></td>
	    <td><br><label>Escuela</label><br><input name=''  type='text' maxlength='20'><br></td>
	   </tr>
	  <tr>
	    <td height="47"><br><input name='submit' type='submit' value='Buscar'></td>
	 
        
        
        <td>&nbsp;</td>
	    <td><select name="estado2" id="estado2" onchange="cambia()">
	      <option selected="selected">Seleccionee</option>
	      <?php
		$qmun=$mysql_query("select * from estados;");
		$rmun=$mysql_fetch_array($qmun);
		foreach($rmun as $i=>$v){
		 if($_POST['estado']==$v[id_estado]){
		 	$sel="selected";}
		 else {
			$sel=""; }
		echo "<option value='".$v[id_estado]."' ".$sel.">".$v[estado]."</option>";
	  }
    ?>
        </select></td>
	    <td><select name="municipio2"  id="municipio2">
	      <option selected="selected">Seleccionem</option>
	      <?php
		$qmun1=$mysql_query("select * from municipios where id_estado='".$_POST['estado2']."'");
		$rmun1=$mysql_fetch_array($qmun1);
		foreach($rmun1 as $i1=>$v1){
		if($_POST['municipio']==$v1[id_municipio]){
			$sel1="selected";}
		else{
			$sel1="";}
		echo "<option value='".$v1[id_municipio]."' ".$sel.">".$v1[municipio]."</option>";
	  }
	?>
        </select></td>
	  </tr>
	</table>
	</form>
<?php } ?>