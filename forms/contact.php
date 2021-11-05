
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$name1='';
if(isset($_POST["submit"])){
// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // 0 - Disable Debugging, 2 - Responses received from the server
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'girlsdoingtech@gmail.com';                     // SMTP username
    $mail->Password   = 'Fatayat911!';                               // SMTP password
    $mail->SMTPSecure = 'tls';//PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($_POST['email'], $_POST['name']);//sender
    $mail->addAddress('girlsdoingtech@gmail.com', 'Girlsdoingtech11');     // Add a recipient
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    // Attachement 
   
    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = $_POST['subject'];
    $mail->Body =  'name & surname: '.$_POST['name'].' '.$_POST['surname'].',<br><br > email :'.$_POST['email'].' ,<br ><br > Phone: '.$_POST['phone'].' ,<br> <br> Message : '.$_POST['message'].' ' ; //;A test email from <a href="https://makitweb.com">maktiweb.com</a>';
    header("location:".$_SERVER['HTTP_REFERER']);
    $mail->send();
    //////
   
/*  if(  $mail->send()) { */
    $name1='Message has been sent';
/////////}

    
   
  
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}}

?>