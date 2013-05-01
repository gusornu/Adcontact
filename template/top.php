

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<?PHP include('head.php'); ?>

<body>
<div id="header">
    <div class="wrapper clearfix">
        <div class="logo-container">
            <h2 id="logo"><a class="ie6fix"
                             href="#">Administrador de contactos</a>
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
            <h1 class="title"><?PHP echo $tit;?></h1>

                    <ul class="sub-tabs">

                                        <li class="object-action modal"><a class="modalbox"
                        href="personas/persona.php?nueva"><span>Nueva Persona</span></a></li>
            
            </ul>
        
        </div>
        <?PHP include('menu.php');?>