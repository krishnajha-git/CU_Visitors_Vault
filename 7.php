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
        background-color: #7fd0e0;;
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
    .div1, .div2 {
        position: absolute;
        top: 10%;
        left: 0;
        width: 100%;
        height: 100%;
    }
    .div1 {
        display: flex;
        justify-content: center;
        align-items: center;
        background: url(2.jpg) no-repeat;
        background-size: cover;
        background-position: center;
        filter: blur(8px);
        -webkit-filter: blur(8px);
        z-index: 0;
    }
    .div2 {
        background: url(3.png) no-repeat;
        background-size: cover;
        position: absolute;
        filter: blur(15px);
        -webkit-filter: blur(15px);
        z-index: 1;
    }
    #container {
        width: 80%;
        margin: 0 auto;
        background-color: #34b9d4;
        width: 350px; 
        height: 200px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0, 0.4);
        color: rgb(57, 48, 48);
        font-weight: bold;
        border: 3px solid #f1f1f1;
        z-index: 2; 
        text-align: center;
        border-radius: 10px;    
    }
    #displayData1{
        width: 80%;
        margin: 0 auto;
        background-color: #34b9d4;
        width: 350px; 
        height: 200px;
        position: absolute;
        top: 83%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0, 0.4);
        color: rgb(57, 48, 48);
        font-weight: bold;
        border: 3px solid #f1f1f1;
        z-index: 2; 
        text-align: center;
        border-radius: 10px;
    }
    #displayData{
        color: #f1f1f1;
        text-align: left;
        padding: 15px;        

    }
    #Outby{
        background-color: rgba(24,23,23,63%);
        text-decoration-color: #f1f1f1;
        color: #f1f1f1;
        height: 35px;
        border-radius: 10px;
    }
    #button1{
        background-color:#34b9d4;
        border-radius: 15px;
        padding: 8px;
    }
    #button2{
        background-color: #3368D1;
        border-radius: 15px;
        color: #fff;
        margin-right: 10px;
        border: #f1f1f1;     
    }
    #button3{
        background-color: #3368D1;
        border-radius: 15px;
        color: #fff;
        margin-left: 13px;
        border: #f1f1f1;     
    }
    #divider {
        color: white;
        margin: 3 10px; 
    }
    
    h2{
        color: #f1f1f1;
    }
    
    h2{
        color: #f1f1f1;
    }   
</style>
<link rel="stylesheet" href="1.css">
</head>
<body>
    <header>
        <a href="6.php"><img class="img1" src="4.png"></a>
        <img class="img2" src="8.png">
        <div class="header-text">CHRIST (Deemed to be University) | Bangalore Yeshwanthpur Campus</div>
    </header>
        <div class="div1"></div>
        <div class="div2"></div>
    <div class="div3">
        <div id="container">
            <h2>Add the Details</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form1" method="POST">
            <select name="Outby" id="Outby" required placeholder="Check - Out By">
            <option value="" disabled selected hidden>Check - Out By</option>
                <option value="1">Emp. Number - 1</option>
                <option value="2">Emp. Number - 2</option>
                <option value="3">Emp. Number - 3</option>
                <option value="4">Emp. Number - 4</option>
            </select><br>
            <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>"><br>
            <input name="submit" type="submit" value="submit" id="button1">
            </form>
            <button type="button" id ="button2" onclick="displayFormData()">Show Data</button>
            <span id="divider">  |  </span>
            <button type="button" id ="button3" onclick="window.location.href='2.php'">Profile Exit</button>
        </div>
        <div id="displayData1">
        <h2>Visitor's Details:</h2>
            <div id="displayData">
            <script>
                function displayFormData() {
                    var id = "<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>";
                    var Outby = document.getElementById('Outby').value;
                    var displayDiv = document.getElementById('displayData');
                    var date = new Date();
                    var year = date.getFullYear();
                    var month = (date.getMonth() + 1).toString().padStart(2, '0');
                    var day = date.getDate().toString().padStart(2, '0');
                    var hours = date.getHours().toString().padStart(2, '0');
                    var minutes = date.getMinutes().toString().padStart(2, '0');
                    var seconds = date.getSeconds().toString().padStart(2, '0');
                    var dt = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
                    displayDiv.innerHTML = '<p>Phone Number: ' + id + '</p><p>Date and Time: ' + dt + '</p><p>Checked Out By: ' + Outby + '</p>';
                }
            </script>
        </div>
    </div>
    <?php
    $connection = mysqli_connect("localhost", "root", "", "cu_visitors_vault");
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    if (isset($_POST['submit'])) {
        $dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $outdt = $dateTime->format('Y-m-d H:i:s');
        $Outby = mysqli_real_escape_string($connection, $_POST['Outby']);
        if ($id !== null) {
            $query = "UPDATE entry_status SET CheckOut_Date = '$outdt', CheckedOut_by = '$Outby' WHERE Reg_no = '$id' AND CheckOut_Date = '0000-00-00 00:00:00'";
            echo $Outby;
            $result = mysqli_query($connection, $query);
            if ($result) {
                echo 'Visitor checked out successfully';
            } else {
                echo 'Visitor check-out failed: ' . mysqli_error($connection);
            }
        } else {
            echo 'Error: Reg_no not found or not provided';
        }
    }
    mysqli_close($connection);
    ?>
        <footer>
            <p>Excellence and Service</p>
        </footer>
    </div>
</body>
<div class="div4"></div>
</html>