
<?php

    //session_start();
    include "../../header.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_POST['action']) &&
    isset($_POST['ApplicationID']) &&
    isset($_POST['BusinessName']) &&
    isset($_POST['TerminationReason']) &&
    isset($_POST['BusinessLocation'])) {

        $action = $_POST['action'];
        $ApplicationID = $_POST['ApplicationID'];
        $bn = $_POST['BusinessName'];
        $date = $_POST['TerminationReason'];
        $bloc = $_POST['BusinessLocation'];

        $User_ID = $_COOKIE['customer_uid'];
   
        if($action == "approved"){
            
            mysqli_query($conn, "UPDATE business_application SET Status='approved' WHERE APPLICATION_ID = $ApplicationID");
            //mysqli_query($conn, "UPDATE business SET Date='$date', BusinessLocation='$bloc' WHERE USER_ID = $User_ID");

            mysqli_query($conn, "DELETE FROM business WHERE USER_ID = $User_ID AND BusinessName = '$bn'");
        
        }else if($action == "rejected"){
            mysqli_query($conn, "UPDATE business_application SET Status='rejected' WHERE APPLICATION_ID = $ApplicationID");
            // mysqli_query($conn, "DELETE FROM business_application WHERE APPLICATION_ID=$ApplicationID AND Status='rejected'");
        }

        header("Location: TerminateApprove.php");
    

    } 



?>