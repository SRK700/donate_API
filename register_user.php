<?php
include 'database.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->username) && !empty($data->password) && !empty($data->email)) {
    // เข้ารหัสรหัสผ่าน
    $password = password_hash($data->password, PASSWORD_DEFAULT);

    // สร้าง SQL Query
    $sql = "INSERT INTO Users (Username, Password, Email, ContactInfo) VALUES ('$data->username', '$password', '$data->email', '$data->contactInfo')";

    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Required data is missing";
}

$conn->close();
?>
