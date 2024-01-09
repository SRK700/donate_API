<?php
include 'database.php';

$sql = "SELECT * FROM Items WHERE Status = 'Available'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ItemID: " . $row["ItemID"]. " - Description: " . $row["Description"]. " - Category: " . $row["Category"]. "<br>";
    }
} else {
    echo "No items found";
}

$conn->close();
?>
