<div class="navigation">
            <ul class="main_nav dropdown">
                <li>
                    <a href="<?php echo $nivel_dir; ?>index.php?a=portal/home">Principal</a>
                </li>
                
               <?php
				if ($_SESSION["tipo"]=="Administrador") {
			   ?> 
               
                <li><a href="#">Catalogos</a>
                    <ul>
                        <li>
                            <a class="new-client-button modal"
                               href="<?php echo $nivel_dir; ?>contacto.php">Contactos</a>
                        </li>
                        <li>
                            <a class="new-client-button modal"
                               href="<?php echo $nivel_dir; ?>usuario/lista.php">Usuarios</a>
                        </li>
                        <li>
                            <a class="new-invoice-button modal"
                               href="<?php echo $nivel_dir; ?>escuela/escuela.php">Escuelas</a>
                        </li>
                        <li>
                            <a class="new-invoice-button modal"
                               href="<?php echo $nivel_dir; ?>medios/medio.php">Medios</a>
                        </li>
                         <li>
                            <a class="new-invoice-button modal"
                              href="<?php echo $nivel_dir; ?>estatus/estatus.php">Estatus</a>
                        </li>
                    
                    
                        <li>
                            <a class="change-pass-button modal"
                               href="#">Contrasena</a>
                        </li>
                    </ul>
                </li>
                
               <?php
				} if($_SESSION["tipo"]=="Capturista") {
			   ?> 
               
                <li><a href="#">Catalogos</a>
                    <ul>
                        <li>
                            <a class="new-client-button modal"
                               href="<?php echo $nivel_dir; ?>contacto.php">Contactos</a>
                        </li>
                    
                        <li>
                            <a class="change-pass-button modal"
                               href="#">Contrasena</a>
                        </li>
                    </ul>
                </li>                
                <?php   } ?>
                <li>
                    <a href="#">Bienvenido <?php echo $_SESSION["nombre"];?></a>
                    <ul>                  
                        <li>
                            <a class="change-pass-button modal"
                               href="#">Contrasena</a>
                        </li>
                        <li>
                            <a class="new-client-button modal"
                               href="<?php echo $nivel_dir; ?>includes/cerrarsesion.php">Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <a class="resize_button"></a>

        </div>