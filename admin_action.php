<?php
require("DB_configuration.php");
session_start();

if( isset($_GET['new_name']) ){
    $DB_connection->query("UPDATE administrator SET Name_Admin = '{$_GET['new_name']}' WHERE Id_Admin = '{$_SESSION['Id_Admin']}'");
    header("Location: logout.php?change=1");
}
if( isset($_GET['new_pass']) ){
    $DB_connection->query("UPDATE administrator SET Password_Admin = '{$_GET['new_pass']}' WHERE Id_Admin = '{$_SESSION['Id_Admin']}'");
    header("Location: logout.php?change=1");
}
?>