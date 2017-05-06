<?php

namespace app\controllers;

use \core\View;
use \app\util\Validator;
use \app\util\Mail;

/**
 * Home controller
 */
class Contact extends \core\Controller {

    // Before filter
    protected function before() { }

    // After filter
    protected function after() { }

    // Send contact form message
    public function indexAction() {
        if (!empty($_POST['submit'])) {
            $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $subject = filter_var(trim($_POST['subject']), FILTER_SANITIZE_STRING);
            $message = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);
            $error = validator::checkFormData($name,$email,$subject,$message);
            if($error != "") {
                view::renderTemplate('contact/index.html', [
                        'name' => $name,
                        'email' => $email,
                        'subject' => $subject,
                        'message' => $message,
                        'error' => $error]);                        
            } else {
                if (mail::sendEmailToAdmin($name,$email,$subject,$message)) {
                    view::renderTemplate('contact/sent.html');  
                } else {
                    view::renderTemplate('contact/index.html', [
                        'error' => 'Cannot send email']);                   
                }                  
            }
        } else {
            view::renderTemplate('contact/index.html');
        }
    }	
}