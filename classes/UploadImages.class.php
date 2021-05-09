<?php


class UploadImages{
    private $image;
    public $uploadImage;

    public function __Construct($image){
        $this->image = $image;
    }

    private function checkImage(){
        $imageDetails = $this->image;

        $imageName    = $imageDetails['name'];
        $imageTmp     = $imageDetails['tmp_name'];
        $imageSize    = $imageDetails['size'];
        $imageError   = $imageDetails['error'];

        $imageExe     = strtolower(pathinfo($imageName,PATHINFO_EXTENSION));

        $newName      = uniqid('image',false) . '.' . $imageExe;

        $validExe     = array('bmb','jpeg','jpg','png');

        if (!in_array($imageExe,$validExe)){
            Messages::setMessage('danger','خطأ','يجب اختيار صوره تكون باحد هذه الامتدادات (bmb , jpeg , jpg , png)');
            echo Messages::getMessage();
        }elseif ($imageSize > 1024 * 1024){
            Messages::setMessage('danger','خطأ','يجب ان يكون حجم الصوره 1MB او اقل');
            echo Messages::getMessage();
        }elseif ($imageError != 0){
            Messages::setMessage('danger','خطأ','حصل اثناء رفع الصوره');
            echo Messages::getMessage();
        }else{
            $dir = __DIR__ . '/../libs/upload/';
            if (!file_exists($dir)){
                mkdir($dir,0777,TRUE);
            }
            $imageDir = $dir . $newName;
            if (move_uploaded_file($imageTmp,$imageDir)){
                $this->uploadImage = $newName;
                return TRUE;
            }else{
                Messages::setMessage('danger','خطأ','حصل اثناء رفع الصوره');
                echo Messages::getMessage();
            }
        }
    }

    public function Image(){
        if ($this->checkImage())
            return TRUE;
        return FALSE;
    }

}