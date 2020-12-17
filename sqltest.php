<?php

    include 'function.php';
    require_once 'db.php';

    if (isset($_POST['title']) && isset($_POST['author'])) {
        $author = get_post($connection, 'author');
        $title = get_post($connection, 'title');
        $year = get_post($connection, 'year');

        $query = "INSERT INTO book (title, author, year) VALUES ('$title', '$author', '$year')";

        $result = $connection->query($query);

        if (!$result) 
            echo "INSERT failed: $query <br>" . $connection->error . "<br><br>";
        else 
            header('Location: form.php');
    } 

?>