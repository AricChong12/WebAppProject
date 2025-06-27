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
    <title>BRWGo - SignUp</title>
</head>
<body>
    <div class="background-overlay"></div>
    <div>
        
        

        <div class="content-container">
            
            <div class="wlc-container">
                <h2 class="wlc">SIGN UP</h2>

                
            </div>
            
            <div class="main">

                

                <div class="form-container">
                   
                    <div class="form">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" id="username" name="username" required class="input">
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" id="email" name="email" required class="input">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" required class="input">
                            </div>
                            <br>

                            <div class="form-group-button">
                                <input type="submit" value="SIGN UP">
                                <!--<input type="submit" value="CANCEL">-->
                                <button type="button" onclick="window.location.href='../index.php'">CANCEL</button>
                                <br><br>
                            </div>
                            
                            
                           
                            
                        </form>

                        <?php
                            //session_start();

                            if($_SERVER["REQUEST_METHOD"] == "POST"){
                            $uname = $_POST["username"];
                            $password = $_POST["password"];
                            $email = $_POST["email"];

                            $sql = "INSERT INTO users(Username, Email, Password, Role)
                                    VALUES ('$uname', '$email', '$password', 'customer')";
                            
                            if (mysqli_query($conn, $sql)) {
                                echo "New record created successfully";
                                header("Location: ../Customer/customerhome.php");
                                exit();
                            } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                exit();
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