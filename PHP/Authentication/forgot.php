<?php
include "../header.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../CSS/signup.css">
    <!--favicon-->
    <link rel="icon" type="image/x-icon" href="../../Images/cooltech.png">
    <title>BRWGo - Forgot</title>
</head>
<body>
    <div class="background-overlay"></div>
    <div>
        
        

        <div class="content-container">
            
            <div class="wlc-container">
                <h2 class="wlc">FORGOT PASSWORD</h2>

                
            </div>
            
            <div class="main">

                

                <div class="form-container">
                   
                    <div class="form">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" id="username" name="username" required class="input">
                            </div>
                            <br><!--
                            <div class="form-group">
                                <label for="uid">UserID:</label>
                                <input type="text" id="uid" name="uid" required class="input">
                            </div>
                            <br>-->
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" id="email" name="email" required class="input">
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="npassword">New Password:</label>
                                <input type="npassword" id="npassword" name="npassword" required class="input">
                            </div>

                            <br>

                            <div class="form-group-button">
                                <input type="submit" value="RESET">
                                <!--<input type="submit" value="CANCEL">-->
                                <button type="button" onclick="window.location.href='../index.php'">CANCEL</button>
                                <br><br>
                            </div>
                            
                            
                           
                            
                        </form>

                        <?php
                            //session_start();

                            if($_SERVER["REQUEST_METHOD"] == "POST"){
                            $uname = $_POST["username"];
                            $email = $_POST["email"];
                            $newpassword = $_POST["npassword"];

                            $idQuery = "SELECT USER_ID FROM users WHERE Username = '$uname' AND Email = '$email'";
                            $result = mysqli_query($conn, $idQuery);

                            if (mysqli_num_rows($result) === 1) {
                                $row = mysqli_fetch_assoc($result);
                                $UserID = $row['USER_ID'];


                                $updateQuery = "UPDATE users SET Password = '$newpassword' WHERE USER_ID = '$UserID'";
                                if (mysqli_query($conn, $updateQuery)) {
                                    echo "Password updated successfully";
                                    header("Location: ../Customer/customerhome.php");
                                    exit();
                                } else {
                                    echo "Error updating record: " . mysqli_error($conn);
                                    exit();
                                }
  
                            }else{
                                echo "Incorrect Crendetials";
                            }









                            
                            
                            
                            

                            mysqli_close($conn);


                        }

                        ?>
                        
                    </div>
                </div>
            
                
    
            </div>
            
            
    
    
        </div>
        
    

    </div>
    
    
    
</body>
</html>