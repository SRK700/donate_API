<?php
include 'database.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->donorUserID) && !empty($data->receiverUserID) && !empty($data->itemID)) {
    $sql = "INSERT INTO Transactions (ItemID, DonorUserID, ReceiverUserID, TransactionDate, Status) VALUES ('$data->itemID', '$data->donorUserID', '$data->receiverUserID', CURDATE(), 'Completed')";

    if ($conn->query($sql) === TRUE) {
        echo "Transaction recorded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Required data is missing";
}

$conn->close();
?>
