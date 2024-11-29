<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Page 2</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: rgba(110,220,242,65%);
    }
    .container1 {
        width: 60%;
        margin: 0 auto;
        text-align: left;
        background-color: rgba(106, 227, 241, 0.76);
        width: 550px;
        height: 450px;
        border-radius: 20px;
        display: flex;
        flex-direction: column; 
        justify-content: center;
        align-items: center;
        position: relative;
        z-index: 2;
        border: 3px solid #f1f1f1;
        top: -40px;
    }

    #div3, #div4 {
        background-color: rgba(57, 51, 51, 64%);
        width: 400px;
        height: 60px;
        border-radius: 10px;
        padding: 10px;
        z-index: 3;
        position: relative;
        border: 3px solid #f1f1f1;
        color: #f1f1f1;
        display: block; 
        margin-bottom: 10px; 
    }
    #sapce{
        width:500px;
    }

    #div4{
        height:450px;
        width:500px;
        color: #f1f1f1;

    }
    h2{
        text-align: center;
        font-size: 25px;
    }
    .div1 {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: url(10.jpg) no-repeat;
        background-size: cover;
        background-position: center;
        filter: blur(6px);
        -webkit-filter: blur(6px);
        width: 50%;
        background-repeat: no-repeat;
        position: absolute;
        z-index: 2;
        left: 0;
    }
    .div2{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: url(11.jpg) no-repeat;
        background-size: cover;
        background-position: right;
        filter: blur(6px);
        -webkit-filter: blur(6px);
        width: 50%;
        background-repeat: no-repeat;
        position: absolute;
        z-index: 2;
        right: 0;
    }
    #but1{
        width: 50%;
        padding:4px;
        border: none;
        border-radius: 5px;
        background-color: rgba(55, 81, 254, 100);
        color: white;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s ease;    
    }
    #but2{
        width: 100%;
        padding:4px;
        border: none;
        border-radius: 5px;
        background-color: rgba(55, 81, 254, 100);
        color: white;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s ease;        
    }
    #tag1{
        text-align: center;
        font-weight: bold;
    }
    .table-bordered th, .table-bordered td {
        color: white;
    }
    .table-bordered {
        overflow-y: auto;
        direction: ttb;
    }

    

</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="1.css"> 
</head>
<body>
    <header>
        <img class="img1" src="4.png">
        <img class="img2" src="8.png">
        <div class="header-text">CHRIST (Deemed to be University) | Bangalore Yeshwanthpur Campus</div>
    </header>
    <div class="div1"></div>
    <div class="div2"></div>
    <br><br><br><br><br><br><br><br><br><br><br>
    <div class="container1">
        <br>
        <div id="div3">
            <form action="" method="GET" id="space">
                <div class="input-group mb-3">
                    <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search Phone Number or Name">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
        <div id="div4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Phone Number</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Progress</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $connection = mysqli_connect("localhost", "root", "", "cu_visitors_vault");

                        if(isset($_GET['search']))
                        {
                            $filtervalues = $_GET['search'];
                            $query = "SELECT * FROM visitor_list WHERE Reg_no LIKE '%$filtervalues%' OR Name LIKE '%$filtervalues%'";
                            $query_run = mysqli_query($connection, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $items)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $items['Reg_no']; ?></td>
                                        <td><?= $items['Name']; ?></td>
                                        <td><?= $items['Age']; ?></td>
                                        <td><?= $items['Address']; ?></td>
                                        <td><a href="7.php?id=<?= urlencode($items['Reg_no']) ?>"><button id="but1">Go</button></a></td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                    <tr>
                                        <td colspan="5" id='tag1'>No Record Found <br><button id="but2" onclick="window.location.href='4.php'">Register the Visitor</button></td>
                                    </tr>
                                <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<footer>
    <p>Excellence and Service</a></p>
</footer>
</body>
</html>
