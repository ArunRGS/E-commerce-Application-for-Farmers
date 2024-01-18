<!DOCTYPE html>
<html>


  <header>
  <h1>Marketer_page</h1>
 <p>Welcome, <?php echo $_GET['user_id']; ?>!</p>
</header>


<body>
  <div class="navbar">
  <a href="home.html" style="color: white;padding-bottom:10px; padding-top: 30px;" >Home</a>
 <h1 style="color: white;padding-right:65px;text-align: center">SEARCH PRODUCTS</h1>
</div>

<div class="search-boxes">
  <form method="get">
    <label for="Product_type">Product_type:</label>
    <input type="text" id="Product_type" name="Product_type"><br><br>

    <label for="Product_name">Product_name:</label>
    <input type="text" id="Product_name" name="Product_name">

    <?php if (isset($_GET['user_id'])): ?>
        <input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>">
      <?php endif; ?>

    <input type="submit" value="Search">
  </form>
</div>

<div class="crud">
  <table>
    <tr>
      <th>Id</th>
      <th>Product_type</th>
      <th>Product_name</th>
      <th>Validity_from</th>
      <th>Validity_to</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>District</th>
      <th>Place</th>
      <th>Product_description</th>
      <th>Action</th>
    </tr>
 

     <?php
include 'connect.php';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    // Use the user_id for further processing or display
    echo "User ID: " . $user_id;
} else {
    // User ID is not provided
    echo "User ID not found. First of all, you must have to login!!!";
}

// Fetch data from database based on search criteria
$conn = mysqli_connect("localhost", "root", "", "project");

// Check if search criteria is provided
if (isset($_GET['Product_type']) && isset($_GET['Product_name'])) {
    $Product_type = $_GET['Product_type'];
    $Product_name = $_GET['Product_name'];

    // Prepare the SQL query with search criteria
    $sql = "SELECT * FROM agromart WHERE Product_type LIKE '%$Product_type%' AND Product_name LIKE '%$Product_name%'";
} else {
    // If no search criteria provided, fetch all data
    $sql = "SELECT * FROM agromart";
}

$result = mysqli_query($conn, $sql);

// Display data in table
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row['Id']."</td>";
    echo "<td>".$row['Product_type']."</td>";
    echo "<td>".$row['Product_name']."</td>";
    echo "<td>".$row['Validity_from']."</td>";
    echo "<td>".$row['Validity_to']."</td>";
    echo "<td>".$row['Quantity']."</td>";
    echo "<td>".$row['Farmer_expected_price']."</td>";
    echo "<td>".$row['District']."</td>";
    echo "<td>".$row['Place']."</td>";
    echo "<td>".$row['Product_description']."</td>";
    echo "<td>";
    echo "<a href='add_to_cart.php?Id=".$row['Id']."&user_id=". (isset($_GET['user_id']) ? $_GET['user_id'] : '') ."'>Add to Cart</a>";
    echo "</td>";
    echo "</tr>";
}

mysqli_close($conn);
?>
  </table>
</div>

<style>
.navbar {
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

.navbar a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  background-color: black;
}

.navbar a:hover {
  background: #ddd;
  color: black;
}             
    table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

th {
  background-color: #333;
  color: white;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #ddd;
}

a {
  color: black;
  text-decoration: none;
}

a:hover {
  color: #000;
}

input[type="submit"] {
  background-color: #4CAF50; /* Green background */
  border: none;
  color: white; /* White text */
  padding: 12px 20px; /* Some padding */
  text-align: center; /* Centered text */
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 5px;
}
a {
  color: #555;
  text-decoration: none;
  background-color: #f2f2f2;
  padding: 8px 16px;
  border-radius: 4px;
}
.button {
    display: inline-block;
    padding: 6px 12px;
    font-size: 14px;
    font-weight: 600;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    background-image: none;
    border:2px solid black;
    border-radius: 4px;
    color:blue;
    text-decoration: none;
    margin-right: 6px;
}

.button:hover {
    background-color: #f5f5f5;
    border-color: #adadad;
    color: #333;
    text-decoration: none;
}

.button:active,
.button.active {
    background-color: #e6e6e6;
    border-color: #adadad;
    color: #333;
    box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
    text-decoration: none;
}


</style> 
</body> 
</html>




