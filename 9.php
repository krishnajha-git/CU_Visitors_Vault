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
    .table-bordered th, .table-bordered td {
        color: white;
    }
    #bot1{
        background-color: #3368D1;
        border-radius: 9px;
        color: #fff;
        padding: 8px 20px;
        background-color: rgba(17,34,142,100);
    }

    

</style>
<link rel="stylesheet" href="1.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
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
                            $query = "SELECT * FROM visitor_list WHERE Reg_no LIKE '%$filtervalues%' ";
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
                                        <td><a href="10.php?id=<?= urlencode($items['Reg_no']) ?>"><button id="bot1">Go</button></a></td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                    <tr>
                                        <td colspan="5">No Record Found</td>
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
    <p>Copyright © CHRIST (Deemed to be University) 2020 | <a class="hi" href="https://christuniversity.in/privacy-policy" >Privacy Policy</a></p>
</footer>
</body>
</html>
