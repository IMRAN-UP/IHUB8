<?php

require('DB_configuration.php');
session_start();

if ( isset($_GET['removed_departement_id']) ){

    $DB_connection->query("DELETE FROM departement WHERE Id_Depart = {$_GET['removed_departement_id']}");
    header("Location: departement.php");

}

if( isset($_GET['edited_departement_id']) ){
    
    if( !empty($_GET['new_departement_name']) ){
        
        $DB_connection->query("UPDATE departement SET Name_Depart = '{$_GET['new_departement_name']}' WHERE Id_Depart = {$_GET['edited_departement_id']}");
        header("Location: departement.php");

    }
}

if ( isset($_SESSION['Id_Admin']) ){
    if( !empty($_GET['name']) ){

        $DB_connection->query("INSERT INTO departement(Name_Depart,Id_Admin) VALUES ('{$_GET['name']}','{$_SESSION['Id_Admin']}') ");
        header("Location: departement.php");

    }
}
?>