<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="customerlist.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View all Customers</title>
</head>
<body class="customers">
<h1 class="heading">All Customers</h1>
<p><a href="index.php">&lt&lt Back to home</a></p>
<p class="custmrs">Click on your first name to view your balance details</p>
<script src="main.js"></script>
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "1234Shubham@";
$dbname = "basic_banking_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn-> connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM customers";
$result = $conn->query($sql);

echo "<div class='viewcustomer'>";
echo "<table border='1' class='tableformat'>
   <tr>
   <th>Customer Id</th>
   <th>First Name</th>
   <th>Last Name</th>
   <th>Phone No</th>
   <th>Email</th>
   </tr>";


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Customer_Id"] ."</td><td><a href='details.php?cid=$row[Customer_Id]'>" . $row["first_name"] ."</a></td><td>". $row["last_name"] ."</td><td>". $row["phone_no"] ."</td><td>". $row["email"] ."</td></tr>";
    }
} else {
    echo "0 results";
}
// $var= $_GET['cid'];

echo "</table>";
echo "</div>";
$conn->close();

?>
    
</body>
</html>

