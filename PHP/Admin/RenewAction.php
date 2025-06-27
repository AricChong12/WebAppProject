
<?php

    //session_start();
    include "../header.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_POST['action']) &&
    isset($_POST['ApplicationID']) &&
    isset($_POST['BusinessName']) &&
    isset($_POST['Date']) &&
    isset($_POST['BusinessLocation'])) {

        $action = $_POST['action'];
        $ApplicationID = $_POST['ApplicationID'];
        $bn = $_POST['BusinessName'];
        $date = $_POST['Date'];
        $bloc = $_POST['BusinessLocation'];

        $User_ID = $_COOKIE['customer_uid'];
   
        if($action == "approved"){
            
            mysqli_query($conn, "UPDATE business_application SET Status='approved' WHERE APPLICATION_ID = $ApplicationID");
            mysqli_query($conn, "UPDATE business SET Date='$date', BusinessLocation='$bloc' WHERE USER_ID = $User_ID");
            // mysqli_query($conn, "INSERT INTO business(BusinessName, Date, BusinessLocation, APPLICATION_ID, USER_ID)
            //                 VALUES('$bn', '$date', '$bloc', '$ApplicationID', '$User_ID')"
            // );
        
        }else if($action == "rejected"){
            mysqli_query($conn, "UPDATE business_application SET Status='rejected' WHERE APPLICATION_ID = $ApplicationID");
            
        }

        header("Location: RenewApprove.php");
    

    } 



?>