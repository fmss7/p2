<?php
include_once 'lib.php';
View::start('Registrarse');
View::navigation();
    
    $db =getDB();
    $res=$db->prepare('SELECT * FROM usuarios;'); 
    $res->setFetchMode(PDO::FETCH_NAMED);
    $res->execute();
    $booleano = false;
    if($_REQUEST['nombre'] == '' || $_REQUEST['e-mail'] == '' || $_REQUEST['user'] == '' || $_REQUEST['password'] == ''){
        echo 'Alguno/s de los campos que ha introducido está vacío.';
        echo '</br>';
        echo '<a href="registrarse.html">Volver a Registrarse</a>';
        $booleano=true;
    }
    if ((md5($_REQUEST['password']) != md5($_REQUEST['password2']))) {
         
        echo 'Las contraseñas no coinciden. Por favor repita la contraseña correctamente.';
        echo '</br>';
        echo '<a href="registrarse.html">Volver a Registrarse</a>';
        $booleano = true;
    }
    foreach($res as $user){
        
        if ($booleano == true) break;
        foreach($user as $field=>$aux2) {
            
            if ($field == 'usuario') {
                 if ($aux2 == $_REQUEST['user']) {
                    echo 'El usuario ya existe. Por favor introduzca otro nombre de usuario.';
                    echo '</br>';
                    echo '<a href="registrarse.html">Volver a Registrarse</a>';
                    $booleano = true;
                    break;
                 }
            }
            if ($field == 'e-mail') {
                 if ($aux2 == $_REQUEST['e-mail']) {
                     echo 'El correo ya está en uso. Por favor introduzca otra cuenta de correo diferente.';
                     echo '</br>';
                     echo '<a href="registrarse.html">Volver a Registrarse</a>';
                     $booleano = true;
                     break;
                 }
             }
             
        }
    }    
    if ($booleano == false) {
        echo 'El Usuario se ha registrado correctamente';
        echo '</br>';
        $SQL ='INSERT INTO [usuarios] ([usuario], [clave], [nombre], [email], [tipo])';
        $SQL .= 'VALUES (?, ?, ?, ?, 0);';
        $inst = $db->prepare($SQL);
        
        $inst->execute(array($_REQUEST['user'],
                           md5($_REQUEST['password']),
                           $_REQUEST['nombre'],
                           $_REQUEST['e-mail'])
                      );
    }

View::end();