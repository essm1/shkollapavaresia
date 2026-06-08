<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $emri = $_POST['emri'];
    $mbiemri = $_POST['mbiemri'];
    $email = $_POST['email'];
    $telefoni = $_POST['telefoni'];
    $mesazhi = $_POST['mesazhi'];

    $mail = new PHPMailer(true);

    try {
        // Konfigurimi SMTP për Gmail
        $mail->isSMTP();
        $mail->Host       = 'pavaresia.shkolla@gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'pavaresia.shkolla@gmail.com'; // vendos Gmail-in e drejtuesit
        $mail->Password   = 'PASSWORD_APLIKACIONI'; // përdor "App Password" nga Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Dërguesi dhe marrësi
        $mail->setFrom($email, $emri . " " . $mbiemri);
        $mail->addAddress('pavaresia.shkolla@gmail.com'); // Gmail i drejtuesit

        // Përmbajtja
        $mail->isHTML(true);
        $mail->Subject = 'Mesazh nga formulari i faqes';
        $mail->Body    = "
            <b>Emri:</b> $emri<br>
            <b>Mbiemri:</b> $mbiemri<br>
            <b>Email:</b> $email<br>
            <b>Tel:</b> $telefoni<br>
            <b>Mesazhi:</b> $mesazhi
        ";

        $mail->send();
        echo "Mesazhi u dërgua me sukses!";
    } catch (Exception $e) {
        echo "Gabim gjatë dërgimit: {$mail->ErrorInfo}";
    }
}
?>

