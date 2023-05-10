<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Edit Student</title>
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
        #dash-title{
            margin: 5rem auto auto auto;
            text-align: center;
        }
        .info {
            /* display: flex; */
            justify-content: center;
            width: 125rem;
            font-size: 1.5rem;
            align-items: center;
            text-align: center;
            margin: 5rem auto auto auto;
        }
        .foot{
            text-align: center;
            margin-top: 3rem;
            font-size: 1.5rem;
            color: gray;
        }
        .btn {
            font-size: 1.7rem;
            margin-top: 3rem;
        }
        </style>
</head>
<body>
    <?php 
    
        include('init.php');
        $sql1 = "SELECT * FROM stud";
        $res = mysqli_query($con, $sql1);
        $num_rows = mysqli_num_rows($res);
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
        <h1 id="dash-title">Add / Edit Student</h1>
    </div>

    <div class="info">
        <table class="table table-striped table-hover">
        <thead>
            <tr class="table-dark">
                <th scope="col">#</th>
                <th scope="col">Seat No</th>
                <th scope="col">Name</th>
                <th scope="col">Password</th>
                <th scope="col">Class</th>
                <th scope="col">Subject 1</th>
                <th scope="col">Subject 2</th>
                <th scope="col">Subject 3</th>
                <th scope="col">Subject 4</th>
                <th scope="col">Subject 5</th>
                <th scope="col">Total</th>
                <th scope="col">Percent</th>
                <th scope="col">Result</th>
                <!-- <th scope="col">Action</th> -->
            </tr>
        </thead>

<?php
$i=1;
if($num_rows>0)
{
    while($row=mysqli_fetch_array($res))
    {
        $rr = $row['result'];
        if($rr =='p' || $rr =='P')
        {
            $resl = 'Pass';
        } else {
            $resl = 'Fail';
        }
        echo'
        <tbody
            <tr>
                <th>'.$i.'</th>
                <td>'.$row['seatno'].'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['pass'].'</td>
                <td>'.$row['class'].'</td>
                <td>'.$row['m1'].'</td>
                <td>'.$row['m2'].'</td>
                <td>'.$row['m3'].'</td>
                <td>'.$row['m4'].'</td>
                <td>'.$row['m5'].'</td>
                <td>'.$row['total'].'</td>
                <td>'.$row['percent'].'</td>
                <td>'.$resl.'</td>
                
                <!--<td><form method="get"><button type="submit" name="'.$row['seatno'].'"><i class="bi bi-trash" title="Delete record"></button></i></form></td> -->
            </tr>
        </tbody>';
        $i++;
    }

}


// $del = $_POST('seatno');
// echo '<script>alert('.$del.');</script>'

// DELETE FROM `stud` WHERE `stud`.`seatno` = '77'
?>
        </table>
        <div class="col-12">
            <a href="add_student.php">
            <button type="submit btn" class="btn btn-primary">Add Student</button></a>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="foot">
            <p>Created by TE-Computer Students</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>