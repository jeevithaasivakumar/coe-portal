<html>
    <head>
        <title>COE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <link rel="stylesheet" href="styles.css">
    <!-- <link rel="stylesheet" href="style1.css"> -->
    <body>
        <div class="auth">
            <div class="topic">
                <img src = "ptu-logo.png" alt = "ptu-logo" class = "logo">
                <div>
                    <h1 class="c">PUDUCHERRY TECHNOLOGICAL UNIVERSITY</h1>
                    <h1 class="c">OFFICE OF THE CONTROLLER OF EXAMINATIONS</h1>
                </div>
            </div>
            <div class="menu">
                <div class="center">
                <li><a href="home.html" class="button">Home</a></li>
                    <li><a href="about.html" class="button">About Us</a></li>
                    <li><a href="authentication.php" class="button">Administration</a></li>
                    <li><a href="authentication1.php" class="button active">Student Services</a></li>
                    <li><a href="notification.html" class="button">Fees</a></li>
                    <!-- <p class="pad-left menu-content"><a href="" class="button">Fee</a></p> -->
                    <li><a href="timetable.html" class="button">TimeTable</a></li>
                    <li><a href="result.html" class="button">Result</a></li>
                </div>
            </div>
            <br><br>
            <div class="auth-center">
                <br>
                <div class="cen">
                    <!-- <h1>Our Newsletter</h1> -->
                    <form method="POST">
                        <div class="inputbox">
                            <input type="text" name="email" required="required" placeholder="ENTER YOUR EMAIL">
                        </div>
                        <br>
                        <div class="inputbox">
                            <input type="submit" name="otp" value="SEND OTP" >
                        </div>
                    </form>
                </div>
            </div>
        <?php
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;
            
            require 'vendor/autoload.php';
            SESSION_START();
            if(isset($_POST['otp']))
            {
                $email = $_POST['email'];
                if(str_contains($email, '@ptuniv.edu.in') || str_contains($email, '@pec.edu'))
                {
                    $_SESSION['email'] = $email;
                    $mail = new PHPMailer(true);
                    try 
                    {
                        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'sridhalajs@gmail.com';                     //SMTP username
                        $mail->Password   = 'chfctvksstptsmzm';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('sridhalajs@gmail.com');
                        $mail->addAddress($email);     //Add a recipient

                        $code = (int) substr(number_format(time() * rand(), 0, '', ''), 0, 6);
                        $_SESSION['otp'] = $code;
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Here is the subject';
                        $mail->Body    = $code;
                        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        $mail->send();
                        header("Location: otp_verify.php");
                        // unset($_POST); 
                    } 
                    catch (Exception $e) 
                    {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        // unset($_POST); 
                    }
                }
                else
                {  
                    echo '<script type ="text/JavaScript">';  
                    echo 'alert(" ENTER CORRECT EMAIL ID!!!! ")';  
                    echo '</script>';  
                }
            }
        ?>
        </div>
    </body>
</html>
