<?php


class Register extends MysqliConnect {
    protected $Fname;
    protected $Lname;
    protected $email;
    protected $password;
    protected $con_password;

    public function setInput($Fname,$Lname,$email,$password,$con_password){
        $this->Fname        = $this->filter_string($this->esc($this->html_entity($this->html_special($Fname))));
        $this->Lname        = $this->filter_string($this->esc($this->html_entity($this->html_special($Lname))));
        $this->email        = $this->filter_email($this->esc($this->html_entity($email)));
        $this->password     = $this->esc($this->html_entity($this->html_special($password)));
        $this->con_password = $this->esc($this->html_entity($this->html_special($con_password)));
    }

    public function checkInput(){
        if (empty($this->Fname)){
            Messages::setMessage('danger','خطأ','الرجاء ادخال الاسم الاول');
            echo Messages::getMessage();
        }elseif (empty($this->Lname)){
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
            if ($this->insertUser()){
                Messages::setMessage('success','رائع','تم التسجيل بنجاح , جاري تحويلك للصفحه الرئيسيه');
                echo Messages::getMessage();
                echo '<meta http-equiv="refresh" content="3; \'index.php\'">';
            }else{
                Messages::setMessage('danger','خطأ','عفوا حصل خطأ اثناء التسجيل برجاء المحاوله مره اخري');
                echo Messages::getMessage();
            }
        }
    }

    private function checkEmail(){
        $this->query('id', 'users', "WHERE `email` = '$this->email'");
        $this->execute();
        if ($this->rowCount() == 0){
            return true;
        }
        return false;
    }

    private function insertUser(){
        $password = md5(sha1($this->password));
        $this->insert('users',"FName,LName,email,password",
                      "'$this->Fname','$this->Lname','$this->email','$password'");
        if ($this->execute()){
            $_SESSION['is_logged'] = true;
            $_SESSION['user']      = [
                                        'FName'   => $this->Fname,
                                        'LName'   => $this->Lname,
                                        'email'   => $this->email,
                                        'isAdmin' => false
            ];
            return true;
        }
        return false;
    }
}