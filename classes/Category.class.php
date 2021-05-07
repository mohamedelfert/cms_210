<?php


class Category extends MysqliConnect {
    private $cat_name;
    private $cat_unique;
    private $cat_id;

    public function addSetInput($name,$link){
        $this->cat_name   = $this->filter_string($this->esc($this->html_tags($name)));
        $this->cat_unique = $this->filter_string($this->esc($this->html_tags($link)));
        $this->cat_unique = trim(str_replace(' ','-',$this->cat_unique));
    }

    private function checkAddInput(){
        if (empty($this->cat_name)){
            Messages::setMessage('danger','خطأ','الرجاء ادخال اسم القسم');
            echo Messages::getMessage();
        }else if($this->checkCatName()){
            Messages::setMessage('warning','تنبيه','عفوا اسم القسم مسجل بالنظام الرجاء التاكد من وضع اسم جديد');
            echo Messages::getMessage();
        }else if(empty($this->cat_unique)){
            Messages::setMessage('danger','خطأ','الرجاء ادخال الاسم الفريد للقسم');
            echo Messages::getMessage();
        }else if($this->checkCatLink()){
            Messages::setMessage('warning','تنبيه','عفوا الاسم الفريد للقسم مسجل بالنظام الرجاء التاكد من وضع اسم جديد');
            echo Messages::getMessage();
        }else if(!preg_match('/^[a-zA-Z]/',$this->cat_unique)){
            Messages::setMessage('warning','تنبيه','الرجاء استخدام اللغه الانجليزيه عند كتابه الاسم الفريد للقسم');
            echo Messages::getMessage();
        }else{
            return TRUE;
        }
        return FALSE;
    }

    private function checkCatName(){
        $this->query('id', "category", "WHERE `cat_name` = '$this->cat_name'");
        $this->execute();
        if($this->rowCount() > 0){
            return TRUE;
        }
        return FALSE;
    }

    private function checkCatLink(){
        $this->query('id', "category", "WHERE `cat_unique` = '$this->cat_unique'");
        $this->execute();
        if($this->rowCount() > 0){
            return TRUE;
        }
        return FALSE;
    }

    private function insertNewCat(){
        $this->insert('category' , "`cat_name`, `cat_unique`" , "'$this->cat_name','$this->cat_unique'");
        if ($this->execute()){
            Messages::setMessage('success','رائع','تم اضافه القسم بنجاح');
            echo Messages::getMessage();
            echo '<meta http-equiv="refresh" content="2; \'category.php\'">';
            return true;
        }
        return false;
    }

    public function displayAddErrors(){
        if ($this->checkAddInput()){
            if (!$this->insertNewCat()){
                Messages::setMessage('danger','خطأ','حصل خطأ غير متوقع بالنظام');
                echo Messages::getMessage();
            }
        }
    }

    public function displayCategory(){
        $this->query('*', "category", "ORDER BY id DESC");
        $this->execute();
        if ($this->rowCount() > 0){
            while ($row = $this->fetch()){
                $rows[] = $row;
            }
            return $rows;
        }
    }

    public function displayCategoryNavbar(){
        $this->query('*', "category", "ORDER BY id DESC LIMIT 4");
        $this->execute();
        if ($this->rowCount() > 0){
            while ($row = $this->fetch()){
                $rows[] = $row;
            }
            return $rows;
        }
    }

    public function deleteCategory($id){
        $this->cat_id = (int)$this->esc($id);
        $this->query('id', 'category', "WHERE id = '$this->cat_id'");
        $this->execute();
        if ($this->rowCount() > 0){
            $this->delete('category', 'id', $this->cat_id);
            if ($this->execute()){
                Messages::setMessage('success','رائع','تم حذف القسم بنجاح');
                echo Messages::getMessage();
                echo '<meta http-equiv="refresh" content="2; \'category.php\'">';
            }else{
                Messages::setMessage('danger','خطأ','عفوا خطأ غير متوقع من النظام');
                echo Messages::getMessage();
                echo '<meta http-equiv="refresh" content="2; \'category.php\'">';
            }
        }else{
            header("Location: category.php");
        }
    }

    public function getCatInfo($id){
        $this->cat_id = (int)$this->esc($id);
        $this->query('*', 'category', "WHERE id = '$this->cat_id'");
        $this->execute();
        if ($this->rowCount() > 0){
            return $this->fetch();
        }else{
            header("Location: category.php");
        }
    }

    public function editCatInfo($name,$link,$id){
        $link = str_replace(' ','-',$link);
        $this->query('id', 'category', "WHERE cat_unique = '$link'");
        $this->execute();
        $fetchId = $this->fetch();
        if($this->rowCount() > 0 and $fetchId['id'] == $id){
            $this->update('category', "cat_name = '{$name}'", 'id', $id);
            $this->execute();
            Messages::setMessage('success', "تم", 'تحديث القسم بنجاح');
            echo Messages::getMessage();
            echo '<meta http-equiv="refresh" content="2; \'category.php\'">';
        }else if($this->rowCount() > 0){
            Messages::setMessage('danger', "خطأ", 'الاسم الفريد مسجل بالفعل قم بتسجيل اسم فريد آخر');
            echo Messages::getMessage();
            echo '<meta http-equiv="refresh" content="2;\'category.php\'">';
        }
        else{
            $this->update('category', "cat_name = '{$name}' , cat_unique = '{$link}'", 'id', $id);
            $this->execute();
            Messages::setMessage('success', "تم", 'تحديث القسم بنجاح');
            echo Messages::getMessage();
            echo '<meta http-equiv="refresh" content="2; \'category.php\'">';
        }
    }
}