<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadsForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg,jpeg', 'maxFiles' => 30],
        ];
    }
    
	public function upload()
    {
        if ($this->validate()) {
			$file_date = iconv("UTF-8", "GBK", 'uploads/'.date('Ymd',time()) );
			if (!file_exists($file_date)){
				mkdir ($file_date,0777,true);
			}
            foreach ($this->imageFiles as $file) {
				$file->name=time().rand(). '.' . $file->extension;
				//var_dump($file->name);
                $file->saveAs('uploads/'.date('Ymd',time()).'/'.$file->name);
            }
            return true;
        } else {
            return false;
        }
    }
}