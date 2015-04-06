<?php
include_once 'lib.php';
View::start("Búsqueda");
View::navigation();

$db = getDB();
$st=$db->prepare('SELECT * FROM juegos WHERE nombre= ?');
$st->execute(array($_REQUEST['busqueda']));
$st->setFetchMode(PDO::FETCH_NAMED);
$aux = $st->fetch()['nombre'];

if($_REQUEST['busqueda'] == ""){
    echo 'Introduzca un criterio de búsqueda';
}else if($aux == $_REQUEST['busqueda']){
    echo 'Se ha encontrado el juego: ' . $aux;
    echo '<br />';
    echo '<br />';
    $st=$db->prepare('SELECT * FROM juegos WHERE nombre=?;');
    $st->execute(array($_REQUEST['busqueda']));
    if($st){
        $st->setFetchMode(PDO::FETCH_NAMED);
        $first=true;
        
        foreach($st as $game){
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
            $res=$inst->fetchAll();
            $cantidad=count($res);
            
            if (isset($_SESSION['nombre'])) {
                view::mostrar_usuarios($game['id'], $cantidad);
            }else if($cantidad > 0){
                echo "<th>Si</th>";
            }else{
                echo "<th>No</th>";
            }
            echo "</tr>";
        }
        echo '</table>';
    }
}else{
    echo 'No se ha encontrado el juego.';
}

View::end();