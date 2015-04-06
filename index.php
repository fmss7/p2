<?php
include_once 'lib.php';
View::start('index');
View::navigation();

echo '<div id="busqueda">';
    echo '<form action="busqueda.php" method="post">';
        echo '<input type="search" name="busqueda" value="" />';
        echo '<input type="submit" name="buscar" value="Buscar videojuego" />';
    echo '</form>';
echo '</div>';

echo '<div id="divlogo">';
    echo '<img src="logo.jpg" alt="logo página" />';
echo '</div>';

echo '<div id="texto_index">';

    echo '<p>Game Store es una página Web de intercambio de videojuegos. En ella puedes buscar los videojuegos que se 
            están intercambiando en ese momento y registrarte para tener ventajas exclusivas tales como ver cuántas unidades
            hay disponibles de un juego u ofrecer tú mismo videojuegos para el intercambio, entre otras posibilidades.</p>';
    
    echo '<p> Si quieres empezar a buscar videojuegos de este momento, puedes hacerlo mediante el buscador de la página o ver
            la lista con todos los disponibles a través de este Link.</p>';

echo '<a href="muestra_juegos.php"<>Listado de videojuegos</a>'; 

View::end();