<?php
    include 'connection.php';
?>

<html>
    <head>
        <title>COE</title>
    </head>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="authentication.css">
    <body>
        <div class="auth">
            <div class="topic">
                <img src = "ptu-logo.png" alt = "ptu-logo" class = "logo">
                <div style="padding-top:5mm;padding-left:8mm;">
                    <h1 class="c">PUDUCHERRY TECHNOLOGICAL UNIVERSITY</h1>
                    <h1 class="c">OFFICE OF THE CONTROLLER OF EXAMINATIONS</h1>
                </div>
            </div>
            <br><br>
            <div class="auth-center">
                <br>
                <div class="cen">
                    <!-- <h1>Our Newsletter</h1> -->
                    <form method="POST">
                        <div class="inputbox">
                            <input type="text" name="otp" required="required" placeholder="ENTER THE OTP">
                        </div>
                        <br>
                        <div class="inputbox">
                            <input type="submit" name="verify-otp" value="VERIFY OTP" >
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        
            SESSION_START();
            echo $_SESSION['otp'];
            // echo $_SESSION['regno'];
            if(isset($_POST['verify-otp']))
            {
                if($_POST['otp'] == $_SESSION['otp'])
                {
                    if(str_contains($_SESSION['email'],'dean.academics'))
                    {
                        header("Location: otp_verify.php");
                    }
                    elseif(str_contains($_SESSION['email'],'dean.students'))
                    {
                        header("Location: otp_verify.php");
                    }
                    elseif(str_contains($_SESSION['email'],'dean1.exams') || str_contains($_SESSION['email'],'dean2.exams') || str_contains($_SESSION['email'],'dean3.exams'))
                    {
                        header("Location: otp_verify.php");
                    }
                    else
                    {
                        $sql = "SELECT email FROM u_faculty WHERE email = '$_SESSION[email]'";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result) == 1 )
                        {
                            header("Location: final/index.php");
                        }
                        else
                        {
                            $regno = "SELECT regno FROM u_student WHERE email = '$_SESSION[email]'";
                            $result1 = mysqli_query($conn,$regno);
                            $x = mysqli_fetch_assoc($result1);
                            $_SESSION['regno'] = $x['regno'];
                            // echo $_SESSION['regno'];
                            header("Location: student.php");
                        }
                    } 
                }
            }
        ?>
    </body>
</html>