<?php
require("global_functions.php");
$conn = getConn();


  $sql = "SELECT id, name  FROM admins";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $records = $stmt->fetchAll();


// print_r($records);
$conn = null;
?>
<html>
    
<h1>Admin Listing</h1>
    
    <table class="table table-bordered">
        
        <thead>
                <th>id</th>
                <th>Name</th>
            </thead>
            
            <?php foreach ($records as $user){ ?>
        <tbody>
                <tr>
                    <td><?php echo $user["id"]?></td>
                    <td><?php echo $user["name"]?></td>
                </tr>
                
                <?php } ?>
                
            </tbody>
        </table>
        
        </html>