<?php
include('assets/php/config.php');

//Query params
$q = $_REQUEST["q"];

$object->query = "
    SELECT english FROM translate WHERE user_sesid ='". $_SESSION['sesid'] ."' 
    ";

$object->execute();

$english = $object->fetch();
echo $english;
?>