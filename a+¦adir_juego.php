<?php
include_once 'lib.php';
View::start('Añadir Juego');
View::navigation();

echo '<h2>Añadir Juego</h2>';
echo'<form action="confirmar_juego.php" method="post">';
    echo'<fieldset>';
        echo'<legend>Datos del Juego</legend>';
        echo'Plataforma <br/>';
        echo'<input type="text" name="plataforma" value="" />';
        echo'<br/>';
        echo'Nombre <br/>';
        echo'<input type="text" name="nombre" value="" />';
        echo'<br/>';
        echo'Descripción <br/>';
        echo'<input type="text" name="descripcion" value="" />';
        echo'<br/>';
        echo'URL <br/>';
        echo'<input type="text" name="url" value="" />';
        echo'<br/>';
        echo'<input type="submit" value="Confirmar" />';
        
    echo'</fieldset>';
echo'</form>';

View::end();