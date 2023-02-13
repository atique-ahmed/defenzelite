<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"
<body>
<a class="btn btn-secondary" href = "a_listing.php">Admin Listing</a>

<a class="btn btn-secondary" href = "u_listing.php">User Listing</a>
    <a class="btn btn-secondary" href = "o_detail_listing.php">Orders Listing</a>
        <a class="btn btn-secondary" href = "o_listing.php">User Quota Listing</a>
</body>
<?php 
function getConn() {
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "laravel";  
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);//sql Injection method -1
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    return $conn;
}
?>