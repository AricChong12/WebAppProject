<?php
//session_start();
include "../header.php";

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

    <title>Customer - Registration</title>
    <!--favicon-->
    <link rel="icon" type="image/x-icon" href="../../Images/cooltech.png">
    <!--CSS-->
    <link rel="stylesheet" href="../../CSS/registration.css">
</head>

<body>
    <div id="wrapper">
        <div id="header">
            
            <h1>BUSINESS REGISTRATION</h1>
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
                    

                    // if (isset($_SESSION["uname"])) {
                    //     echo "<p>Name: " . htmlspecialchars($_SESSION["uname"]) . "</p>";
                    // }

                    if (isset($_COOKIE["customer_session"])) {
                         echo "<p>Name: " . $_COOKIE["customer_session"] . "</p>";
                    }



                    
                ?>

                <!--<p>Name: Aric</p>-->
                <form action="" method="POST">
                    <label for="bname">Business Name: </label><br>
                    <input type="text" id="bname" name="bname" placeholder="Your Business Name" required><br>
                    
                    <br>

                    <label for="date">Date: </label>
                    <input type="date" id="date" name="date" required><br>

                    <br>

                    <label for="bloc">Business Location: </label><br>
                    <textarea id="bloc" name="bloc" placeholder="Your Business Location" required></textarea><br>

                    <br>

                    <input type="submit" value="SUBMIT">

                </form>

                    <?php
                            //session_start();
                            // echo "Current UID: " . $_SESSION['uid'];
                            // echo "<br>";

                            if($_SERVER["REQUEST_METHOD"] == "POST"){
                            $bname = $_POST["bname"];
                            $date = $_POST["date"];
                            $bloc = $_POST["bloc"];
                            $user_id = $_SESSION["uid"];

                            $sql = "INSERT INTO business_application(BusinessName, Date, BusinessLocation, Type, Status, USER_ID)
                                    VALUES ('$bname', '$date', '$bloc', 'register', 'pending', '$user_id')";
                            
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