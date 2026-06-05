<?php
const DBHOST = "localhost";
const DBUSER = "root";
const PASSWORD = "";
const DB = "login";

function connect()
{
    $conexion = mysqli_connect(DBHOST, DBUSER, PASSWORD, DB);
    return $conexion;

}
