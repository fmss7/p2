<?php
/*
    include_once 'lib.php';
    View::start("confirmar_eliminar");  


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
            echo "El usuario fue eliminado";
        } else {
            echo "El usuario no existe";
        }
    }
    */
View::navigation();
View::end();
