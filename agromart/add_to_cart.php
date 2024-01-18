<!DOCTYPE html>
<html>
<head>
    <title>Add to Cart</title>
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
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background: grey;
  color: black;
  padding-top: 10px;
}
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        p {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            text-decoration: none;
            color: #333;
            padding: 5px 10px;
            border-radius: 3px;
            background-color: black;
            color: #fff;
        }

        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="navbar">
  <a href="home.html" style="color: white;padding-bottom:10px; padding-top: 30px;" >Home</a>
 <h1 style="color: white;padding-right:65px;text-align:center">ADD TO CART</h1>
</div>
    <?php
    include 'connect.php';

    if (isset($_GET['Id']) && isset($_GET['user_id'])) {
        $Id = $_GET['Id'];
        $user_id = $_GET['user_id'];

        // Establish a database connection
        $conn = mysqli_connect("localhost", "root", "", "project");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch data from the agromart table for the specified Id
        $sql = "SELECT * FROM agromart WHERE Id = $Id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);

            // Display the user_id at the top of the page
            echo "<h1>Marketer_page</h1>";
            echo "<p>Welcome, $user_id!</p>";

            // Display the fetched data as a table
            echo "<table>";
            echo "<tr>";
            echo "<th>Id</th>";
            echo "<th>Product_type</th>";
            echo "<th>Product_name</th>";
            echo "<th>Validity_from</th>";
            echo "<th>Validity_to</th>";
            echo "<th>Quantity</th>";
            echo "<th>Price</th>";
            echo "<th>District</th>";
            echo "<th>Place</th>";
            echo "<th>Product_description</th>";
            echo "<th>Action</th>";
            echo "</tr>";

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
            echo "<td><a href='proceed_to_buy.php?Id=".$row['Id']."&user_id=".$user_id."'>Proceed to Buy</a></td>";
            echo "</tr>";

            echo "</table>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        echo "Id or user_id not provided.";
    }
    ?>
</body>
</html>
