<?php

error_reporting(0);
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["username"];
    $pass = $_POST["password"];

    // Debugging output
    echo "Username: " . $name . "<br>";
    echo "Password: " . $pass . "<br>";

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM user WHERE username = '".$name."' AND password = '".$pass."' ";
    $result = mysqli_query($data, $sql);

    // Check if the query was successful
    if (!$result) {
        die("Query failed: " . mysqli_error($data));
    }

    $row = mysqli_fetch_array($result);

    // Check if any row is returned
    if ($row) {
        echo "Usertype: " . $row["usertype"] . "<br>"; // Debugging output
        
        if ($row["usertype"] == "student") {

          
            $_SESSION['username']=$name;

            $_SESSION['usertype'] = "student";

            header("Location: studenthome.php");
            exit(); // Ensure no further code is executed after the redirect
        } else if ($row["usertype"] == "admin") {

            $_SESSION['username']=$name;

            $_SESSION['usertype'] = "admin";

            header("Location: adminhome.php");
            exit(); // Ensure no further code is executed after the redirect
        } else {
            echo "Invalid usertype";
        }
    } else {

      
        $message = "Username or password do not match";
        $_SESSION [ 'loginMessage']=$message;
        header("location:login.php");
    }
}
?>
