<?php

error_reporting(0);
session_start();
session_destroy();

if ($_SESSION['message']) {
    $message = $_SESSION['message'];

    echo "<script type='text/javascript' >

    alert('$message');
    
    </script>";
}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * FROM teacher";

$result = mysqli_query($data, $sql);



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <nav>
        <label class="logo">MyCampusHub</label>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">contact</a></li>
            <li><a href="">Admission</a></li>
            <li><a href="login.php" class="btn btn-success">LogIn</a></li>
        </ul>
    </nav>
    <div class="section1">
        <label class="img_text">We Teach Student with care</label>
        <img class="main_img" src="school_management.webp">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome_img" src="school2.webp" />

            </div>
            <div class="col-md-8">
                <h1>Welcome to our University</h1>
                <p>Hajee Mohammad Danesh Science and Technology University is the first Science and Technology
                    University in the northern region of Bangladesh. It stands away from the urban Dinajpur and bustle
                    at a beautiful and scenic location some 13km north of Dinajpur town by the side of the intercity
                    highway that links Dinajpur to Dhaka, the capital of Bangladesh. Hajee Mohammad Danesh Science and
                    Technology University was established as an Agricultural Extension Training Institute (AETI) to
                    award a three-year diploma in agriculture. The AETI was later upgraded to Hajee Mohammad Danesh
                    Agricultural College in 1988 having an affiliation from the Bangladesh Agricultural University,
                    Mymensingh. Then the college was upgraded to the status of a university renaming it as Hajee
                    Mohammad Danesh Science and Technology University. First batch of the students were admitted at that
                    time (1999-2000 session). The Act of the University was passed on 8 July 2001 in the Jatio Shongsad
                    (National Assembly) was followed by a gazette notification on 8 April 2002.</p>

            </div>

        </div>

    </div>
    <center>
        <h1>Our Teachers</h1>
    </center>
    <div class="container">
        <div class="row">

            <?php
            while ($info = $result->fetch_assoc()) {


                ?>
                <div class="col-md-4">



                    <img class="teacher" src="<?php echo "{$info['image']}" ?>">

                    <h3><?php echo "{$info['name']}" ?></h3>

                    <h5><?php echo "{$info['description']}" ?></h5>

                </div>
                <?php
            }
            ?>

        </div>

    </div>

    <center>
        <h1>Our Course</h1>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="teacher" src="data_science.jpg" />
                <h3>Artificial Intelligence</h3>

            </div>
            <div class="col-md-4">
                <img class="teacher" src="ai.jpg" />
                <h3>Data Science</h3>


            </div>
            <div class="col-md-4">
                <img class="teacher" src="fluter.jpg" />
                <h3>Cross platform</h3>


            </div>

        </div>

    </div>
    <center>
        <h1 class="adm">Admission Form</h1>
    </center>
    <div align="center" class="admission_form">

        <form action="data_check.php" method="POST">


            <div class="adm_int">
                <label class="label_text">Name</label>
                <input class="input_deg" type="text" name="name" />

            </div>
            <div class="adm_int">
                <label class="label_text">Email</label>
                <input class="input_deg" type="text" name="email" />

                </div">
                <div class="adm_int">
                    <label class="label_text">Phone</label>
                    <input class="input_deg" type="text" name="phone" />

                </div>
                <div class="adm_int">
                    <label class=" label_text">Message</label>
                    <textarea class="input_txt" name="message"></textarea>

                </div>
                <div class="adm_int">

                    <input class="btn btn-primary" id="submit" type="submit" value="apply" name="apply" />

                </div>

        </form>

    </div>



</body>

</html>