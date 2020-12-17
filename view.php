<?php 
    include "header.php";
    require_once 'db.php'; 

    $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database); 
    
    if ($connection->connect_error) die($connection->connect_error);
    
    $query = "SELECT * FROM book WHERE id ='$_GET[id]'"; 
   
    $result = $connection->query($query);
    if (!$result) die($connection->error); 
    
    $rows = $result->num_rows;

    for ($j = 0 ; $j < $rows ; ++$j) {
        $row = $result->fetch_array(MYSQLI_ASSOC);

        echo <<<_END
            <form action="update.php" method="post">
                <input type="hidden" class="form" value="$row[id]" name="id">
                <label for="title">Title</label><input type="text" class="form" value="$row[title]" name="title">
                <label for="author">Author</label><input type="text" class="form" value="$row[author]" name="author">
                <label for="year">Year</label><input type="text" class="form" value="$row[year]" name="year">
                <input type="submit" value="UPDATE RECORD">
            </form>
        _END;
    }
    
    $result->close();
    $connection->close(); 
?>