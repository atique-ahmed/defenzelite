<?php
require("global_functions.php");
$conn = getConn();

$sql = "SELECT DISTINCT(u.id) as u_id, COUNT(u.id) as bought, a.name as a_name, a.id as admin_id, u.name as u_name, u.quota as u_quota, (u.quota - COUNT(u.id)) as balance FROM orders as o LEFT JOIN admins as a on a_id=a.id LEFT JOIN users as u on u_id=u.id GROUP BY u.id";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $records = $stmt->fetchAll();


$conn = null;
?>
<html>
    <br><br>
    <a class="btn btn-secondary" href = "add_orders.php">Place Order</a>
    <h1>User Quota Listing</h1>
    <table class="table table-bordered">
        
        <thead>
            <th>User Name</th>
            <th>User Quota</th>
            <th>Balance</th>
        </thead>
        
        <?php foreach ($records as $user){ ?>
            <tbody>
                <tr>
                    <td><?php echo $user["u_name"]?></td>
                    <!-- <td><?php echo $user["a_name"]?></td> -->
                    <td><?php echo $user["u_quota"]?></td>
                    <td><?php echo $user["balance"]?></td>
                </tr>
                
                <?php } ?>
                
            </tbody>
        </table>
        
        </html>