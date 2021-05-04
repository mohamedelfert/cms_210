<?php


class Messages{
    public static $message;

    public static function setMessage($type,$title,$msg){
        self::$message = '
                            <div class="alert alert-'.$type.' alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong>'.$title.' !</strong> '.$msg.'
                            </div>
        ';
    }

    public static function getMessage(){
        return self::$message;
    }
}