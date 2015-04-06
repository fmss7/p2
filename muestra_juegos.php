<?php
include_once 'lib.php';
View::start('Listado de videojuegos');
View::navigation();

echo '<div id="busqueda">';
echo '<form action="busqueda.php" method="post">';
echo '<input type="search" name="busqueda" value="" />';
echo '<input type="submit" name="buscar" value="Buscar videojuego" />';
echo '</form>';
echo '</div>';

$db = getDB();
$res=$db->prepare('SELECT * FROM juegos;');
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
            echo '<th>Disponible</th>';
            $first = false;
            echo "</tr>";
        }
        echo "<tr>";
        foreach($game as $value){
            echo "<th>$value</th>";
        }
        
        $inst=$db->prepare('SELECT * FROM cambiables WHERE juego=?;');
        $inst->execute(array($game['id']));
        $st= $inst->fetchAll();
        $cantidad=count($st);
        
        if (isset($_SESSION['nombre'])) {
            view::mostrar_usuarios($game['id'], $cantidad);
            if ($_SESSION['tipo'] == 1) {
                view::eliminar_juego($game['id']);
                view::modificar_juego($game['id']);
            }
        }else if($cantidad > 0){
            echo '<th>Si</th>';
        }else{
            echo '<th>No</th>';
        }
        echo "</tr>";
    }
    echo '</table>';
}

View::end();