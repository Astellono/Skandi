<?php
    $connect = new mysqli('localhost', 'root', 'root', 'skandi' , '8889');
    if (!$connect) {
        die('Error');
    }
