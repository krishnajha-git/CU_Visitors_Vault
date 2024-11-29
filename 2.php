<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Page 1</title>
<style>
    body {
        margin: 0;
        padding: 0;
        height: 100%;
        background-color: #f1f1f1;
    }
    .container {
        width: 80%;
        margin: 0 auto;
        text-align: center;
    }
    input[type="text"] {
        padding: 8px;
        width: 200px;
        margin-bottom: 10px;
        border-radius: 10px;
    }
    input[type="submit"] {
        padding: 8px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }
    .div1 {
        position: relative; 
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100vh; 
        background: url(13.jpg) no-repeat center center; 
        background-size: contain; 
        filter: blur(8px);
        -webkit-filter: blur(8px);
        z-index: 0;
        top: 100%;
    }
    .div2 {
        position: fixed;
        bottom: 0;
        right: 0;
        background: url(13.png) no-repeat;
        background-size: contain;
        width: 200px; 
        height: 200px; 
        z-index: 1; 
    }
    .div3{
        width: 300px;
        height: 350px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: rgb(57, 48, 48);
        font-weight: bold;
        z-index: 2;
        text-align: center;
        border-radius: 10px;
        border: 3px solid rgba(57,51,51,64%);
        background-color: rgba(110,220,242,65%);
    }
    #container {
        width: 200px;
        height: 250px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0,0,0, 0.4);
        color: rgb(57, 48, 48);
        font-weight: bold;
        border: 3px solid #f1f1f1;
        z-index: 2;
        text-align: center;
        border-radius: 10px;
    }

    #button2,#logoutButton {
        background-color: rgba(1,33,239,100);
        border-radius: 9px;
        color: #fff;
        padding:12px 20px;
        background-color: rgba(55,81,254,100);
    }
    #logoutButton{
        background-color: rgba(0,180,216,55);
    }
    #button3 {
        background-color: #3368D1;
        border-radius: 9px;
        color: #fff;
        padding:12px 16px;
        background-color: rgba(17,34,142,100);
    }
    h2,a {
        color: #f1f1f1;
    }
    .header-text {
        margin-top: 20px;
        font-size: 24px;
    }

    header {
        background-color: #333;
        padding: 10px 0;
        text-align: center;
        color: #fff;
    }

    .img1, .img2 {
        height: 50px;
        width: auto;
        display: inline-block;
        margin: 0 10px;
    }
    #f1 {
        background-color:#3368D1;
        color: #fff;
        padding: 2px 0;
        text-align: center;
        position: fixed;
        bottom: 0;
        width: 100%;
        border-top-right-radius: 20px;
        border-top-left-radius: 20px;
        z-index: 3; 
    }
    footer p {
        margin: 0;
    }
</style>
<link rel="stylesheet" href="1.css">
</head>
<body>
    <header>
        <img class="img1" src="4.png">
        <img class="img2" src="8.png">
        <div class="header-text">CHRIST (Deemed to be University) | Bangalore Yeshwanthpur Campus</div>
    </header>
    <div class="div1"></div>
    <div class="div3">
        <div id="container"><br><br>
            <button type="button" id="button2" onclick="window.location.href='3.php'">Check - In</button><br><br>
            <button type="button" id="button3" onclick="window.location.href='6.php'">Check - Out</button><br><br>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="username" value="<?php echo isset($_GET['username']) ? $_GET['username'] : ''; ?>">
                <button type="submit" id="logoutButton" name="submit">Log - Out</button>
            </form>
        </div>
    </div>
    <a href="1.php"><div class="div2"></div></a>
    <footer id="f1">
        <p>Excellence and Service</p>
    </footer>
    <?php
    $connection = mysqli_connect("localhost", "root", "", "cu_visitors_vault");
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    if (isset($_POST['submit'])) {
        $dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $logoutdt = $dateTime->format('Y-m-d H:i:s');    
        if ($username !== null) {
            $query = "UPDATE duty_status SET Logout_date = '$logoutdt' WHERE Sec_id = '$username' AND Logout_date = '0000-00-00 00:00:00'";
            $result = mysqli_query($connection, $query);
            if ($result) {
                echo 'Visitor checked out successfully';
                header("Location: 1.php");
            exit();
            } else {
                echo 'Visitor check-out failed: ' . mysqli_error($connection);
            }
        } else {
        echo 'Error: username not found or not provided';
        }
    }
    mysqli_close($connection);
    ?>
</body>
</html>
