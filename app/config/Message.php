<?php
class Message
{
    public static function addErrorMsg( $msg ) {
        $_SESSION['error_msgs'][] = $msg;
        self::setError();
    }

    private static function setError() {
        $_SESSION['error'] = true;
    }

    public static function isSetError() {
        if ( isset( $_SESSION['error'] ) ) {
            return $_SESSION['error'];
        } else {
            return false;
        }
    }

    private static function removeErrorMsg() {
        $_SESSION['error'] = false;
        $_SESSION['error_msgs'] = [];
    }

    public static function getErrorMsgs() {
        if ( self::isSetError() ) {
            $msgs = $_SESSION['error_msgs'];
            self::removeErrorMsg();
            return $msgs;
        } else {
            return [];
        }
    }

    public static function addSuccessMsg( $msg ) {
        $_SESSION['success_msgs'][] = $msg;
        self::setSuccess();
    }
    
    private static function setSuccess() {
        $_SESSION['success'] = true;
    }

    public static function isSetSuccessMsg() {
        if ( isset( $_SESSION['success'] ) ) {
            return $_SESSION['success'];
        } else {
            return false;
        }
    }

    private static function removeSuccessMsg() {
        $_SESSION['success'] = false;
        $_SESSION['success_msgs'] = [];
    }

    public static function getSuccessMsgs() {
        if ( self::isSetSuccessMsg() ) {
            $msgs = $_SESSION['success_msgs'];
            self::removeSuccessMsg();
            return $msgs;
        } else {
            return [];
        }
    }

    /**
     * TODO make renderMessage(), which render the messages instead of returning them.
     * This Idea Needs a configuration file where the developer should init the design
     * of the message.
     */

}