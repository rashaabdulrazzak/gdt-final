<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST["submit"])){
// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // 0 - Disable Debugging, 2 - Responses received from the server
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'menelturki@gmail.com';                     // SMTP username
    $mail->Password   = 'HAYATguzel1';                               // SMTP password
    $mail->SMTPSecure = 'tls';//PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($_POST['email'], $_POST['name']);//sender
    $mail->addAddress('menelturki@gmail.com', 'Girlsdoingtech11');     // Add a recipient
  
    // Attachement 
    $mail->addAttachment('upload/file.pdf');
    $mail->addAttachment('upload/image.png', 'image 1');    // Optional name

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Send email using SMTP with PHPmailer';
    $mail->Body = 'A test email from <a href="https://makitweb.com">maktiweb.com</a>';
    $mail->AltBody = 'A test email from makitweb.com'; // Plain text for non-HTML mail clients




    $mail->send();
    echo 'Message has been sent';
  //  echo $_POST['email1'];
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}}
?>

