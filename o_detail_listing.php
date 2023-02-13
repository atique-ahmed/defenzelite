<?php
require("global_functions.php");
$conn = getConn();

  $sql = "SELECT o.id as o_id, a.name as a_name, a.id as admin_id, u.id as user_id, u.name as u_name, u.quota as u_quota, o.order_date FROM orders as o LEFT JOIN admins as a on a_id=a.id LEFT JOIN users as u on u_id=u.id ORDER BY o.order_date DESC";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $records = $stmt->fetchAll();


// print_r($records);
$conn = null;
?>
<html>
<br><br>
    <a class="btn btn-secondary" href = "add_orders.php">Place Order</a>
    <h1>Orders Listing</h1>
    <table class="table table-bordered">
        
        <thead>
            <th>User Name</th>
            <th>Admin Name</th>
            <th>User Quota</th>
            <th>Order Time</th>
        </thead>
        
        <?php foreach ($records as $user){ ?>
            <tbody>
                <tr>
                    <td><?php echo $user["u_name"]?></td>
                    <td><?php echo $user["a_name"]?></td>
                    <td><?php echo $user["u_quota"]?></td>
                    <td><?php echo $user["order_date"]?></td>
                </tr>
                
                <?php } ?>
                
            </tbody>
        </table>
        
        </html>