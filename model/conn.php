<?php

    $conn = new mysqli("localhost", "root", "", "salvaCEP");

    if ($conn->connect_error) {

        echo "Error" . $conn->connect_error;

    }
?>