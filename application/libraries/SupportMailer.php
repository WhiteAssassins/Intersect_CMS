<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class SupportMailer
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function sendTicketConfirmation($email)
    {
        if ($email === '') {
            return false;
        }

        $supportEmail = (string) $this->CI->config->item('supportemail');
        $supportPassword = (string) $this->CI->config->item('supportemailpassword');
        if ($supportEmail === '' || $supportEmail === 'supportemail' || $supportPassword === '' || $supportPassword === 'supportemailpassword') {
            return false;
        }

        $template = @file_get_contents(base_url('public/email.html'));
        if ($template === false) {
            $template = 'Support Ticket';
        }

        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPDebug = 0;
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAuth = true;
            $mail->isHTML(true);
            $mail->Username = $supportEmail;
            $mail->Password = $supportPassword;
            $mail->setFrom($supportEmail, 'Soporte');
            $mail->addAddress($email);
            $mail->Subject = 'Support Ticket';
            $mail->Body = utf8_decode($template);
            $mail->AltBody = utf8_decode($template);
            $mail->send();
            return true;
        } catch (Exception $exception) {
            log_message('error', 'SupportMailer failed: ' . $exception->getMessage());
            return false;
        }
    }
}
