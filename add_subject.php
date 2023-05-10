<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Add Subjects</title>
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
    <nav class="navbar">
        <div>
            <p class="heading">Result Management System (Admin)</p>
            <p class="menu-btn">
                <a href="index.php">Home</a>
                <a href="edit_subject.php">Subject</a>
                <a href="edit_student.php">Student</a>
                <a href="edit_result.php">Result</a>
                <a href="login.php">Logout</a>
            </p>
        </div>
    </nav>
    <div class="container">
        <h1 id="dash-title">Add Subject</h1>

    </div>

    <form method="post" class="forms">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Class Name</label>
            <input type="text" class="form-control" name="cname" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Subject 1</label>
            <input type="text" class="form-control" name="s1" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Subject 2</label>
            <input type="text" class="form-control" name="s2" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Subject 3</label>
            <input type="text" class="form-control" name="s3" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Subject 4</label>
            <input type="text" class="form-control" name="s4" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Subject 5</label>
            <input type="text" class="form-control" name="s5" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">ADD</button>
        </div>
    </form>

    <?php 
        include ('init.php');
        if(isset($_POST['cname'])){
            if(!$con){
                die("Connection failed");
                echo "<script>alert('Database Connection Failed')</script>";
            }
            else {
                $cname = $_POST['cname'];
                $s1 = $_POST['s1'];
                $s2 = $_POST['s2'];
                $s3 = $_POST['s3'];
                $s4 = $_POST['s4'];
                $s5 = $_POST['s5'];

                $sql = "INSERT INTO `class` (`class`, `s1`, `s2`, `s3`, `s4`, `s5`) VALUES ('$cname', '$s1', '$s2', '$s3', '$s4', '$s5')";
                
                
                if ($con->query($sql) == TRUE) {
                    echo "<script>alert('Subjects Added')</script>";
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