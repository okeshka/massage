<?php

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['name'];
$phone = $_POST['telephone'];
$email = $_POST['email'];
$massage = $_POST['massage'];
$date = $_POST['date'];
$time = $_POST['time'];
$comment = $_POST['comment'];


//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.rambler.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'robotovich-robot@rambler.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = '56$%rtyH'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('robotovich-robot@rambler.ru'); // от кого будет уходить письмо?
$mail->addAddress('olzuk@i.ua');     // Кому будет уходить письмо
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg'а, 'new.jpgё;    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка на массаж';
$mail->Body    = '' .$name . ' оставила заявку, её телефон ' .$phone. '<br>Почта этого пользователя: ' .$email. '<br>Вид массажа: ' .$massage. '<br>Дата записи: ' .$date. '<br>Время записи: ' .$time. '<br>Комментарий пользователя ' .$comment;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank-you.html');
}

?>
