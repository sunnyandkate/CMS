<?php

    $connection = mysqli_connect('localhost', 'root', '', 'cms');

    if(!$connection){

        echo 'connection error: ' . mysqli_connect_error();
    }
?>