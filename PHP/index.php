<?php
include "header.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/index.css">
    <!--favicon-->
    <link rel="icon" type="image/x-icon" href="../Images/cooltech.png">
    <title>BRWGo</title>
</head>
<body>
    <div class="background-overlay"></div>
    <div>
        
        <h1 class="website-title">Business Registration Website</h1>

        <div class="content-container">
            
            <div class="wlc-container">
                <h2 class="wlc">WELCOME</h2>

                
            </div>
            
            <div class="main">

                

                <div class="form-container">
                   
                    <div class="form">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="uname">Username:</label>
                                <input type="text" id="uname" name="uname" required class="input">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" required class="input">
                            </div>
                            <br>

                            <div class="form-group-button">
                                <input type="submit" value="LOGIN">
                                <!--<input type="submit" value="SIGN UP">-->
                                <button type="button" onclick="window.location.href='Authentication/signup.php'">SIGN UP</button>
                                <br><br>

                                
                            </div>
                            <br>
                            
                            <a href="Authentication/forgot.php">Forgot Password</a>
                           
                            
                        </form>

                        <?php
                            //session_start();

                            if($_SERVER["REQUEST_METHOD"] == "POST"){
                            $uname1 = $_POST["uname"];
                            $password = $_POST["password"];
                            $_SESSION["uname"] = $uname1; // from login input
                            
                            
                            

                            $sql = "SELECT * FROM users WHERE username='$uname1'";
                            $result = mysqli_query($conn, $sql);
                            
                            if (mysqli_num_rows($result) === 1) {
                                $row = mysqli_fetch_assoc($result);

                                if($password == $row['Password']){
                                    
                                    $_SESSION['username'] = $row['Username']; // from db
                                    $_SESSION['uid'] = $row['USER_ID'];
                                    $_SESSION['role'] = $row['Role'];

                                    if($row['Role'] == 'admin'){
                                        //setcookie('admin_session', '30', time() + 3600, '/');
                                        setcookie("admin_session", $_SESSION['username'] , time() + 3600, "/");
                                        setcookie("admin_uid", $_SESSION['uid'] , time() + 3600, "/");
                                        header("Location: Admin/adminhome.php");
                                        exit();
                                    }else{
                                        //setcookie('customer_session', '30', time() + 3600, '/');
                                        setcookie("customer_session", $_SESSION['username'] , time() + 3600, "/");
                                        setcookie("customer_uid", $_SESSION['uid'] , time() + 3600, "/");
                                        header("Location: Customer/customerhome.php");
                                        exit();
                                    }

                                    
                                }else{
                                    echo "<script>alert('Wrong credentials');</script>";
                                }
                            }





                            // //fix admin and user email and password, connect to db
                            // if($uname == "admin" && $password == "123"){
                            
                            //     $_SESSION["uname"] = $uname;
                            //     header("Location: Admin/adminhome.php");
                            // }else if($uname == "aric" && $password == "123"){
                                
                            //     $_SESSION["uname"] = $uname;
                            //     header("Location: Customer/customerhome.php");
                                
                            // }
                            // else{
                            //     echo "<script>alert('WRONG CRDENTAILS');</script>";
                            // }
                        }

            
                        ?>
                        
                    </div>

                    
                </div>
            
                
                

            </div>
            
            
            
    
        </div>
        <br>
        <div class="footer">
            <a href="../PDF/SAMPLE.pdf" download class="guides">Guideline | </a><a href="../PDF/SAMPLE.pdf" download class="guides">Terms and Conditions | </a><a href="../PDF/SAMPLE.pdf" download class="guides">Policy</a>
            <p>©Copyright 2025 ZinWen</p>
        </div>
    

    </div>
    
    
    
    
</body>
</html>