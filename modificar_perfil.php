<?php
//include_once 'lib.php';
View::start("Perfil del Usuario");    

View::navigation();

$db = getDB();
$st=$db->prepare('SELECT * FROM usuarios WHERE usuario= ? ');
$st->execute(array($_SESSION['username']));
$st->setFetchMode(PDO::FETCH_NAMED);
$aux = $st->fetch()['nombre'];


$st=$db->prepare('SELECT * FROM usuarios WHERE usuario= ? ');
$st->execute(array($_SESSION['username']));
$st->setFetchMode(PDO::FETCH_NAMED);
$aux2 = $st->fetch()['email'];
  
echo '<h2>Página de Modificación del Perfil</h2>';
echo'<form action="confirmar_modif.php" method="post">';
    echo'<fieldset>';
        echo'<legend>Datos personales</legend>';
        echo'Nombre <br/>';
        echo'<input type="text" name="nombre" value='.$aux.' />';
        echo'<br/>';
        echo'E-mail <br/>';
        echo'<input type="text" name="e-mail" value='.$aux2.' />';
    echo'</fieldset>';

    echo'<fieldset>';
        echo'<legend>Datos de conexión</legend>';
        echo'Nombre de usuario<br/>';
        echo'<input type="text" name="user" value='.$_SESSION['username'].' />';
        echo'<br/>';
        echo'Contraseña<br/>';
        echo'<input type="password" name="password" value="" maxlength="10" />';
        echo'<br/>';
        echo'Repite la contraseña<br/>';
        echo'<input type="password" name="password2" value="" maxlength="10" />';
    echo'</fieldset>';
    echo'<input type="submit" value="confirmar">';
echo'</form>';


View::end();