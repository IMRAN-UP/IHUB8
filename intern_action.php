<?php

require('DB_configuration.php');
session_start();

if ( isset($_GET['removed_intern_id']) ){

    $DB_connection->query("DELETE FROM intern WHERE Id_Intern = {$_GET['removed_intern_id']}");
    header("Location: intern.php");

}

if( isset($_GET['edited_intern_id']) ){
    
    if( !empty($_GET['new_first_name']) && !empty($_GET['new_last_name']) && !empty($_GET['new_birthday']) ){
        
        $DB_connection->query("UPDATE intern SET First_Name = '{$_GET['new_first_name']}', Last_Name = '{$_GET['new_last_name']}', Birthday = '{$_GET['new_birthday']}' WHERE Id_Intern = {$_GET['edited_intern_id']}");
        header("Location: intern.php");

    }
}

if ( isset($_SESSION['Id_Admin']) ){
    if( !empty($_GET['first_name']) && !empty($_GET['last_name']) && !empty($_GET['birthday']) ){

        $DB_connection->query("INSERT INTO intern(First_Name,Last_Name,Birthday,Id_Admin) VALUES ('{$_GET['first_name']}','{$_GET['last_name']}','{$_GET['birthday']}','{$_SESSION['Id_Admin']}') ");
        header("Location: intern.php");

    }
}
?>