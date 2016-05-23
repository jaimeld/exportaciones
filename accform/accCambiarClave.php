<?php
require 'Usuario.php';

session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$oUsr=  unserialize($_SESSION['oUsr']);

if ($oUsr->ModificaClave($_POST["clave"])){
    echo json_encode(true);
    return;
 }
echo json_encode(false);
?>