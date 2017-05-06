<?php

namespace app\util;

use app\Config;

/**
 * Mail class
 */
class Mail {

    public static function sendEmailToAdmin($name, $email, $subject, $message) {		
		$headers = "From: 'Website' <" . $email . ">\r\n";
		$headers .= "Reply-To: " . Config::ADMIN_EMAIL . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";		
		return mail(Config::ADMIN_EMAIL, $subject, $message, $headers);      
    }

}