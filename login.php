<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Admin Login</title>
    <style>
        .login {
            display: flex;
            justify-content: center;
            height: 63rem;
            align-items: center;
        }
        .login form {
            width: 34rem;
            border: none;
            border-radius: 10px;
            padding: 18px 35px;
            box-shadow: 0px 7px 11px #a8a8a8;
        }
        .login-lable {
            font-size: 2rem;
        }
        .btn{
            height: 3rem;
            width: 7rem;
            font-size: 1.5rem;
        }
        .form-control{
            height: 3rem;
            font-size: 1.5rem;
        }
        #admin{
            visibility: hidden;
        }
        

    </style>
</head>
<body>
    <nav class="navbar">
        <div>
            <p class="heading">Result Management System</p>
            <p class="menu-btn">
                <a href="index.php">Home</a>
                <a href="login.php" id="admin">Admin</a>
            </p>
        </div>
    </nav>

    <!-- login -->
    <div class="login">
        <form action="" method="post" name="login">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="login-lable">User Name</label>
                <input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="login-lable">Password</label>
                <input type="password" name="u-pass" class="form-control" id="u-pass">
            </div>
            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
        </form>
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

<?php
    if(isset($_POST['submit']))
    {
        $con=mysqli_connect('localhost','root','','student');
        if (!$con) {
        die("Connection failed");
        }
        else{
            $uname = $_POST['user'];
		    $pass = $_POST['u-pass'];
            $sql = "SELECT username, password FROM admin ";
            $result = mysqli_query($con,$sql);
            $num_row = mysqli_num_rows($result);

            if($num_row > 0){
                while($row = mysqli_fetch_array($result)){

                    if (empty($uname) || empty($pass)) {
                        echo '<script>alert("please fill all the fields")</script>';
                    }	
                    else if($uname == $row["username"] && $pass == $row["password"]){
                        $_SESSION['uname']=$uname;
                        header('location:dashboard.php');
                    }
                    else 
                        echo '<script>alert("Wrong Password or UserName")</script>';
                }
            }
        }
    }
?>