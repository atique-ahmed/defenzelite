<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laravel";


  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$u_id = $_REQUEST['u_id'];

// $sql = "SELECT id FROM executives WHERE name='$exe_name'"; 
// $sql = "SELECT DISTINCT(u.id) as u_id, COUNT(u.id) as bought, u.quota as u_quota, (u.quota - COUNT(u.id)) as balance FROM orders as o LEFT JOIN admins as a on a_id=a.id LEFT JOIN users as u on u_id=u.id  WHERE u.id=$u_id GROUP BY u.id"  ;
// $sql = "SELECT DISTINCT(u.id) as u_id, COUNT(u.id) as bought, u.quota as u_quota, (u.quota - COUNT(u.id)) as balance FROM orders as o LEFT JOIN admins as a on a_id=a.id LEFT JOIN users as u on u_id=u.id  WHERE u.id=$u_id GROUP BY u.id"  ;
$sql = "SELECT DISTINCT(u.id) as u_id, COUNT(u.id) as bought, u.quota as u_quota, (u.quota - COUNT(u.id)) as balance FROM orders as o LEFT JOIN admins as a on a_id=a.id LEFT JOIN users as u on u_id=u.id  WHERE u.id=$u_id GROUP BY u.id";
    error_log("==============SQL: $sql==============\n\n");

$result = $conn->prepare($sql); 
$result->execute(); 
$records = $result->fetch(); 

$conn = null;

$json_data = array(
    "data" => $records
);

echo json_encode($json_data);
