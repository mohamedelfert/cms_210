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

    public function getMessages(){
        $this->query('*', "messages", "ORDER BY id DESC LIMIT 10");
        $this->execute();
        if ($this->rowCount() > 0){
            while ($messages = $this->fetch()){
                 $messageInfo[] = $messages;
            }
            return $messageInfo;
        }
    }

    public function getMessageById($id){
        $id = (int)$this->esc($id);
        $this->query('*', "messages", "WHERE id = '{$id}'");
        $this->execute();
        if ($this->rowCount() > 0){
            while ($messages = $this->fetch()){
                $messageInfo[] = $messages;
            }
            return $messageInfo;
        }
    }

    public function deleteMessages($id){
        $id = (int)$this->esc($id);
        $this->delete('messages', 'id',$id);
        if ($this->execute()){
            echo Messages::setMessage('success','رائع','تم حذف الرساله بنجاح') . Messages::getMessage();
            echo '<meta http-equiv="refresh" content="2; \'inbox.php\'">';
        }else{
            echo Messages::setMessage('danger','خطأ','غير متوقع الرجاء المحاوله مره اخري') . Messages::getMessage();
        }
    }
}