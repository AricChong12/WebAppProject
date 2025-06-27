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
    
</head>

<body>
    <div id="wrapper">
        <div id="header">
            
        </div>

        <div id="navigation">
            
        </div>

        <div id="content-container">
            
            


            <div id="main">
            
            <?php

            if (isset($_GET['id'])) {
                $ApplicationID = $_GET['id'];
                $sql = "SELECT APPLICATION_ID, BusinessName, BusinessLocation, TerminationReason FROM business_application WHERE Status='pending' AND APPLICATION_ID = $ApplicationID ";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
  
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "Application ID: " . $row["APPLICATION_ID"]. "<br><br>";
                        echo "Business Name: " . $row["BusinessName"]. "<br><br>";
                        
                        echo "Business Location: " . $row["BusinessLocation"]. "<br><br>";
                        echo "Reason for business Termination: " . $row["TerminationReason"]. "<br><br>";
                        echo "Type: Terminate";
                    }
                } else {
                    echo "Error, cant be found";
                }
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