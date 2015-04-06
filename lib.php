<?php

class View{
    public static function  start($title){
        session_start();
        $html = "<!DOCTYPE html>
        <html>
            <head>
                <meta charset=\"utf-8\">
                <link rel='stylesheet' type='text/css' href='estilos.css' />
            <title>$title</title>
            </head>
            <body>";
        echo $html;
    }
    public static function navigation(){
        $html ='<nav id="nav">';
        $html .= '<a href="index.php">Home</a> ';

        if (isset($_SESSION['tipo'])){
            if ($_SESSION['tipo'] == 0){
                $html .= '<a href="modificar_perfil.php">Perfil</a> '; 
                $html .= '<a href="gestionar_juegos.php">Gestionar Juegos</a> '; 
                $html .= '<a href="logout.php">Salir</a> ';
                echo '<span class="bienvenido">';
				echo 'Bienvenido ' . $_SESSION['username'];                
            	echo '</span>';
			}else if ($_SESSION['tipo'] == 1) {
                $html .= '<a href="modificar_perfil.php">Perfil</a> ';
                $html .= '<a href="gestionar_juegos.php">Gestionar Juegos</a> '; 
                $html .= '<a href="pagina_admin.php">Admin</a> ';
                $html .= '<a href="logout.php">Salir</a> '; 
				echo '<span class="bienvenido">';
                echo 'Bienvenido administrador ' . $_SESSION['username'];
            	echo '</span>';
			}
            
        }else{
            $html .= '<a href="login.php">Login</a> ';
            $html .= '<a href="registrarse.php">Registrarse</a> ';

        }
		echo '<br /><br />';
        
        $html .= '<a href="comprobacion.php">Comprobación</a> ';
        $html .= '</nav>';
        echo $html;
    }
    
    public static function eliminar_juego($id) {
        echo '<form action="eliminar_juego.php" method="post">';
            echo '<td><input type="submit" name="boton" value="Eliminar Juego" /></td>';
            echo'<input name="id" type="hidden" value="'.$id.'">';
        echo '</form>';
    }
    
    public static function modificar_juego($id) {
        echo '<form action="modificar_juego.php" method="post">';
            echo '<td><input type="submit" name="boton" value="Modificar Juego" /></td>';
            echo'<input name="id" type="hidden" value="'.$id.'">';
        echo '</form>';
    }
    
    public static function mostrar_usuarios($id, $cantidad) {
        echo "<th><a href=mostrar_usuarios.php?id=$id>$cantidad</a></th>";
    }
    
    public static function end(){
        echo '</body></html>';
    }
    
}

function getDB(){
    $db = new PDO("sqlite:./datos.db");
    $db->exec('PRAGMA foreign_keys = ON;'); //Activa la integridad referencial para esta conexión
    return $db;
}
