<?php
    include_once 'lib.php';
    View::start("Eliminar socio"); 
    View::navigation();

    echo'<form action="eliminar_socio.php" method="post">';
        echo'<fieldset>';
            echo'<legend>Introduzca usuario a eliminar</legend>';
            echo'<input type="text" name="user" value="" />';
            echo'<br/>';
        echo'</fieldset>';
		echo '<br />';
        echo'<input type="submit" value="confirmar">';
    echo'</form>';
    
if (isset($_REQUEST['user'])) {
    $db=getDB(); 
    
    $st=$db->prepare("SELECT tipo FROM usuarios WHERE usuario= ?;");
    $st->execute(array($_REQUEST['user']));
    $st->setFetchMode(PDO::FETCH_NAMED);
    $tipoUsuario = $st->fetch()['tipo'];
    
    if ($tipoUsuario == 1) {
        echo "El usuario ".$_REQUEST['user']." no se puede eliminar porque es un administrador";    
    } else {
        $st=$db->prepare("DELETE FROM usuarios WHERE usuario=?");
        $st->execute(array($_REQUEST['user']));
        if ($st->rowCount() > 0) {
            echo "El usuario ".$_REQUEST['user']." fue eliminado";
        } else {
            echo "El usuario ".$_REQUEST['user']." no existe";
        }
    }
}

View::end();