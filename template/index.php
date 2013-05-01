<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="css/basic.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="css/style.css" media="screen" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.ba-bbq.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
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
                             href="index.php?a=portal/home">Administrador de contactos</a>
            </h2>
        </div>
        
<?PHP include('nav.php'); ?>

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



<div id="page-content-outer">
    <div id="page-content" class="wrapper content admin">
        <div class="info-bar">
            <h1 class="title">Titulo</h1>

                    <ul class="sub-tabs">

                                        <li class="object-action modal"><a
                        href="index.php?a=clients/create"><span>Nueva Persona</span></a></li>
            
            </ul>
        
        </div>

        <ul class="tab_menu wrapper">

                    <li class="selected">
                <a href="#"><span>Hoy</span></a>
            </li>
        
            <li class="">
                <a href="#"><span>Personas</span></a>
            </li>
            <li class="">
                <a href="#"><span>Seguimientos</span></a>
            </li>
            <li class="">
                <a href="#"><span>Reportes</span></a>
            </li>

            <li class=" messages">
                <a href="#"><span>&nbsp;</span></a>
            </li>


        </ul>
        <div class="inner">


            <table class="list ">

                <tr class="table-header">
                
                
                
                    <th class="">Nombre</th>
                    <th class="">Correo</th>
                    <th class="">Escuela</th>
                    <th class="">Fecha</th>

                
                
                                                    <th class="action"></th>
                                    <th class="action"></th>
                                    <th class="action"></th>
                                                </tr>


            
            
                <tr>
                
                
                    <td class="">
                        <a class="cell-link"
                           href="#">Daniel Lozano Carrillo</a>
                    </td>

                
                
                    <td class="">
                        <a class="cell-link"
                           href="#">daniel@unav.edu.mx</a>
                    </td>

                
                
                    <td class="">
                        <a class="cell-link"
                           href="#">Ingenieria en Sistemas</a>
                    </td>

                
                
                    <td class="">
                        <a class="cell-link"
                           href="#">2/10/2010</a>
                    </td>

                
                                                                    <td class="action">
                        <a class="small-button  modal"
                           href="#"><span>Editar</span></a>
                    </td>

                                                    <td class="action">
                        <a class="small-button danger modal"
                           href="#"><span>Borrar</span></a>
                    </td>
                    <td class="action">
                        <a class="small-button danger modal"
                           href="#"><span>Seguimiento</span></a>
                    </td>


                                                </tr>

            
              

            
                        </table>

        </div>
        <div class="footer">
        <div class="pagination"><ul class="clearfix"><li class='disabled'><div  >&laquo; Ant</div></li><li class='current'><a href='#'>1</a></li><li ><a href='#'>2</a></li><li class=''><a href='#' >Sig &raquo;</a></li></ul></div>        </div>
    </div>

</div></div> <!-- end content-->
</body>
</html>