<?php


class Register extends MysqliConnect {
    protected $first_name;
    protected $last_name;
    protected $email;
    protected $password;
    protected $con_password;

    public function setInput($first_name,$last_name,$email,$password,$con_password){
        $this->first_name   = $this->filter_string($this->esc($this->html_tags($this->html_special($first_name))));
        $this->last_name    = $this->filter_string($this->esc($this->html_tags($this->html_special($last_name))));
        $this->email        = $this->filter_email($this->esc($this->html_tags($email)));
        $this->password     = $this->esc($this->html_tags($this->html_special($password)));
        $this->con_password = $this->esc($this->html_tags($this->html_special($con_password)));
    }

    public function checkInput(){
        if (empty($this->first_name)){
            Messages::setMessage('danger','خطأ','الرجاء ادخال الاسم الاول');
            echo Messages::getMessage();
        }elseif (empty($this->last_name)){
            Messages::setMessage('danger','خطأ','الرجاء ادخال الاسم الاخير');
            echo Messages::getMessage();
        }elseif (empty($this->email)){
            Messages::setMessage('danger','خطأ','الرجاء ادخال البريد الالكتروني');
            echo Messages::getMessage();
        }elseif (!$this->checkEmail()){
            Messages::setMessage('warning','خطأ','عفوا البريد الالكتروني مستخدم مسبقا');
            echo Messages::getMessage();
        }elseif (empty($this->password)){
            Messages::setMessage('danger','خطأ','الرجاء ادخال كلمه المرور');
            echo Messages::getMessage();
        }elseif ($this->con_password != $this->password){
            Messages::setMessage('danger','خطأ','كلمه المرور غير متطابقه');
            echo Messages::getMessage();
        }else{
            return true;
        }
        return false;
    }

    public function displayErrors(){
        if ($this->checkInput()){
            if ($this->insertNewUser()){
                Messages::setMessage('success','رائع','تم التسجيل بنجاح , جاري تحويلك للصفحه الرئيسيه');
                echo Messages::getMessage();
                echo '<meta http-equiv="refresh" content="2; \'index.php\'">';
            }else{
                Messages::setMessage('danger','خطأ','عفوا حصل خطأ اثناء التسجيل برجاء المحاوله مره اخري');
                echo Messages::getMessage();
            }
        }
    }

    private function checkEmail(){
        $this->query('id', "users", "WHERE `email` = '$this->email'");
        $this->execute();
        if ($this->rowCount() == 0){
            return true;
        }
        return false;
    }

    private function insertNewUser(){
        $password = md5(sha1($this->password));
        $this->insert('users',"first_name , last_name , email , password",
                      "'$this->first_name','$this->last_name','$this->email','$password'");
        if ($this->execute()){
            $_SESSION['is_logged'] = true;
            $_SESSION['user']      = [
                                        'fname'   => $this->first_name,
                                        'lname'   => $this->last_name,
                                        'email'   => $this->email,
                                        'isAdmin' => FALSE
            ];
            return true;
        }
        return false;
    }
}