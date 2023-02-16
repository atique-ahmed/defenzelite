<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laravel";


$u_id = $_REQUEST['u_name'];
$a_id = $_REQUEST['a_name'];


$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO orders (id, u_id, a_id) VALUES (NULL, '$u_id','$a_id' )";
    error_log("==============SQL: $sql==============\n\n");

    $result = $conn->prepare($sql);
    $result->execute();

header("Location: o_detail_listing.php");

?>