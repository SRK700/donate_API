<?php
include 'database.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->username) && !empty($data->password)) {
    $sql = "SELECT UserID, Password FROM Users WHERE Username = '$data->username'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($data->password, $row['Password'])) {
            echo "Login successful";
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }
} else {
    echo "Required data is missing";
}

$conn->close();
?>
