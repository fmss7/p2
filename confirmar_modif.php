<?php
include_once 'lib.php';
View::start('Registrarse');
View::navigation();

    if($_REQUEST['nombre'] == '' || $_REQUEST['e-mail'] == '' || $_REQUEST['user'] == '' || $_REQUEST['password'] == ''){
        echo 'Alguno/s de los campos que ha introducido está vacío.';
        echo '</br>';
        echo '<a href="modificar_perfil.php">Volver a Modificar el perfil</a>';
        return;
    }
    if ((md5($_REQUEST['password']) != md5($_REQUEST['password2']))) {
         
        echo 'Las contraseñas no coinciden. Por favor repita la contraseña correctamente.';
        echo '</br>';
        echo '<a href="modificar_perfil.php">Volver a Modificar el perfil</a>';
        return;
    }
    
    $db =getDB();
    $res=$db->prepare('SELECT * FROM usuarios WHERE usuario=? '); 
    $res->setFetchMode(PDO::FETCH_NAMED);
    $res->execute(array($_REQUEST['user']));
    $aux = $res->fetch()['usuario'];
    
    $res=$db->prepare('SELECT * FROM usuarios WHERE email=? '); 
    $res->setFetchMode(PDO::FETCH_NAMED);
    $res->execute(array($_REQUEST['e-mail']));
    $aux2 = $res->fetch()['email'];

        
    if($aux == $_REQUEST['user'] && $_REQUEST['user'] != $_SESSION['username']){
        echo "El usuario " .$_REQUEST['user']. " ya existe";
        echo '<a href="modificar_perfil.php">Volver a Modificar el perfil</a>';
        return;
    } 
    
    if($aux2 == $_REQUEST['e-mail'] && $_REQUEST['e-mail'] != $_SESSION['email']){
        echo "El e-mail " .$_REQUEST['e-mail']. " ya existe";
        echo '<a href="modificar_perfil.php">Volver a Modificar el perfil</a>';
        return;
    }
    
    echo 'El Usuario se ha modificado correctamente';
    echo '</br>';
    $inst = $db->prepare('UPDATE usuarios SET usuario= ?, clave= ?, nombre= ?, email= ? WHERE id='.$_SESSION['id']);
    $inst->execute(array($_REQUEST['user'] , md5($_REQUEST['password']), $_REQUEST['nombre'] , $_REQUEST['e-mail']));
    
    $_SESSION['username'] = $_REQUEST['user'];
    $_SESSION['nombre'] = $_REQUEST['nombre'];
    $_SESSION['email'] = $_REQUEST['e-mail'];
                  
View::end();