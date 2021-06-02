<?php

function createDb()
{
    $severName = "localhost:3306";
    $userName = "root";
    $password = "789952a@";
    $dbName = "php_crud";

    //create connection
    $con = mysqli_connect($severName, $userName, $password);

    //check connection
    if (!$con) {
        die("Connection Failed:" . mysqli_connect_error());
    }

    //create db
    $sql = "create database if not exists $dbName";

    if (mysqli_query($con, $sql)) {
        $con = mysqli_connect($severName, $userName, $password, $dbName);

        $sql = "
                        CREATE TABLE IF NOT EXISTS books(
                            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            name VARCHAR (25),
                            publisher VARCHAR (20),
                            price float
                        );
        ";
        if (mysqli_query($con, $sql)) {
            return $con;
        } else {
            echo "Cannot create table";
        }
    } else {
        echo "Error while creating database" . mysqli_error($con);
    }
}
