<?php


class Users extends MysqliConnect {
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

    public function checkUserProfile($id){
        if ($_SESSION['user']['id'] != $id){
            header("Location: index.php");
        }else{
            $this->query("*", "users", "WHERE id = '$id'");
            $this->execute();
            if ($this->rowCount() > 0){
                $user = $this->fetch();
                return $user;
            }else{
                header("Location: index.php");
            }
        }
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
        }elseif (!empty($this->password) or !empty($this->con_password)){
            if ($this->password != $this->con_password){
                Messages::setMessage('danger','خطأ','كلمه المرور غير متطابقه');
                echo Messages::getMessage();
            }
        }else{
            return true;
        }
        return false;
    }

    public function checkEmail(){
        if ($this->email != $_SESSION['user']['email']){
            $this->query('id', "users", "WHERE email = '$this->email'");
            $this->execute();
            if ($this->rowCount() == 0){
                return true;
            }
            return false;
        }
        return true;
    }

    public function displayErrors(){
        if ($this->checkInput()){
            $this->updateUserInfo();
        }
    }

    public function updateUserInfo(){
        $password = md5(sha1($this->password));
        if ($this->password != null) {
            $data = "first_name = '$this->first_name', last_name = '$this->last_name', email = '$this->email', password = '$password'";
        }else{
            $data = "first_name = '$this->first_name', last_name = '$this->last_name', email = '$this->email'";
        }
        $this->update("users", $data, 'id', $_SESSION['user']['id']);
        if ($this->execute()) {
            unset($_SESSION['user']['fname']);
            unset($_SESSION['user']['lname']);
            unset($_SESSION['user']['email']);

            $_SESSION['user']['fname'] = $this->first_name;
            $_SESSION['user']['lname'] = $this->last_name;
            $_SESSION['user']['email'] = $this->email;

            Messages::setMessage('success','رائع','تم تحديث البيانات بنجاح');
            echo Messages::getMessage();
        }else{
            Messages::setMessage('danger','خطأ','عفوا حصل خطأ اثناء التحديث برجاء المحاوله مره اخري');
            echo Messages::getMessage();
        }
    }
}