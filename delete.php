<?php

    require_once 'db.php';

    if (isset($_POST['delete'])) {

        $id = $_POST['id'];

        $query = "DELETE FROM book WHERE id='$id'";

        $result = $connection->query($query);

        if (!$result) 
            echo "Failed to delete: $query <br>" . $connection->error . "<br><br>";
        else 
            header('Location: form.php');
    } 

?>