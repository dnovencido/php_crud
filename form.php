<?php
    include "header.php";
?>
<body>
    <div id="form">
        <form action="sqltest.php" method="post">
            <label for="title">Title</label><input type="text" class="form" name="title">
            <label for="author">Author</label><input type="text" class="form" name="author">
            <label for="year">Year</label><input type="text" class="form" name="year">
            <input type="submit" value="ADD RECORD">
        </form>
    </div>
    <div class="clear-fix"></div>
    <div id="list">
        <?php
            require_once 'db.php';

            $query = "SELECT * FROM book"; 

            $result = $connection->query($query);
            if (!$result) die($connection->error);

            $rows = $result->num_rows;
            
            if($rows > 0) {
                for ($j = 0 ; $j < $rows ; ++$j) {
                    
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    
                    echo 'Title : ' .$row['title']. '<br>';
                    echo 'Author : ' .$row['author']. '<br>';
                    echo 'Year : ' .$row['year']. '<br>';
                    
                    echo <<<_END
                        <a id="view" href="view.php?id=$row[id]"><button>VIEW RECORD</button></a>
                        <form action="delete.php" method="post">
                            <input type="hidden" name="delete" value="yes"> 
                            <input type="hidden" name="id" value="$row[id]"> 
                            <input type="submit" value="DELETE RECORD">
                        </form>
                        <hr>
                    _END;
                }
            } else {
                echo 'No book(s) found';
            }

            $result->close();
            $connection->close(); 
        ?>        
    </div>
</body>
</html>