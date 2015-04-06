<?php
include_once 'lib.php';
View::start("Login");
View::navigation();

echo '<h5>Inicia Sesión</h5>';
echo'<form action="login.php" method="post">';
    echo'<fieldset>';
    echo'<legend>Usuario</legend>';
    echo'<input type="text" name="user" value="" />';
    echo'<br/>';
    echo'<legend>Contraseña</legend>';
    echo'<input type="password" name="password" value="" />';
    echo'</fieldset>';
    echo'<br/>';
    echo'<input type="submit" value="Entrar">';
echo '</form>';

if (isset($_REQUEST['user'])) {
    
    $db = getDB();
    $inst=$db->prepare('SELECT * FROM usuarios WHERE usuario= ? and clave=?;');
    $inst->execute(array($_REQUEST['user'],md5($_REQUEST['password'])));
    $inst->setFetchMode(PDO::FETCH_NAMED);
    $res = $inst->fetchAll();

    if(count($res)==1){
        $_SESSION['username'] = $_REQUEST['user'];
        
        $st=$db->prepare("SELECT tipo FROM usuarios WHERE usuario= ?;");
        $st->execute(array($_REQUEST['user']));
        $st->setFetchMode(PDO::FETCH_NAMED);
        $_SESSION['tipo'] = $st->fetch()['tipo'];
        
        $st=$db->prepare("SELECT email FROM usuarios WHERE usuario= ?;");
        $st->execute(array($_REQUEST['user']));
        $st->setFetchMode(PDO::FETCH_NAMED);
        $_SESSION['email'] = $st->fetch()['email'];
        
        $st=$db->prepare("SELECT id FROM usuarios WHERE usuario= ?;");
        $st->execute(array($_REQUEST['user']));
        $st->setFetchMode(PDO::FETCH_NAMED);
        $_SESSION['id'] = $st->fetch()['id'];
        
        $st=$db->prepare("SELECT nombre FROM usuarios WHERE usuario= ?;");
        $st->execute(array($_REQUEST['user']));
        $st->setFetchMode(PDO::FETCH_NAMED);
        $_SESSION['nombre'] = $st->fetch()['nombre'];
        
        header('Location: index.php');
    }
    echo '<h2>Login fallido. Usuario y/o contraseña incorrectos</h2>';
}
View::end();