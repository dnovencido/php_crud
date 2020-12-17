<?php
    function get_post($connection, $var) {
        return $connection->real_escape_string($_POST[$var]);
    }
?>