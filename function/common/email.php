<?php
require_once(getFunctionPath().'/network/base.php');
//require_once(getFunctionPath().'/setting/setting.php');
function sendEmail($to, $subject, $html) {
    require_once "Mail.php";

    $from = "ZENITH <no-reply@zenith.co.id>";
    $to = $to;
    $subject = $subject;
    $body = $html;

    $host = 'smtp.office365.com';
    $port = 587;
    $username = 'no-reply@zenith.co.id';
    $password = 'Zenith#2014';

    $headers = array ('MIME-Version' => '1.0rn',
        'Content-Type' => "text/html; charset=ISO-8859-1rn",
        'From' => $from,
        'To' => $to,
        'Subject' => $subject
     );
    $smtp = Mail::factory('smtp', array('host' => $host,
                'port' => $port,
                'auth' => true,
                'username' => $username,
                'password' => $password));

    $mail = $smtp->send($to, $headers, $body);

    if (PEAR::isError($mail)) {
        return $mail->getMessage();
    } else {
        return "OK";
    }
}


