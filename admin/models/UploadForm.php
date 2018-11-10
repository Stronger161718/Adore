<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png,jpg,jpeg' ,'maxSize' => 30*1024*1024],
        ];
    }
	
    
    public function upload()
    {
        if ($this->validate()) {	
			$file_date = iconv("UTF-8", "GBK", 'uploads/'.date('Ymd',time()) );
			if (!file_exists($file_date)){
				mkdir ($file_date,0777,true);
			}
			$this->imageFile->name=time(). '.' . $this->imageFile->extension;
            $this->imageFile->saveAs('uploads/'.date('Ymd',time()).'/'.$this->imageFile->name);
            return true;
        } else {
            return false;
        }
    }
}