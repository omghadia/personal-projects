<?php
session_start();
$conn = mysqli_connect('localhost','root','','test1');
if (!$conn) {
    echo 'Connection Failed';
}
?>