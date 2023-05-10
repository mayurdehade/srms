<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Add New Student</title>
    <style>
        * {
            /* margin: 0;
            padding: 0; */
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }
        html {
        font-size: 10px;
        }
        .navbar {
        /* display: flex; */
        background-color: #212529;
        color: white;
        height: 5.5rem;
        }
        .navbar div {
        display: flex;
        height: 5.5rem;
        align-items: center;
        }
        .heading {
        font-size: 2.2rem;
        margin-left: 10rem;
        }
        .menu-btn {
        font-size: 1.6rem;
        position: absolute;
        right: 0;
        margin-right: 15rem;
        }
        .menu-btn a {
        color: white;
        text-decoration: none;
        padding: 0.5rem;
        margin: auto 1rem;
        }
        .menu-btn a:hover{
            color: #ff2b2b;
        }
        .forms {
            margin: 3rem auto;
            width: 47rem;
            font-size: 1.7rem;
        }
        .forms input{
            font-size: 1.7rem;
        }
        .forms label{
            font-weight: bold;
        }
        .forms button {
            width: 9rem;
            height: 4rem;
            margin-top: 2rem;
            font-size: 1.7rem;
        }
        #dash-title{
            margin: 5rem auto auto auto;
            text-align: center;
        }
        .foot{
            text-align: center;
            margin-top: 3rem;
            font-size: 1.5rem;
            color: gray;
        }
        </style>
</head>
<body>
    <?php 
    
        include ('init.php');
        $total = 0;
        $percent = 0;
    
    ?>
    <nav class="navbar">
        <div>
            <p class="heading">Result Management System (Admin)</p>
            <p class="menu-btn">
                <a href="index.php">Home</a>
                <a href="edit_subject.php">Subjects</a>
                <a href="edit_student.php">Student</a>
                <a href="edit_result.php">Result</a>
                <a href="login.php">Logout</a>
            </p>
        </div>
    </nav>
    <div class="container">
        <h1 id="dash-title">Add Student</h1>

    </div>


    <form method="post" class="forms">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Seat Number</label>
            <input type="text" class="form-control" name="stno" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Password</label>
            <input type="text" class="form-control" name="pass" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Class</label>
            <!-- <input type="text" class="form-control" name="class" required> -->
            <select name="drop" id="drop">
        <?php

        $cls = mysqli_query($con, "SELECT * FROM `class`");
        $i=1;
        $num_rows = mysqli_num_rows($cls);
        if($num_rows>0)
        {
            while($row=mysqli_fetch_array($cls))
            {
                echo '<option id="op'.$i.'" value="'.$row['class'].'" onclick="fetch()">'.$row['class'].'</option>';
                $i++;
            }
        }
        ?>
        </select>
        
        </div>
        <?php 
        /*
        if(is_null()){
        $sub = mysqli_query($con, "SELECT `s1`, `s2`, `s3`,`s4`,`s5` FROM `class` WHERE `class`='SE'");
        while($row2 = mysqli_fetch_assoc($sub))
        {
            $s1 = $row2['s1'];
            $s2 = $row2['s2'];
            $s3 = $row2['s3'];
            $s4 = $row2['s4'];
            $s5 = $row2['s5'];

            echo '<div class="mb-3"><label for="formGroupExampleInput2" class="form-label">'.$s1.' Marks</label>
            <input type="text" class="form-control" name="m1" required></div>';
            echo '<div class="mb-3"><label for="formGroupExampleInput2" class="form-label">'.$s2.' Marks</label>
            <input type="text" class="form-control" name="m1" required></div>';
            echo '<div class="mb-3"><label for="formGroupExampleInput2" class="form-label">'.$s3.' Marks</label>
            <input type="text" class="form-control" name="m1" required></div>';
            echo '<div class="mb-3"><label for="formGroupExampleInput2" class="form-label">'.$s4.' Marks</label>
            <input type="text" class="form-control" name="m1" required></div>';
            echo '<div class="mb-3"><label for="formGroupExampleInput2" class="form-label">'.$s5.' Marks</label>
            <input type="text" class="form-control" name="m1" required></div>';
        }
    }  */
        ?>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Subject 1 Marks</label>
            <input type="text" class="form-control" name="m1" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Subject 2 Marks</label>
            <input type="text" class="form-control" name="m2" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Subject 3 Marks</label>
            <input type="text" class="form-control" name="m3" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Subject 4 Marks</label>
            <input type="text" class="form-control" name="m4" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Subject 5 Marks</label>
            <input type="text" class="form-control" name="m5" required>
        </div>
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary" >ADD</button>
        </div>
    </form>

    <?php 
    
        if(isset($_POST['stno'])){
            if(!$con){
                die("Connection failed");
                echo "<script>alert('Database Connection Failed')</script>";
            }
            else {
                $stno = $_POST['stno'];
                $name = $_POST['name'];
                $pass = $_POST['pass'];
                $class = $_POST['drop'];
                $m1 = $_POST['m1'];
                $m2 = $_POST['m2'];
                $m3 = $_POST['m3'];
                $m4 = $_POST['m4'];
                $m5 = $_POST['m5'];
                $total = $m1 + $m2 + $m3 + $m4 + $m5;
                $percent = $total/5;

                if($m1>"35" && $m2>"35" && $m3>"35" && $m4>"35" && $m5>"35" )
                {
                    $result = 'P';
                }
                else {
                    $result = 'F';
                }
                // echo "$result";
                $sql = "INSERT INTO `stud` (`seatno`, `name`, `pass`, `class`, `m1`, `m2`, `m3`, `m4`, `m5`, `total`, `percent`, `result`) VALUES ('$stno', '$name', '$pass', '$class', '$m1', '$m2', '$m3', '$m4', '$m5', '$total', '$percent', '$result')";
                
                
                if ($con->query($sql) == TRUE) {
                    echo "<script>alert('Student Added')</script>";
                    // echo "Subject added";
                } else {
                    echo "Error: " . $sql . "<br>" . $con->error;
                }

                $con->close();
            }
        }
    ?>

    <!-- footer -->
    <footer>
        <div class="foot">
            <p>Created by TE-Computer Students</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>