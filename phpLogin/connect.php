<?php
    $connect = new mysqli('localhost', 'root', 'root', 'skandi');
    if (!$connect) {
        die('Error');
    }
