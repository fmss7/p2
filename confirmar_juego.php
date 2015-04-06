<?php
include_once 'lib.php';
View::start('Añadir Juego');
View::navigation();
 
 if($_REQUEST['plataforma'] == '' || $_REQUEST['nombre'] == '' || $_REQUEST['descripcion'] == '' || $_REQUEST['url'] == ''){
        echo 'Alguno/s de los campos que ha introducido está vacío </br>.';
        echo '<a href="añadir_juego.php">Volver a añadir juego</a>';
    }else{

        $db = getDB();
        $st=$db->prepare('SELECT * FROM juegos WHERE plataforma= ? and nombre= ? ');
        $st->execute(array($_REQUEST['plataforma'], $_REQUEST['nombre']));
        $st->setFetchMode(PDO::FETCH_NAMED);
        $aux_plat = $st->fetch()['plataforma'];
        $aux_nombre = $st->fetch()['nombre'];
        
        if($aux_plat != $_REQUEST['plataforma'] && $aux_nombre != $_REQUEST['nombre'] ){
            echo 'El juego se ha añadido correctamente';
            echo '</br>';
            $SQL ='INSERT INTO [juegos] ([plataforma], [nombre], [descripcion], [URL])';
            $SQL .= 'VALUES (?, ?, ?, ?);';
            $inst = $db->prepare($SQL);
            $inst->execute(array($_REQUEST['plataforma'], $_REQUEST['nombre'], $_REQUEST['descripcion'], $_REQUEST['url']));
        } else {
            echo 'El juego ya existe';
        }
    }

View::end();