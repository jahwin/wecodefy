<?php
namespace system\library;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Email extends PHPMailer
{

    private $host = '';
    private $username = '';
    private $password = '';
    private $security = 'ssl'; // or TLS
    private $port = 465;
    private $is_html = false;
    private $from_email = null;
    private $from_name = null;
    private $to_email = null;
    private $to_name = null;
    private $subject = null;
    private $body = null;

    /**
     * @desc Allow to set email settings
     * @param $host, $username, $password, $is_html, $security, $port
     * @return
     */
    public function init($host, $username, $password, $is_html = false, $security = 'ssl', $port = 465)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->security = $security;
        $this->port = $port;
        $this->is_html = $is_html;
    }

    /**
     * @desc Allow to set where email from
     * @param $email, $name
     * @return
     */
    public function from($email, $name)
    {
        $this->from_email = $email;
        $this->from_name = $name;
    }

    /**
     * @desc Allow to set email will be sent
     * @param $email, $name
     * @return
     */
    public function to($email, $name)
    {
        $this->to_email = $email;
        $this->to_name = $name;
    }

    /**
     * @desc Allow to set email information
     * @param $subject, $title, $body
     * @return
     */
    public function template($subject, $title, $body)
    {
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * @desc Allow to send email
     * @param
     * @return
     */
    public function sendEmail()
    {
        try {
            //Server settings
            $this->SMTPDebug = 0; // Enable verbose debug output
            $this->isSMTP(); // Set mailer to use SMTP
            $this->Host = $this->host; // Specify main and backup SMTP servers
            $this->SMTPAuth = true; // Enable SMTP authentication
            $this->Username = $this->username; // SMTP username
            $this->Password = $this->password; // SMTP password
            $this->SMTPSecure = $this->security; // Enable TLS encryption, `ssl` also accepted
            $this->Port = $this->port; // TCP port to connect to

            //Recipients
            $this->setFrom($this->from_email, $this->from_name);
            $this->addAddress($this->to_email, $this->to_name); // Add a recipient

            //Content
            $this->Subject = $this->subject;
            $this->Body = $this->body;
            $this->isHTML($this->is_html); // Set email format to HTML
            $this->AltBody = '';
            $this->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}