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
        top: 20%;
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
        height: 365px;
        position: absolute;
        top: 46%;
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
        margin: 0 auto;
        background-color: #34b9d4;
        width: 350px; 
        height: 350px;
        position: absolute;
        top: 103%;
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
    h2{
        margin: 0;
        padding-top: 3px;
        padding-bottom: 3px;
    }
    #displayData{
        color: #f1f1f1;
        text-align: left;
        padding-left: 15px;
        margin: 0;        

    }
    #Reg_no,#Name, #Purpose, #Address,#VehicleNo_ifAny,#Age, #Inby{
        background-color: rgba(24,23,23,63%);
        text-decoration-color: #f1f1f1;
        color: #f1f1f1;
    }
    #phone,#name, #purpose, #address,#vehicle_no{
        width: 210px;
    }

    ::placeholder {
        color: white;
    }
    #Age{
        width: 102px;
    }
    #Inby{
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
        margin-left: 10px;
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
        <a href="3.php"><img class="img1" src="4.png"></a>
        <img class="img2" src="8.png">
        <div class="header-text">CHRIST (Deemed to be University) | Bangalore Yeshwanthpur Campus</div>
    </header>
    <div class="div1"></div>
    <div class="div2"></div>
    <div class="div3">
        <div id="container">
            <h2>Add the Details</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form1" method="POST">
                <input type="text" id="Reg_no" name="Reg_no" placeholder="Phone Number"><br>
                <input type="text" id="Name" name="Name" required placeholder="Name Of The Visitor"><br>
                <input type="text" id="Purpose" name="Purpose" required placeholder="Purpose of visit"><br>
                <input type="text" id="Address" name="Address" required placeholder="Address"><br>
                <input type="text" id="VehicleNo_ifAny" name="VehicleNo_ifAny" required placeholder="Vehicle Number (If Any)"><br>
                <input type="text" id="Age" name="Age" required placeholder="Age of the Visitor">
                <select name="Inby" id="Inby" required placeholder="Check -In By">
                    <option value="" disabled selected hidden>Check - In By</option>
                    <option value="1">Emp. Number - 1</option>
                    <option value="2">Emp. Number - 2</option>
                    <option value="3">Emp. Number - 3</option>
                    <option value="4">Emp. Number - 4</option>
                </select><br>
                <input name="Submit" type="Submit" value="Submit" id="button1">
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
                        var Reg_no = document.getElementById('Reg_no').value;
                        var Name = document.getElementById('Name').value;
                        var Purpose = document.getElementById('Purpose').value;
                        var Address = document.getElementById('Address').value;
                        var VehicleNo_ifAny = document.getElementById('VehicleNo_ifAny').value;
                        var Age = document.getElementById('Age').value;
                        var Inby = document.getElementById('Inby').value;
                        var displayDiv = document.getElementById('displayData');
                        var date = new Date();
                        var year = date.getFullYear();
                        var month = (date.getMonth() + 1).toString().padStart(2, '0');
                        var day = date.getDate().toString().padStart(2, '0');
                        var hours = date.getHours().toString().padStart(2, '0');
                        var minutes = date.getMinutes().toString().padStart(2, '0');
                        var seconds = date.getSeconds().toString().padStart(2, '0');
                        var dt = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
                    displayDiv.innerHTML = '<p>Phone Number: ' + Reg_no + '</p><p>Name: ' + Name + '</p><p>Purpose of the vist: ' + Purpose + '</p><p>Address:' + Address + '</p><p>Vehicle No(ifAny): ' + VehicleNo_ifAny + '</p><p>Date and Time: ' + dt + '</p><p>Checked In By: ' + Inby + '</p>';
                }
                </script>
            </div>
        </div>
        <?php
            $connection = mysqli_connect("localhost", "root", "");
            $db = mysqli_select_db($connection, 'cu_visitors_vault');
            if(isset($_POST['Submit']))
            {
                $id = $_POST['Reg_no'];
                $name = $_POST['Name'];
                $age = $_POST['Age'];
                $address = $_POST['Address'];
                $purpose = $_POST['Purpose'];
                $vno = $_POST['VehicleNo_ifAny'];
                $dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
                $indt = $dateTime->format('Y-m-d H:i:s');
                $outdt = 0;
                $inby = $_POST['Inby'];
                $outby = 0;
                $query1 = mysqli_query($connection, "INSERT INTO visitor_list VALUES ('$id', '$name', '$age', '$address')");
                $query2 = mysqli_query($connection, "INSERT INTO entry_status VALUES ('$id', '$purpose', '$vno', '$indt', '$outdt', '$inby', '$outby')");
                if($query1 && $query2){
                    echo 'Visitor created successfully';
                }
                else
                {
                    echo 'Visitor registration failed';
                }
            }
        ?>
        <footer id="f1">
            <p>Excellence and Service</p>
        </footer>
    </div>
</body>
<div class="div4"></div>
</html>




