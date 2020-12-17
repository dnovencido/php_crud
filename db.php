<?php
    
    //Connect to a database
    $db_hostname = 'localhost'; 
    $db_database = 'db_library'; 
    $db_username = 'root';
    $db_password = 'root';

    $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

    if ($connection->connect_error) die($connection->connect_error)
?>