<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'admin') {

    header("location:login.php");
}



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Admin Dashboard</title>


    <?php

    include 'student_css.php';

    ?>

</head>

<body>

    <?php

    include 'student_sidebar.php';

    ?>



</body>

</html>