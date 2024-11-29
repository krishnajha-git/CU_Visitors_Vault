<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
$db = mysqli_select_db($connection, 'cu_visitors_vault');
if (isset($_GET['Reg_no']) && is_numeric($_GET['Reg_no'])){
    $id = $_GET['Reg_no'];
    $query = mysqli_query($dbConn,"DELETE FROM entry_status WHERE id=$id") or die(mysqli_error($dbConn));
    $result = mysqli_query($connection, $query);
    if ($result) {
        header("Location: report.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
} else {
    header("Location: report.php");
    exit();
}
?>