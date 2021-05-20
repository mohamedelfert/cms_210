<?php


class Users extends MysqliConnect {
    protected $first_name;
    protected $last_name;
    protected $email;
    protected $password;
    protected $con_password;
    protected $id;
    protected $admin;

    public function setInput($first_name,$last_name,$email,$password,$con_password,$id = null,$admin = null){
        $this->first_name   = $this->filter_string($this->esc($this->html_tags($this->html_special($first_name))));
        $this->last_name    = $this->filter_string($this->esc($this->html_tags($this->html_special($last_name))));
        $this->email        = $this->filter_email($this->esc($this->html_tags($email)));
        $this->password     = $this->esc($this->html_tags($this->html_special($password)));
        $this->con_password = $this->esc($this->html_tags($this->html_special($con_password)));
        $this->id           = $id;
        $this->admin        = $admin;
    }

    public function checkUserProfile($id){
        if ($_SESSION['user']['id'] != $id){
            if ($_SESSION['user']['isAdmin'] == true){
                return $this->getUsersInfo($id);
            }
            header("Location: index.php");
        }else{
            return $this->getUsersInfo($id);
        }
    }

    private function getUsersInfo($id){
        $this->query("*", "users", "WHERE id = '$id'");
        $this->execute();
        if ($this->rowCount() > 0){
            $user = $this->fetch();
            return $user;
        }else{
            header("Location: index.php");
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
            $this->query('id , email', "users", "WHERE email = '$this->email'");
            $this->execute();
            if ($this->rowCount() > 0){
                $user = $this->fetch();
                if ($user['email'] == $this->email and $user['id'] == $this->id){
                    return true;
                }
                return false;
            }
            return true;
        }
        return true;
    }

    public function displayErrors(){
        if ($this->checkInput()){
            $this->updateUserInfo();
        }
    }

    public function updateUserInfo(){
        $admin = ($this->admin != null and $this->admin == 1 ? 1 : 0);
        if ($this->password != null) {
            $password = md5(sha1($this->password));
            $data = "first_name = '$this->first_name', last_name = '$this->last_name', email = '$this->email', password = '$password', is_Admin = '$admin'";
        }else{
            $data = "first_name = '$this->first_name', last_name = '$this->last_name', email = '$this->email', is_Admin = '$admin'";
        }
        if ($this->id == null){
            $id = $_SESSION['user']['id'];
        }else{
            $id = $this->id;
        }
        $this->update("users", $data, 'id', $id);
        if ($this->execute()) {
            if ($this->id == null or $this->id == $_SESSION['user']['id']) {
                unset($_SESSION['user']['fname']);
                unset($_SESSION['user']['lname']);
                unset($_SESSION['user']['email']);

                $_SESSION['user']['fname'] = $this->first_name;
                $_SESSION['user']['lname'] = $this->last_name;
                $_SESSION['user']['email'] = $this->email;
            }
            Messages::setMessage('success','رائع','تم تحديث البيانات بنجاح');
            echo Messages::getMessage();
        }else{
            Messages::setMessage('danger','خطأ','عفوا حصل خطأ اثناء التحديث برجاء المحاوله مره اخري');
            echo Messages::getMessage();
        }
    }

    public function getAllUsers($other = null){
        $this->query("*", "users", $other);
        if ($this->execute() and $this->rowCount() > 0){
            while ($users = $this->fetch()){
                $user[] = $users;
            }
            return $user;
        }
    }

    public function deleteUser($id){
        $this->query("id" , "users", "WHERE id = '$id'");
        if ($this->execute() and $this->rowCount() > 0){
            $this->delete("users", "id",$id);
            if ($this->execute()){
                echo Messages::setMessage('success','رائع','تم حذف العضو بنجاح') . Messages::getMessage();
            }
        }else{
            header("Location: users.php");
        }
    }

    public function countUsers(){
        $this->query('*', "users");
        if ($this->execute() and $this->rowCount() > 0){
            return $this->rowCount();
        }
        return 0;
    }
}