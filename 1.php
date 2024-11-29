<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color:rgba(3, 4, 94,100);
        }
        .container {
            position: absolute;
            top: 15px;
            left: 15px;
            right: 15px;
            bottom: 15px;
            background-color: white;
        }
        header {
            color: #fff;
            padding: 13px 0;
            text-align: center;
            width: 100%;
            font-size: 30px;
            position: fixed;
            top: 0;
            border-bottom-right-radius: 20px;
            border-bottom-left-radius: 20px;
            z-index: 3;
        }
        .img1 {
            max-width: 150px;
            height: auto;
            margin-left: 10px;
            float: left;
            padding-top: 5px;
        }
        .img2{
            max-width: 350px;
            height: auto;
            margin-left: 10px;
            float: right;
            padding-right:24px;
            padding-top: 5px;
        }
        .container1 {
            position: absolute;
            top: 40%; 
            left: 50%; 
            transform: translate(-50%, -50%); 
            background-color: rgba(3, 4, 94, 100);
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            z-index: 2;
        }
        .container2 {
            position: absolute;
            top: 80%; 
            left: 50%; 
            transform: translate(-50%, -50%); 
            color: rgb(0,0,0);
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            z-index: 2;
        }
        .login-form input {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            border-radius: 5px;
            border: none;
            outline: none;
        }
        .login-form button {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 5px;
            background-color: rgba(55, 81, 254, 100);
            color: white;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
            width: 100px;
        }
        .login-form button:hover {
            background-color: #402f84;
        }
        h1{
            color: rgba(55, 81, 254, 100);
        }
        .sec_img{
            width: 200px; 
            height: 200px; 
            z-index: 1; 
        }
    </style>
</head>
<body>
    <header>
        <a href="1.php"><img class="img1" src="4.png"></a>
        <img class="img2" src="8.png">
    </header>
    <div class="container"></div>
    <div class="container1">
        <h1>Welcome Staff!</h1>
        <p>Please login to your account.</p>
        <form class="login-form" action="#" method="POST">
            <input type="input" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit"><b>login</button>
        </form>
    </div>
    <div class="container2">
        <img class="sec_img" src="16.png">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $logindt = $dateTime->format('Y-m-d H:i:s');
        $logoutdt = 0;

        $conn = new mysqli("localhost", "root", "", "cu_visitors_vault");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM security_staff WHERE Sec_id = '$username' AND password = '$password'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $q1=mysqli_query($conn, "INSERT INTO duty_status VALUES ('$username', '$logindt', '$logoutdt')");
            header("Location: 2.php?username=" . urlencode($username));
            exit();
        } else {
            echo '<img class="sec_img" src="13.png">';
            echo "<p>Enter correct details</p>";
        }
        $conn->close();
    }
    ?>
    </div>
    </body>
</html>