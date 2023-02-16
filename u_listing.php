<?php
require("global_functions.php");
$conn = getConn();

  $sql = "SELECT id, name, quota  FROM users";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $records = $stmt->fetchAll();


// $conn = null;
?>
<html>
     
        
        <h1>User Listing</h1>
<table class="table table-bordered">

        <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Quota</th>
        </thead>

        <?php foreach ($records as $user){ ?>
        <tbody>
                <tr>
                        <td><?php echo $user["id"]?></td>
                        <td><?php echo $user["name"]?></td>
                <td><?php echo $user["quota"]?></td>
        </tr>
        
        <?php } ?>
        
</tbody>
</table>

</html>