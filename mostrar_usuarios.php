<?php
    include_once 'lib.php';
    View::start('MOstrar Usuarios');
    View::navigation();
    $id = $_GET['id'];
    $db=getDB(); 
    $inst=$db->prepare('SELECT usuarios.id, usuarios.usuario, usuarios.nombre, usuarios.email  FROM usuarios inner join cambiables on cambiables.usuario=id WHERE cambiables.juego=?;');
    $inst->execute(array($id));
    echo '<br>';
    if($inst){
        $inst->setFetchMode(PDO::FETCH_NAMED);
        $first=true;
        
        foreach($inst as $game){
            if($first){
                echo "<table border='1' style=border-collapse:collapse><tr>";
                foreach($game as $field=>$value){
                    echo "<th>$field</th>";
                }
                echo '<th>Disponibles</th>';
                $first = false;
                echo "</tr>";
            }
            echo "<tr>";
            foreach($game as $value){
                echo "<th>$value</th>";
            }
            echo '<th>Si</th>';
        }
            echo '<tr />';
    }