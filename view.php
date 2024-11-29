//view.php

<html>
<head>
<title>View Records</title>
</head>
<body>
<?php
include('config.php');

if(isset($_GET['Reg_no'])) {
    $reg_no = $_GET['Reg_no'];
    $result = mysqli_query($dbConn, "SELECT * FROM visitor_list WHERE Reg_no='$reg_no'");
    
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
        <th><font color='Red'>Id</font></th>
        <th><font color='Red'>Name</font></th>
        <th><font color='Red'>Age</font></th>
        <th><font color='Red'>Address</font></th>
    </tr>";

    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo '<td><b><font color="Orange">' . $row['Reg_no'] . '</font></b></td>';
        echo '<td><b><font color="Orange">' . $row['Name'] . '</font></b></td>';
        echo '<td><b><font color="Orange">' . $row['Age'] . '</font></b></td>';
        echo '<td><b><font color="Orange">' . $row['Address'] . '</font></b></td>';
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Please provide a Reg_no.";
}
?>
<p><a href="insert1.php">Insert new record</a></p>
</body>
</html>