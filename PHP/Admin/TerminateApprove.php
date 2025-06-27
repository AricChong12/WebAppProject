<?php
//session_start();
include "../../header.php";


?>

<!--Main Navigation-->
<!DOCTYPE html>
<html>

<head>
    <!--meta tags-->
    <meta charset="UTF-8">
    <!--SEO and search engines-->
    <meta name="keywords" content="ChongZinWen">
    <meta name="description" content="Zin Wen">

    <meta name="author" content="ChongZinWen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin - Home</title>
    <!--favicon-->
    <link rel="icon" type="image/x-icon" href="../../Images/cooltech.png">
    <!--CSS-->
    <link rel="stylesheet" href="../../CSS/Approve.css">
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <h1>TERMINATION APPROVAL</h1>
            <hr style="width: 100%; height: 2px;">
        </div>

        <div id="navigation">
            <ul>
                <li><a href="adminhome.php">Home</a></li>
                <li><a href="RegistApprove.php">Registration Approval</a></li>
                <li><a href="RenewApprove.php">Renewal Approval</a></li>
                <li><a href="TerminateApprove.php">Termination Approval</a></li>
            </ul>
        </div>

        <div id="content-container">
            
            


            <div id="main">
            
            <?php
            $sql = "SELECT APPLICATION_ID, BusinessName, BusinessLocation, TerminationReason FROM business_application WHERE Status='pending' AND Type='terminate'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
            
                while($row = mysqli_fetch_assoc($result)) {
                 echo '<span>ID: <a href="TerminateView.php?id=' . $row["APPLICATION_ID"] . '">' . $row["APPLICATION_ID"] . '</a></span>' .
                 '<form method="POST" action="TerminateAction.php" style="display:inline;">
                    
                    <input type="hidden" name="ApplicationID" value="' . $row["APPLICATION_ID"] . '">
                    <input type="hidden" name="BusinessName" value="' . $row["BusinessName"] . '">
                    <input type="hidden" name="BusinessLocation" value="' . $row["BusinessLocation"] . '">
                    <input type="hidden" name="TerminationReason" value="' . $row["TerminationReason"] . '">
                    

                    <button type="submit" name="action" value="approved">✅</button>
                    <button type="submit" name="action" value="rejected">❌</button>
                 </form>'. "<br><br>";

                
                    
                


                }
            } else {
                echo "No applications found";
            }


            

            ?>


            </div>
            <div id="side">
               
            </div>

            <!--<div id="footer">
                
            </div>-->
        </div>
    </div>

</body>

</html>