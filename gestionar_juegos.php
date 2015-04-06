<?php
include_once 'lib.php';
View::start('Gestionar Juegos');
View::navigation();

    $db = getDB();
    $res=$db->prepare('SELECT id, plataforma, nombre FROM juegos;');
    $res->execute();
    
    if($res){
        $res->setFetchMode(PDO::FETCH_NAMED);
        $first=true;
        
        foreach($res as $game){
            if($first){
                echo "<table border='1' style=border-collapse:collapse><tr>";
                foreach($game as $field=>$value){
                    echo "<th>$field</th>";
                }
                $first = false;
                echo "</tr>";
            }
            echo "<tr>";
            foreach($game as $value){
                echo "<th>$value</th>";
            }
            
            echo '<form action="ofrecer_juego.php" method="post">';
                echo '<td><input type="submit" name="ofrecer" value="Ofrecer Juego" /></td>';
                echo'<input name="id" type="hidden" value="'.$game['id'].'">';
            echo '</form>';
            echo '<form action="retirar_juego.php" method="post">';
                echo '<td><input type="submit" name="retirar" value="Retirar Juego" /></td>';
                echo'<input name="id" type="hidden" value="'.$game['id'].'">';
            echo '</form>';
            
            echo "</tr>";
        }
        echo '</table>';
        
    }