<?php
    $connect = new mysqli('MySQL-8.0', 'root', '', 'skandi');
    if (!$connect) {
        die('Error');
    }
