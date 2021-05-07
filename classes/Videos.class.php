<?php


class Videos extends MysqliConnect{
    private $title;
    private $link;
    private $image;
    private $description;
    private $category;

    public function setVideosInput($title,$link,$image,$description,$category){
        $this->title       = $this->filter_string(trim($this->esc($this->html_tags($title))));
        $this->link        = trim($this->esc($this->html_tags($link)));
        $this->image       = $image;
        $this->description = $this->filter_string(trim($this->esc($this->html_tags($description))));
        $this->category    = (int)$category;
    }

    private function checkSetInput(){
        if (empty($this->title)){
            Messages::setMessage('danger','خطأ','يجب كتابه عنوان للفيديو');
            echo Messages::getMessage();
        }elseif (empty($this->link)){
            Messages::setMessage('danger','خطأ','يجب وضع لينك للفيديو');
            echo Messages::getMessage();
        }else{
            return TRUE;
        }
        return FALSE;
    }

    public function displayErrors(){
        if ($this->checkSetInput()){
            echo "yes checked";
        }
    }
}