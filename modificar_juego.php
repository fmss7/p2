<?php
include_once 'lib.php';
View::start("Modificar juego");    
View::navigation();
$id=$_REQUEST['id'];
$db = getDB();

if (isset($_REQUEST['nombre'])){
    $inst = $db->prepare('UPDATE juegos SET nombre= ?, plataforma= ?, descripcion= ?, URL= ? WHERE id= ?');
    $inst->execute(array($_REQUEST['nombre'], $_REQUEST['plataforma'], $_REQUEST['descripcion'], $_REQUEST['URL'], $id));
    if($inst->rowCount() > 0){
        echo 'El juego se ha modificado correctamente.';
    }else{
        echo 'El juego no se ha modificado';
    }
}

$st=$db->prepare('SELECT * FROM juegos WHERE id= ? ');
$st->execute(array($id));
$st->setFetchMode(PDO::FETCH_NAMED);
$aux = $st->fetch();

  
echo '<h2>Página de Modificación del Juego</h2>';
echo'<form action="modificar_juego.php" method="post" >';
    echo'<fieldset>';
    
        echo'<legend>Datos del juego</legend>';
        echo'<input name="id" type="hidden" value="'.$id.'">';
        
        echo'Nombre <br/>';
        echo'<textarea name="nombre">'.$aux['nombre'].'</textarea>';
        echo'<br/>';
        
        echo'Plataforma <br/>';
        echo'<input type="text" name="plataforma" value='.$aux['plataforma'].' />';
        echo'<br/>';
         
        echo'Descripción <br/>';
        echo'<textarea name="descripcion">'.$aux['descripcion'].'</textarea>';
        echo'<br/>';
         
        echo'URL <br/>';
        echo'<input type="text" name="URL" value='.$aux['URL'].' />';
        echo '<br />';
        
    echo'</fieldset>';
    echo'<input type="submit" value="confirmar">';
echo'</form>';

View::end();