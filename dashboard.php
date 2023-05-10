<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        #dash-title {
            margin-top: 3rem;
            font-size: 3rem;
            align-items: center;
            text-align: center;
        }
        .stat{
            display: flex;
            display: flex;
            text-align: center;
            margin: 5rem;
            justify-content: center;
        }
        .dash{
            text-align: right;
            border: 1px solid black;
            margin: 2rem 6rem;
            padding: 4rem;
            width: 43rem;
            font-size: 2rem;
            background-color: powderblue;
            /* height: 11rem; */
            color: black;
            font-weight: bold;
            cursor: pointer;
        }
        .dash:hover{
            background-color: #6dd0db;
            transition: 1s;
        }
        .foot {
            font-size: 1.5rem;
            color: gray;
            text-align: center;
            bottom: 0;
            margin-top: 16rem;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <?php 
    // include("init.php");
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','student');
    
    $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

    //total student
    $sql1 ="SELECT seatno from stud";
    $query1 = $dbh -> prepare($sql1);
    $query1->execute();
    $results1=$query1->fetchAll(PDO::FETCH_OBJ);
    $totalstudents=$query1->rowCount();

    //class
    $sql2 ="SELECT class from  class ";
    $query2 = $dbh -> prepare($sql2);
    $query2->execute();
    $results2=$query2->fetchAll(PDO::FETCH_OBJ);
    $totalclass=$query2->rowCount();

    //pass student
    $sql3 ="SELECT seatno from  stud where result='p' or result='P' ";
    $query3 = $dbh -> prepare($sql3);
    $query3->execute();
    $results3=$query3->fetchAll(PDO::FETCH_OBJ);
    $totalpass=$query3->rowCount();

    //fail student
    $sql4 ="SELECT seatno from  stud where result='f' or result='f' ";
    $query4 = $dbh -> prepare($sql4);
    $query4->execute();
    $results4=$query4->fetchAll(PDO::FETCH_OBJ);
    $totalfail=$query4->rowCount();
    
    ?>
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
        <h1 id="dash-title">Dashboard</h1>

    </div>
    <div class="stat">
        <div class="dash">Total Student: <?php echo htmlentities($totalstudents) ?></div>
        <div class="dash">Classes: <?php echo htmlentities($totalclass) ?></div>
    </div>
    <div class="stat">
        <div class="dash">Pass Students: <?php echo htmlentities($totalpass) ?></div>
        <div class="dash">Fail Students: <?php echo htmlentities($totalfail) ?></div>
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