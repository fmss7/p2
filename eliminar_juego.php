<?php
    header('Location: index.php');
    include_once 'lib.php';

    $db=getDB(); 
    $st=$db->prepare("DELETE FROM juegos WHERE id= ?");
    $st->execute(array($_REQUEST['id']));
?> 


 


