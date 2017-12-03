<?php
//12/2/17 10:25 edited file name
/**
 * Created by PhpStorm.
 * User: Joshua
 * Date: 12/2/2017
 * Time: 10:24 PM
 */
$server = "localhost";
$dbUsername = "root";
$dbPassword = "";
$database = "dboces";

$connect = new mysqli($server, $dbUsername, $dbPassword, $database);

if ($connect->connect_error)
{
    die("Database Connection Failed:" . $connect->connect_error);
}