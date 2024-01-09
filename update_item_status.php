<?php
include 'database.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->userID) && !empty($data->itemID)) {
    $sql = "UPDATE Items SET Status = 'Reserved', ReceiverUserID = '$data->userID' WHERE ItemID = '$data->itemID' AND Status = 'Available'";

    if ($conn->query($sql) === TRUE) {
        echo "Item reserved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Required data is missing";
}

$conn->close();
?>
