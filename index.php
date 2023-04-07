<?php
session_start();
error_reporting(0);
if($_SESSION['nombre']!=NULL && $_SESSION['id']!= NULL){
    header('location: Controlador/LoginCTRL.php');
}else{
include_once('Vista/Login.html');    
}
