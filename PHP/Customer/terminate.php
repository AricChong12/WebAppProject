<?php
//session_start();
include "../../header.php";

if (!isset($_SESSION['uid'])) {
    header("Location: ../index.php");
    exit();
}

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
    <link rel="stylesheet" href="../../CSS/terminate.css">
</head>

<body>
    <div id="wrapper">
        <div id="header">
            
            <h1>BUSINESS TERMINATION</h1>
            <hr style="width: 100%; height: 2px;">
            
        </div>

        <div id="navigation">
            <ul>
                <li><a href="customerhome.php">Home</a></li>
                <li><a href="registration.php">Registration</a></li>
                <li><a href="renewal.php">Renewal</a></li>
                <li><a href="terminate.php">Termination</a></li>
            </ul>
        </div>

        <div id="content-container">
            
            


            <div id="main">
                <?php
                    

                    if (isset($_COOKIE["customer_session"])) {
                        echo "<p>Name: " . $_COOKIE["customer_session"] . "</p>";
                    }

                    
                ?>
                <!--<p>Name: Aric</p>-->
                <!--<p>Business Name: AricShop</p>-->
                <form action="" method="POST">
                    <?php
                        $sql = "SELECT BusinessName FROM business WHERE USER_ID = {$_COOKIE['customer_uid']}"; 

                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo '<label for="business">Business Name:</label>';
                            echo '<select name="business" id="business">';
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="'.$row["BusinessName"].'">'.$row["BusinessName"].'</option>';
                            }
                            echo '</select>';
                            echo "<br><br>";    
                        } else {
                            echo "0 business registered";
                            echo "<br><br>";
                        }

                //mysqli_close($conn);


                    ?>

                    <label for="terminate">Reason for Termination: </label><br>
                    <textarea id="terminate" name="terminate" placeholder="Your Reason" required></textarea><br>

                    <br>

                    <input type="submit" value="SUBMIT">

                </form>

                <?php
                            //session_start();

                            if($_SERVER["REQUEST_METHOD"] == "POST"){
                            $terminate = $_POST["terminate"];
                            $user_id = $_COOKIE["customer_uid"];
                            
                            $UserSelectedBusiness = $_POST["business"];

                            $sql = "INSERT INTO business_application(BusinessName, TerminationReason, Type, Status, USER_ID)
                                    VALUES ('$UserSelectedBusiness','$terminate', 'terminate', 'pending', '$user_id')";
                            
                            if (mysqli_query($conn, $sql)) {
                                echo '<script>alert("Successful");</script>';
                                exit();
                            } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                exit();
                            }

                            mysqli_close($conn);


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