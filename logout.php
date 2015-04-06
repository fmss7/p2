<?php
include_once 'lib.php';
View::start("Logout");    

unset($_SESSION['username']);
unset($_SESSION['email']);
unset($_SESSION['tipo']);
unset($_SESSION['id']);
unset($_SESSION['nombre']);

header('Location: index.php');

View::navigation();
View::end();