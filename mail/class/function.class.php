<?php

include 'sendmail/class.phpmailer.php';
class myfunctions {

    public function __construct() {
        $this->_mailer = new PHPMailer();
    }
     //send mail
    public function send_email($to, $cc, $bcc, $subject, $message, $alert_msg, $attachment) {

        $this->_PHPMailer = new PHPMailer();
        $mail->_mailer = 'ISO-8859-1';
        $this->_mailer->IsSMTP();
        $this->_mailer->Host = "ssl://smtp.gmail.com";

        $this->_mailer->From = "rajeshnagarn@gmail"; //Put yoyr admin email id here
        $this->_mailer->FromName = "Rajesh Nagar";
        $this->_mailer->AddAddress($to);

        if ($cc != "") {
            $this->_mailer->AddCC($cc);
        }

        if ($bcc != "") {
            $this->_mailer->AddBCC($cc);
        }

        $this->_mailer->SMTPAuth = "true";
        $this->_mailer->Username = "rajeshnagar.tops@gmail.com"; //Put yoyr admin email id here
        $this->_mailer->Password = "xdftchytoqupjthw"; //Put yoyr admin email password here
        $this->_mailer->Port = "465";
        $this->_mailer->Subject = $subject;
        $this->_mailer->IsHTML(true);
        $this->_mailer->Body = $message;
        $this->_mailer->WordWrap = 50;

        if ($attachment != '') {
            $this->_mailer->AddAttachment($attachment);
        }
        if (!$this->_mailer->Send()) {
            return 'Message was not sent. Mailer error: ' . $this->_mailer->ErrorInfo;
        } else {
            if ($alert_msg != "") {
                return $alert_msg;
            }
        }
        $this->_mailer->ClearAddresses();
    }
}
?>