<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
$db = mysqli_select_db($connection, 'cu_visitors_vault');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];

    echo $date1 ."<br>";
    echo $date2;
    $query = "";
    switch ($_POST['submit']) {
        case 'inby':
            $query = "SELECT visitor_list.Reg_no, visitor_list.Name, visitor_list.Age, visitor_list.Address, entry_status.Purpose, entry_status.VehicleNo_ifAny, entry_status.CheckIn_Date, entry_status.CheckOut_Date, entry_status.CheckedIn_By FROM entry_status JOIN visitor_list ON entry_status.Reg_no = visitor_list.Reg_no WHERE entry_status.CheckIn_Date BETWEEN '$date1' AND '$date2'";
            echo "<table border='1' cellpadding='10'>";
            echo "<tr>
            <th><font color='Red'>Reg. No.</font></th>
            <th><font color='Red'>Name</font></th>
            <th><font color='Red'>Age</font></th>
            <th><font color='Red'>Address</font></th>
            <th><font color='Red'>Purpose</font></th>
            <th><font color='Red'>VehicleNo_ifAny</font></th>
            <th><font color='Red'>CheckIn_Date</font></th>
            <th><font color='Red'>CheckOut_Date</font></th>
            <th><font color='Red'>CheckedIn_By</font></th>
            <th><font color='Red'>Delete</font></th>
            </tr>";
            $result = mysqli_query($connection, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo '<td><b><font color="Orange">' . $row['Reg_no'] . '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['Name'] . '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['Age'] . '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['Address'] .  '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['Purpose'] .  '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['VehicleNo_ifAny'] .  '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['CheckIn_Date'] .  '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['CheckOut_Date'] .  '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['CheckedIn_By'] .  '</font></b></td>';
                    echo '<td><b><font color="Orange"><a href="delete.php?id=' . $row['Reg_no'] . '">Delete</a></font></b></td>';
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Query failed or no records found.";
            }            
            break;
        case 'outby':
            $query = "SELECT visitor_list.Reg_no, visitor_list.Name, visitor_list.Age, visitor_list.Address, entry_status.Purpose, entry_status.VehicleNo_ifAny, entry_status.CheckIn_Date, entry_status.CheckOut_Date, entry_status.CheckedOut_By FROM entry_status JOIN visitor_list ON entry_status.Reg_no = visitor_list.Reg_no WHERE entry_status.CheckOut_Date BETWEEN '$date1' AND '$date2'";
            echo "<table border='1' cellpadding='10'>";
            echo "<tr>
            <th><font color='Red'>Reg. No.</font></th>
            <th><font color='Red'>Name</font></th>
            <th><font color='Red'>Age</font></th>
            <th><font color='Red'>Address</font></th>
            <th><font color='Red'>Purpose</font></th>
            <th><font color='Red'>VehicleNo_ifAny</font></th>
            <th><font color='Red'>CheckIn_Date</font></th>
            <th><font color='Red'>CheckOut_Date</font></th>
            <th><font color='Red'>CheckedOut_By</font></th>
            <th><font color='Red'>Delete</font></th>
            </tr>";
            $result = mysqli_query($connection, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo '<td><b><font color="Orange">' . $row['Reg_no'] . '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['Name'] . '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['Age'] . '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['Address'] .  '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['Purpose'] .  '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['VehicleNo_ifAny'] .  '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['CheckIn_Date'] .  '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['CheckOut_Date'] .  '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['CheckedOut_By'] .  '</font></b></td>';
                    echo '<td><b><font color="Orange"><a href="delete.php?id=' . $row['Reg_no'] . '">Delete</a></font></b></td>';
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Query failed or no records found.";
            }
            break;
        case 'inoutby':
            $query = "SELECT visitor_list.Reg_no, visitor_list.Name, visitor_list.Age, visitor_list.Address, entry_status.Purpose, entry_status.VehicleNo_ifAny, entry_status.CheckIn_Date, entry_status.CheckOut_Date, entry_status.CheckedIn_By, entry_status.CheckedOut_By FROM entry_status JOIN visitor_list ON entry_status.Reg_no = visitor_list.Reg_no WHERE entry_status.CheckIn_Date BETWEEN '$date1' AND '$date2'";
            echo "<table border='1' cellpadding='10'>";
            echo "<tr>
            <th><font color='Red'>Reg. No.</font></th>
            <th><font color='Red'>Name</font></th>
            <th><font color='Red'>Age</font></th>
            <th><font color='Red'>Address</font></th>
            <th><font color='Red'>Purpose</font></th>
            <th><font color='Red'>VehicleNo_ifAny</font></th>
            <th><font color='Red'>CheckIn_Date</font></th>
            <th><font color='Red'>CheckOut_Date</font></th>
            <th><font color='Red'>CheckedIn_By</font></th>
            <th><font color='Red'>CheckedOut_By</font></th>
            <th><font color='Red'>Delete</font></th>
            </tr>";
            $result = mysqli_query($connection, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo '<td><b><font color="Orange">' . $row['Reg_no'] . '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['Name'] . '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['Age'] . '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['Address'] .  '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['Purpose'] .  '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['VehicleNo_ifAny'] .  '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['CheckIn_Date'] .  '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['CheckOut_Date'] .  '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['CheckedIn_By'] .  '</font></b></td>';
                    echo '<td><b><font color="Orange">' . $row['CheckedOut_By'] .  '</font></b></td>';
                    echo '<td><b><font color="Orange"><a href="delete.php?id=' . $row['Reg_no'] . '">Delete</a></font></b></td>';
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Query failed or no records found.";
            }
            break;
        default:
            echo "Invalid submit";
            break;
    }

    // Perform the query
    $result = mysqli_query($connection, $query);

    // Display results
    if ($result) {
        // Output results here
    } else {
        echo "Query failed: " . mysqli_error($connection);
    }
} else {
    echo "Form not submitted!";
}
?>
