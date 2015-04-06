<?php
include_once 'lib.php';
View::start('Registrarse');
View::navigation();

echo '<h2>Página de Registro</h2>';
echo '<form action="confirmar_reg.php" method="post">';
    echo '<fieldset>';
        echo '<legend>Datos personales</legend>';
        echo 'Nombre <br/>';
        echo '<input type="text" name="nombre" value="">';
        echo '<br/>';
        echo 'E-mail <br/>';
        echo '<input type="text" name="e-mail" value="" />';
    echo '</fieldset>';

    echo '<fieldset>';
        echo '<legend>Datos de conexión</legend>';
        echo 'Nombre de usuario<br/>';
        echo '<input type="text" name="user" value="" />';
        echo '<br/>';
        echo 'Contraseña<br/>';
        echo '<input type="password" name="password" value="" maxlength="12" />';
        echo '<br/>';
        echo 'Repite la contraseña<br/>';
        echo '<input type="password" name="password2" value="" maxlength="12" />';
    echo '</fieldset>';
    echo '<input type="submit" value="confirmar">';
echo '</form>';