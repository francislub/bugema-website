<?php
class email
{
    function sendMessage($to,$subject,$cc,$body,$onSuccess,$onfail)
    {
	
        require_once APP_DIR."thirdparty/PHPMailer/PHPMailerAutoload.php";
        $mail = new PHPMailer;
        $mail->SMTPAuth = true;
        //* Abdi Joseph -  SMTP FIX !!!!
        $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );
        //End of Abdi Joseph
        $mail->isSMTP();
        $mail->SMTPDebug = false;
        $mail->do_debug = 0;
        $mail->Debugoutput = 'html';
        $mail->SMTPSecure = "tls";
        $mail->Host = SMTPSERVER;
        $mail->Port = SMTP_PORT;
        $mail->Username = SYSTEM_EMAIL;
        $mail->Password = SYSTEM_EMAIL_PASSWORD;
        $mail->SetFrom(SYSTEM_EMAIL, 'UHRC Human Resource DMS');
        $mail->Subject = $subject;
        $mail->addAddress($to);
        if(!empty($cc))
        {
            foreach($cc as $email)
            {
            $mail->addCC($email);
            }
        }
        //$mail->addCC($AdminEmail);
        //$mail->addCC("alvinlove3@gmail.com");
        //Send HTML or Plain Text email
        $mail->isHTML(true);
        $mail->Body = $body;
        if(!$mail->send()) // Dont forget to add "!" condition
        {
            return $onfail;
        }
        else
        {
            return $onSuccess;
        }
    }
}
?>