<?php

    include 'function.php';
    require_once 'db.php';

    if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['author']) && isset($_POST['year'])) {

        $id = $_POST['id'];
        $author = get_post($connection, 'author');
        $title = get_post($connection, 'title');
        $year = get_post($connection, 'year');

        $query = "UPDATE book SET title='$title', author='$author', year='$year' WHERE id='$id'";

        $result = $connection->query($query);

        if (!$result)
            echo "Failed to update: $query <br>" . $connection->error . "<br><br>";
        else 
            header('Location: form.php');
    } 

?>