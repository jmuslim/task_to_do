<?php
include 'config.php';

$database = new Database();
$conn = $database->connect();

if($conn){
    echo "connection successful";
} else{
    echo "Unsuccessful";
}
?>