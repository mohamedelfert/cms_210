<?php


class Login extends MysqliConnect{
    private $email;
    private $password;
    private $pass;

    public function setInput($email,$password){
        $this->email    = $this->filter_email($this->esc($this->html_tags($email)));
        $this->password = $this->esc($this->html_tags($this->html_special($password)));
        $this->pass = md5(sha1($this->password));
    }

    private function checkInput(){
        if (empty($this->email)){
            Messages::setMessage('danger','خطأ','الرجاء ادخال البريد الالكتروني');
            echo Messages::getMessage();
        }elseif (empty($this->password)){
            Messages::setMessage('danger','خطأ','الرجاء ادخال كلمه المرور');
            echo Messages::getMessage();
        }elseif (!$this->checkUser()){
            Messages::setMessage('danger','خطأ','البيانات المدخله غير صحيحه 1');
            echo Messages::getMessage();
        }else{
            return true;
        }
        return false;
    }

    private function checkUser(){
        $this->query('id', 'users', "WHERE `email` = '$this->email' AND `password` = '$this->pass'");
        $this->execute();
        if($this->rowCount() > 0){
            return TRUE;
        }
        return FALSE;
    }

    private function makeUserLogged(){
        if($this->checkUser()){
            $this->query('*', 'users', "WHERE `email` = '$this->email' AND `password` = '$this->pass'");
            $this->execute();
            $user  = $this->fetch();
            $admin = ($user['is_Admin'] == 1 ? TRUE : FALSE);
            $_SESSION['is_logged'] = true;
            $_SESSION['user']      = [
                                        'id'      => $user['id'],
                                        'fname'   => $user['first_name'],
                                        'lname'   => $user['last_name'],
                                        'email'   => $user['email'],
                                        'isAdmin' => $admin
            ];
            return TRUE;
        }
        return FALSE;
    }

    public function displayErrors(){
        if ($this->checkInput()){
            if ($this->makeUserLogged()){
                Messages::setMessage('success','رائع','تم تسجيل الدخول بنجاح , جاري تحويلك للصفحه الرئيسيه');
                echo Messages::getMessage();
                echo '<meta http-equiv="refresh" content="3; \'index.php\'">';
            }else{
                Messages::setMessage('danger','خطأ','البيانات المدخله غير صحيحه 2');
                echo Messages::getMessage();
            }
        }
    }
}