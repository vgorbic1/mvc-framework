<?php

namespace app\util;

/**
 * Validator class
 */
class Validator {

    // Validate form fields
    public static function checkFormData($name,$email,$subject,$message) {
        $error = (Validator::isEmpty($name)) ? "Name field is empty" : "";
        if ($error != "") return $error;
       
        $error = (Validator::isEmpty($email)) ? "Email field is empty" : "";
        if ($error != "") return $error;
         
        $error = (Validator::isEmpty($subject)) ? "Subject field is empty" : "";
        if ($error != "") return $error;
  
        $error = (Validator::isEmpty($message)) ? "Message field is empty" : "";
        if ($error != "") return $error;

        return $error;         
    }	

    public static function isEmpty($field) {
        return (empty($field) || $field == "") ? true : false;
    }
}