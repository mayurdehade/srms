<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->

    <style>
        * {
  margin: 0;
  padding: 0;
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
.container {
  display: flex;
  height: 64rem;
  align-items: center;
  justify-content: center;
}
.check {
  /* border: 3px solid red; */
  padding: 6rem;
  border-radius: 13px;
  box-shadow: 0px 7px 11px #a8a8a8;
}
.sub {
  display: flex;
}
.check p label {
  font-size: 2rem;
}
.input-text {
  width: 20rem;
  height: 2.5rem;
  font-size: 1.5rem;
  margin: 0 2rem;
  border: 2px solid #0B5ED7;
  border-radius: 3px;
  padding: 1px 7px;
}
#seat {
  margin-right: 4rem;
}
#mother-name {
  margin-right: 0;
}
.submit {
  display: flex;
  justify-content: center;
  margin-top: 5rem;
}

.submit button {
  width: 15rem;
  height: 4rem;
  border: 2px solid #0B5ED7;
  background: #0B5ED7;
  color: #ffffff;
  font-size: 2rem;
  border-radius: 6px;
  box-shadow: 0px 7px 11px #a8a8a8;
  cursor: pointer;
}
.submit button:hover {
  color: #ffffff;
  background-color: #0B5ED7;
  transition: 0.5s;
}

.foot {
  text-align: center;
  justify-content: center;
  font-size: 1.5rem;
  /* font-weight: bold; */
  color: gray;
}
    </style>
    <title>View Result</title>
</head>
<body>
    <nav class="navbar">
        <div>
            <p class="heading">Result Management System</p>
            <p class="menu-btn">
                <a href="index.php">Home</a>
                <a href="login.php">Admin</a>
            </p>
        </div>
    </nav>
    
    <!-- check result -->
    <div class="container">
        <div class="check">
            <form action="" method="post">
                <div class="sub">
                    <p><label for="seat">Enter Seat No: </label></p>
                    <input type="text" name="seatno" id="seat" class="input-text">
                    <br>
                    <p><label for="name">Enter Mother Name:</label></p>
                    <input type="text" name="mname" id="mother-name" class="input-text">
                </div>
                <div class="submit">
                    <!-- <input type="button" value="Check Result"> -->
                    <button type="submit" name="submit" id="submit">Check Result</button>
                </div>
            </form>
        </div>
    </div>


    <?php 
if(isset($_POST["seatno"]) && isset($_POST['mname']) && isset($_POST['submit'])){
    $con=mysqli_connect('localhost','root','','student');
    if (!$con) {
        die("Connection failed");
        echo "<script>alert('Database Connection Failed');</script>";
    }
    else{
        // echo "<script>alert('Connected');</script>";
        $seatno = $_POST["seatno"];
        $pass = $_POST["mname"]; 
        // $sql = "SELECT * from stud WHERE seatno=$seat and pass=$pass";
        // $result = mysqli_query($con,$sql);
        // echo $result;

        $result_sql=mysqli_query($con,"SELECT `name`, `class`, `m1`, `m2`, `m3`, `m4`, `m5`, `total`, `percent`, `result` FROM `stud` WHERE `seatno`='$seatno' and `pass`='$pass'");
        while($row = mysqli_fetch_assoc($result_sql))
        {
            $name = $row['name'];
            $class = $row['class'];
            $m1 = $row['m1'];
            $m2 = $row['m2'];
            $m3 = $row['m3'];
            $m4 = $row['m4'];
            $m5 = $row['m5'];
            $total = $row['total'];
            $percent = $row['percent'];
            $result = $row['result'];
        }

        $sub = mysqli_query($con, "SELECT `s1`, `s2`, `s3`,`s4`,`s5` FROM `class` WHERE `class`='$class'");
        while($row2 = mysqli_fetch_assoc($sub))
        {
            $s1 = $row2['s1'];
            $s2 = $row2['s2'];
            $s3 = $row2['s3'];
            $s4 = $row2['s4'];
            $s5 = $row2['s5'];
        }
        if(mysqli_num_rows($result_sql)==0){
            echo "no result";
            exit();
        } else {
            // header('location:show_result.php');
            // /*
            echo '
            <div class="container">
                <div class="details">
                    <span>Name:</span>'. $name .'<br>
                    <span>Class:</span>'. $class .'<br>
                    <span>Roll No:</span>'. $seatno .'<br>
                </div>
                <div class="main">
                    <div class="s1">
                        <p>Subjects</p>
                        <p>'.$s1.'</p>
                        <p>'.$s2.'</p>
                        <p>'.$s3.'</p>
                        <p>'.$s4.'</p>
                        <p>'.$s5.'</p>
                    </div>
                    <br>
                    <div class="s2">
                        <p>Marks</p>
                        <p>'.$m1.'</p>
                        <p>'.$m2.'</p>
                        <p>'.$m3.'</p>
                        <p>'.$m4.'</p>
                        <p>'.$m5.'</p>
                    </div>
                </div>

                <div class="result">
                    <p>Total Marks:&nbsp'.$total.'</p>
                    <p>Percentage:&nbsp'.$percent.'%</p>
                </div>

                <div class="button">
                    <button onclick="windows.print()">Print Result</button>
                </div>
            </div> ';
            // */
        }
    }

    
}
?>

    <!-- footer -->
    <footer>
        <div class="foot">
            <p>Created by TE-Computer Students</p>
        </div>
    </footer>
</body>
</html>





