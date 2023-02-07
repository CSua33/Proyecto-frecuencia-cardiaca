<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
       
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';


        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
            );
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username='cafupinedo@gmail.com';//este debe ir en el address?
            $mail->Password='apempqobhipjxiqr';                            // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('cafupinedo@gmail.com','Carlo Suárez');
           // Add a recipient
           $mail->addAddress('cafupinedo@gmail.com','Carlo Suárez');
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Alerta: el paciente se muere';
            $mail->Body    = 'Alerta: el paciente se muere';

            $mail->send();
            echo '1';
        } catch (Exception $e) {
            echo $e;
        }



?>