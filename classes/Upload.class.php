<?php


class Upload{
    private $file;
    private $uploadFile;

    public function __construct($file){
        $this->file = $file;
        $this->checkFile();
    }

    private function checkFile(){
        $fileDetails = $this->file;

        $fileName  = $fileDetails['name'];
        $fileTmp   = $fileDetails['tmp_name'];
        $fileSize  = $fileDetails['size'];
        $fileError = $fileDetails['error'];

        $fileExe   = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

        $newName   = uniqid('video',false) . '.' . $fileExe;

        $valid_exe = array('png','jpeg','jpg','gif'); /*هنا عملت array عشان احط فيها الصيغ اللي انا عايزها بس محدش يرفع غيرها*/

        if (!in_array($fileExe,$valid_exe)){
            Messages::setMessage('danger','خطأ','يجب وضع صوره يكون امتدادها من المسموح ( jpg , jpeg , png , gif )');
            echo Messages::getMessage();
        }elseif ($fileSize > 3072 * 1024){
            Messages::setMessage('danger','خطأ','يجب رفع صوره بحجم اقل من 3Mb');
            echo Messages::getMessage();
        }elseif ($fileError != 0){
            Messages::setMessage('danger','خطأ','حصل خطأ اثناء رفع الصوره');
            echo Messages::getMessage();
        }else{
            $dir = __DIR__ . '/../libs/upload/';
            if (!file_exists($dir)){
                mkdir($dir,0777,TRUE);
            }
            $fileDir = $dir . $newName;
            if (move_uploaded_file($fileTmp,$fileDir)){
                $this->uploadFile = $newName;
            }else{
                Messages::setMessage('danger','خطأ','حصل خطأ اثناء رفع الصوره');
                echo Messages::getMessage();
            }
        }
    }

    public function newFile(){
        return $this->uploadFile;
    }
}