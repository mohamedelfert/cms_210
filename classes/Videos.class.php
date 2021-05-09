<?php


class Videos extends MysqliConnect{
    private $title;
    private $link;
    private $image;
    private $description;
    private $category;
    private $type;

    public function setVideosInput($title,$link,$image,$description,$category,$type){
        $this->title       = $this->filter_string(trim($this->esc($this->html_tags($title))));
        $this->link        = trim($this->esc($this->html_tags($link)));
        $this->image       = $image;
        $this->description = $this->filter_string(trim($this->esc($this->html_tags($description))));
        $this->category    = (int)$category;
        $this->type        = $type;
    }

    private function checkSetInput(){
        if (empty($this->title)){
            Messages::setMessage('danger','خطأ','يجب كتابه عنوان للفيديو');
            echo Messages::getMessage();
        }elseif (empty($this->link)){
            Messages::setMessage('danger','خطأ','يجب وضع لينك للفيديو');
            echo Messages::getMessage();
        }elseif ($this->image === null){
            Messages::setMessage('danger','خطأ','يجب وضع صوره للفيديو');
            echo Messages::getMessage();
        }elseif (empty($this->description)){
            Messages::setMessage('danger','خطأ','يجب وضع وصف بسيط للفيديو');
            echo Messages::getMessage();
        }elseif (empty($this->category)){
            Messages::setMessage('danger','خطأ','يجب اختيار قسم للفيديو');
            echo Messages::getMessage();
        }else{
            $image = new UploadImages($this->image);
            if ($image->Image()){
                $this->image = $image->uploadImage;
                return true;
            }
            return false;
        }
    }

    public function displayErrors(){
        if ($this->checkSetInput()){
            $this->checkType();
        }
    }

    private function checkType(){
        if ($this->type == "add"){
            $this->addNewVideo();
        }else{
            $this->editVideo();
        }
    }

    private function addNewVideo(){
        $this->insert("videos", "`title`, `link`, `image`, `description`, `category`" ,
                                      "'$this->title','$this->link','$this->image','$this->description','$this->category'");
        if ($this->execute()){
            Messages::setMessage('success','رائع','تم رفع الفيديو بنجاح');
            echo Messages::getMessage();
            echo '<meta http-equiv="refresh" content="2; \'tubes.php\'">';
        }
    }

    private function editVideo(){
        echo 'Edit';
    }

    public function displayVideos(){
        $this->query('*', "videos", "ORDER BY id DESC LIMIT 5");
        $this->execute();
        if ($this->rowCount() > 0){
            while ($rows = $this->fetch()){
                $rowVideos[] = $rows;
            }
            return $rowVideos;
        }
    }
}