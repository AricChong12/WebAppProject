<?php
session_name("admin_session");
include "../header.php";

    
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
    <link rel="stylesheet" href="../../CSS/admin.css">
</head>

<body>
    <div id="wrapper">
        <div id="header">
            
            <h1>BUSINESS REGISTRATION WEBSITE</h1>
            <hr style="width: 100%; height: 2px;">
            <button type="button" onclick="window.location.href='../index.php'">LOGOUT</button>
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
            <canvas id="canvas3" width="250" height="250" style="border: 1px solid #000000;"></canvas>
<script>
    const canvas3 = document.getElementById("canvas3");
    const ctx3 = canvas3.getContext("2d");

    let radius = canvas3.height / 2;
    ctx3.translate(radius, radius);
    radius *= 0.90;

    function drawClock() {
        drawFace(ctx3, radius);
        drawNumbers(ctx3, radius);
        drawTime(ctx3, radius);
    }

    function drawFace(ctx, radius) {
        const grad = ctx.createRadialGradient(0, 0, radius * 0.95, 0, 0, radius * 1.05);
        grad.addColorStop(0, '#333');
        grad.addColorStop(0.5, 'white');
        grad.addColorStop(1, '#333');

        ctx.beginPath();
        ctx.arc(0, 0, radius, 0, 2 * Math.PI);
        ctx.fillStyle = 'white';
        ctx.fill();

        ctx.strokeStyle = grad;
        ctx.lineWidth = radius * 0.1;
        ctx.stroke();

        ctx.beginPath();
        ctx.arc(0, 0, radius * 0.1, 0, 2 * Math.PI);
        ctx.fillStyle = '#333';
        ctx.fill();
    }

    function drawNumbers(ctx, radius) {
        ctx.font = radius * 0.15 + "px arial";
        ctx.textBaseline = "middle";
        ctx.textAlign = "center";
        for (let num = 1; num <= 12; num++) {
            const ang = num * Math.PI / 6;
            ctx.rotate(ang);
            ctx.translate(0, -radius * 0.85);
            ctx.rotate(-ang);
            ctx.fillText(num.toString(), 0, 0);
            ctx.rotate(ang);
            ctx.translate(0, radius * 0.85);
            ctx.rotate(-ang);
        }
    }

    function drawTime(ctx, radius) {
        const now = new Date();
        let hour = now.getHours();
        let minute = now.getMinutes();
        let second = now.getSeconds();

        // Hour
        hour = hour % 12;
        hour = (hour * Math.PI / 6) + (minute * Math.PI / (6 * 60)) + (second * Math.PI / (360 * 60));
        drawHand(ctx, hour, radius * 0.5, radius * 0.07);

        // Minute
        minute = (minute * Math.PI / 30) + (second * Math.PI / (30 * 60));
        drawHand(ctx, minute, radius * 0.8, radius * 0.07);

        // Second
        second = (second * Math.PI / 30);
        drawHand(ctx, second, radius * 0.9, radius * 0.02);
    }

    function drawHand(ctx, pos, length, width) {
        ctx.beginPath();
        ctx.lineWidth = width;
        ctx.lineCap = "round";
        ctx.moveTo(0, 0);
        ctx.rotate(pos);
        ctx.lineTo(0, -length);
        ctx.stroke();
        ctx.rotate(-pos);
    }

    setInterval(drawClock, 1000);
</script>

            <p id="time"></p>
            <script>
                const clockInWords = new Date();
                document.getElementById("time").innerHTML = clockInWords;
            </script>

    


            </div>
            <div id="side">
                <img src="../../Images/cooltech.png" wdith="300" height="300">
            </div>

            <div id="footer">
                <?php
                    
                    if (isset($_COOKIE["admin_session"])) {
                        echo "<p>Login as: " . $_COOKIE["admin_session"] . "</p>";
                    }
                    
                ?>
            </div>
        </div>
    </div>

</body>

</html>