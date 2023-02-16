<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laravel";

// get admins
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT id, name  FROM admins";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $admins = $stmt->fetchAll();

// print_r($admins);
// $conn = null;

// get users
$sql1 = "SELECT id, name, quota  FROM users";
$stmt = $conn->prepare($sql1);
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$users = $stmt->fetchAll();
// print_r($users);
?>


<div class="container">
<h2>Add Orders</h2>

<form action="add_action_orders.php" style="margin-top:30px;">

<div class="mb-3">
<label for="u_name" class="form-label">User Name:</label><br>
<select name="u_name" id="u_name" class="form-select" onChange="checkQuota(event)" required autofocus>
<option id="u_name">---Select User---</option>
<?php
foreach($users as $u)
{
?> 
	<option value="<?php echo $u['id']; ?>" ><?php echo $u['name'];?></option>
<?php
}
?>
</select>
</div>
<div id="validation-msg" style="color:red"></div>

<div class="mb-3">
<label for="a_name" class="form-label">Admin Name:</label><br>
<select name="a_name" id="a_name" class="form-select" required >
<option id="a_name">---Select Admin---</option>
<?php
foreach($admins as $a)
{
?> 
	<option value="<?php echo $a['id']; ?>" ><?php echo $a['name'];?></option>
<?php
}
?>
</select>
</div>






  

 <!-- <div class="mb-3">
    <input placeholder="Role" class="form-control" name="role">
  </div> -->
  <button id="submit-btn" type="submit" class="btn btn-primary">Book LPG</button>
  <a class="btn btn-primary" href="add_orders.php">Cancel</a>
  <a class="btn btn-primary" href="o_listing.php">Back</a>
</form>
</div>
<script>
function checkQuota(event){
    var u_id = event.target.value;
    fetch(`./check_quota.php?u_id=${u_id}`)
    .then(res => res.json())
    .then(result => {
        var records = result['data'];
        // console.log(records['balance'] >= records['quota']);
        console.log(records['balance']);

        if(records['balance'] <= 0) {
            document.getElementById("validation-msg").innerHTML = `*Your quota is complete.`;
            document.getElementById("submit-btn").disabled = true;
        } 

	   else {
            document.getElementById("validation-msg").innerHTML = ``
            document.getElementById("submit-btn").disabled = false;
        }
       
    });
}


</script>