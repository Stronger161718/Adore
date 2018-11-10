<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadaForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 
			'skipOnEmpty' => true,
			'extensions' => 'png,jpg,jpeg' ,'maxSize' => 30*1024*1024],
        ];
    }
	
    
    public function upload()
    {
		if ($this->va()) {

			$file_date = iconv("UTF-8", "GBK", 'uploads/'.date('Ymd',time()) );
			if (!file_exists($file_date)){
				mkdir ($file_date,0777,true);
			}
			//var_dump($this->imageFile);exit;
			if($this->imageFile){
				$this->imageFile->name=time(). '.' . $this->imageFile->extension;
				$this->imageFile->saveAs('uploads/'.date('Ymd',time()).'/'.$this->imageFile->name);
			}
			return true;
		} else {
			return false;
		}
    }
	public function va(){
		if($this->imageFile->size<=30*1024*1024){
			if($this->imageFile->type=='image/jpeg'){
				return true;
			}
		}else{
			return false;
		}
	}
}