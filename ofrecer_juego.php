<?php
include_once 'lib.php';
header('Location: gestionar_juegos.php');

$id = $_REQUEST['id'];
        
        
$inst=$db->prepare('SELECT * FROM cambiables WHERE juego=?;');
$inst->execute($id);
$st= $inst->fetchAll();

if($st['usuario'] != $_SESSION['id']){
        $SQL ='INSERT INTO [cambiables] ([juego], [usuario])';
        $SQL .= 'VALUES (?, ?);';
        $inst = $db->prepare($SQL);
        $inst->execute(array($id, $_SESSION['id']));
}