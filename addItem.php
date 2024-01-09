<?php
include 'database.php';

// รับข้อมูล JSON จากแอปพลิเคชัน
$data = json_decode(file_get_contents("php://input"));

// ตรวจสอบข้อมูล
if (!empty($data->userID) && !empty($data->description) && !empty($data->category)) {
    $userID = $data->userID;
    $description = $data->description;
    $category = $data->category;
    $condition = $data->condition;
    $status = 'Available';

    // สร้าง SQL Query
    $sql = "INSERT INTO Items (UserID, Description, Category, Condition, Status) VALUES ('$userID', '$description', '$category', '$condition', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Required data is missing";
}

$conn->close();
?>
