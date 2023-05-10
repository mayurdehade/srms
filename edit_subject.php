<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Edit Subject</title>
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
            width: 92rem;
            font-size: 1.5rem;
            align-items: center;
            text-align: center;
            margin: 5rem auto auto auto;
        }
        .btn {
            font-size: 1.7rem;
            margin-top: 3rem;
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
    
        include('init.php');
        $sql1 = "SELECT * FROM class";
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
        <h1 id="dash-title">Add / Edit Class</h1>
    </div>

    <div class="info">
        <table class="table table-striped table-hover">
        <thead>
            <tr class="table-dark">
                <th scope="col">#</th>
                <th scope="col">Class</th>
                <th scope="col">Subject 1</th>
                <th scope="col">Subject 2</th>
                <th scope="col">Subject 3</th>
                <th scope="col">Subject 4</th>
                <th scope="col">Subject 5</th>
                <!-- <th scope="col">Action</th> -->
            </tr>
        </thead>

<?php
$i=1;
if($num_rows>0)
{
    while($row=mysqli_fetch_array($res))
    {
        echo'
        <tbody
            <tr>
                <th>'.$i.'</th>
                <td>'.$row['class'].'</td>
                <td>'.$row['s1'].'</td>
                <td>'.$row['s2'].'</td>
                <td>'.$row['s3'].'</td>
                <td>'.$row['s4'].'</td>
                <td>'.$row['s5'].'</td>

                <!-- <td><a href="ed_sub.php?cls='.htmlentities($row['class']).'"><i class="bi bi-trash" title="Delete Record"></i></i> </a></td> -->
                
            </tr>
        </tbody>';
        $i++;
    }
}
?>
        </table>
        <div class="col-12">
            <a href="add_subject.php">
            <button type="submit btn" class="btn btn-primary">Add Class</button></a>
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