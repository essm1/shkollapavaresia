<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $emri = $_POST['emri'];
    $mbiemri = $_POST['mbiemri'];
    $email = $_POST['email'];
    $telefoni = $_POST['telefoni'];
    $mesazhi = $_POST['mesazhi'];

    // Vendos emailin e drejtuesit të shkollës këtu
    $to = "pavaresia.shkolla@gmail.com";  
    $subject = "Mesazh nga formulari i faqes";
    $body = "Emri: $emri\nMbiemri: $mbiemri\nEmail: $email\nTel: $telefoni\nMesazhi: $mesazhi";

    $headers = "From: $email";

    if(mail($to, $subject, $body, $headers)){
        echo "Mesazhi u dërgua me sukses!";
    } else {
        echo "Gabim gjatë dërgimit të mesazhit.";
    }
}
?>

