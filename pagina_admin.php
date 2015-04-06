<?php

include_once 'lib.php';
View::navigation();

View::start("Página de Administración");    

        echo '<br>';
        echo '<a href="añadir_juego.php">Añadir Juego</a> ';
        echo '<br /><br />';
        echo '<a href="hacer_admin.php">Hacer Administrador</a> ';
        echo '<br><br />';
        echo '<a href="eliminar_socio.php">Eliminar Socio</a> ';
        echo '<br>';
    
View::end();       
       
