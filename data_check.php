<?php

session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

if ($data == false) {
    die("connection error");
}

if (isset($_POST['apply'])) {
    $data_name = $_POST['name'];
    $data_email = $_POST['email'];
    $data_phone = $_POST['phone'];
    $data_message = $_POST['message'];

    // Check if the table is empty
    $check_table = "SELECT COUNT(*) as count FROM admission";
    $result_check = mysqli_query($data, $check_table);
    $row = mysqli_fetch_assoc($result_check);

    if ($row['count'] == 0) {
        // Reset auto-increment if the table is empty
        $reset_auto_increment = "ALTER TABLE admission AUTO_INCREMENT = 1";
        mysqli_query($data, $reset_auto_increment);
    }

    // Insert the data
    $sql = "INSERT INTO admission(name, email, phone, message) VALUES ('$data_name', '$data_email', '$data_phone', '$data_message')";
    $result = mysqli_query($data, $sql);

    if ($result) {
        $_SESSION['message'] = "Your application was sent successfully";
        header("location:index.php");
    } else {
        echo "Apply Failed";
    }
}

?>
