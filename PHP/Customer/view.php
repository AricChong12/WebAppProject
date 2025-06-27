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

    <title>Customer - Termination</title>
    <!--favicon-->
    <link rel="icon" type="image/x-icon" href="../../Images/cooltech.png">
    <!--CSS-->
    <!--<link rel="stylesheet" href="../../CSS/terminate.css">-->
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

    

                    $sql = "SELECT BusinessName FROM business";
                    $result = mysqli_query($conn, $sql);


                    if (mysqli_num_rows($result) > 0) {
                        echo "Your Registered Business: ";
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<ul>
                                    <li>{$row["BusinessName"]}</li>
                                </ul>";
            
            
                        }
                    } else {
                        echo "0 business registered";
                    }




                ?>


            </div>
            <div id="side">
            
            </div>

            
                
            </div>
        </div>
    </div>

</body>

</html>