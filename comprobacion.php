<?php
include_once 'lib.php';
View::start('Comprobación');
View::navigation();    

    $db =getDB();
    $res=$db->prepare('SELECT * FROM usuarios;');
    $res->setFetchMode(PDO::FETCH_NAMED);
    $res->execute();
        foreach($res as $user){
            print_r($user);

        }    
    ?>

View::end();