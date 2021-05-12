<?php


class Contact extends MysqliConnect{
    private $email,$username,$message;

    public function setMessageInput($email,$username,$message){
        $this->email    = $this->esc($this->html_tags($email));
        $this->username = $this->filter_string($this->esc($this->html_tags($username)));
        $this->message  = $this->filter_string($this->esc($this->html_tags($message)));

        $this->insertMessage();
    }

    private function checkInputs(){
        if (empty($this->email)){
            echo Messages::setMessage('danger','خطأ','يجب اضافه البريد الالكتروني') . Messages::getMessage();
        }elseif (!$this->filter_email($this->email)){
            echo Messages::setMessage('danger','خطأ','الرجاء وضع بريد الكتروني صحيح') . Messages::getMessage();
        }elseif (empty($this->username)){
            echo Messages::setMessage('danger','خطأ','يجب اضافه الاسم') . Messages::getMessage();
        }elseif (empty($this->message)){
            echo Messages::setMessage('danger','خطأ','يجب اضافه الرساله') . Messages::getMessage();
        }else{
            return true;
        }
        return false;
    }

    private function insertMessage(){
        if ($this->checkInputs()){
            $this->insert('messages', "`email`, `username`, `message`", "'$this->email','$this->username','$this->message'");
            if ($this->execute()){
                echo Messages::setMessage('success','رائع','تم ارسال الرساله بنجاح') . Messages::getMessage();
                echo '<meta http-equiv="refresh" content="2; \'index.php\'">';
            }else{
                echo Messages::setMessage('danger','خطأ','غير متوقع الرجاء المحاوله مره اخري') . Messages::getMessage();
            }
        }
    }
}