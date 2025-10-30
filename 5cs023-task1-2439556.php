<?php
// Database connection details
$servername = "localhost";  
$username = "2439558";  
$password = "!n#ufF(Yyx83_hU2";  
$dbname = "db2439558";  

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data from the 'books' table
$sql = "SELECT Book_id, `Book name`, genre, price, Date_of_release FROM Books";
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    die("Error executing query: " . $conn->error);
}

// Start HTML output
echo "<!DOCTYPE html>
<html>
<head>
<title>Book List</title>
<style>
  body { font-family: Arial, sans-serif; margin: 20px; }
  h1 { color: #333; }
  table { border-collapse: collapse; width: 80%; }
  th, td { border: 1px solid #999; padding: 8px; text-align: left; }
  th { background-color: #f2f2f2; }
</style>
</head>
<body>
<h1>Book List</h1>
<table>
<tr>
    <th>Book ID</th>
    <th>Book Name</th>
    <th>Genre</th>
    <th>Price</th>
    <th>Date of Release</th>
</tr>";

// Check if there are results
if ($result->num_rows > 0) {
    // Loop through the result and display each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["Book_id"]) . "</td>
                <td>" . htmlspecialchars($row["Book name"]) . "</td>
                <td>" . htmlspecialchars($row["genre"]) . "</td>
                <td>£" . number_format($row["price"], 2) . "</td>
                <td>" . htmlspecialchars($row["Date_of_release"]) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<tr><td colspan='5'>No records found</td></tr></table>";
}

echo "</body></html>";

// Close connection
$conn->close();
?>