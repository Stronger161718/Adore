<?php

namespace app\controllers;

use yii\web\Controller;
use yii\db\Query;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use Yii;

use yii\web\UploadedFile;
use app\models\News;
use app\models\Xwssimg;
use app\models\UploadForm;
use dektrium\user\traits\AjaxValidationTrait;

class XwssController extends Controller
{	
	use AjaxValidationTrait;
    public function actionQydt()
    {
		Url::remember('', 'actions-redirect');
        $query = News::find()->where(['type'=>'1','isdel' =>'0' ]);
		$provider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'pageSize' => 20,
			],
			'sort' => [
				'defaultOrder' => [
					'id' => SORT_ASC,
				]
			],
		]);
		//var_dump($provider);
		return $this->render('qydt', ['dataProvider'=>$provider]);
	}
	public function actionAdd_qydt()
    {
		$text=new News();
		$model = new UploadForm();
        $this->performAjaxValidation($model);
		if(\Yii::$app->request->post()){
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			if($model->upload()&&$text->load(\Yii::$app->request->post()) && $text->save(false)){
				$img_name=$model->imageFile->name;
				$img_up='uploads/'.date('Ymd',time()).'/'. $img_name;
				$PPP=Yii::$app->request->post();
				$img_size=getimagesize($img_up);
				$img_x=$PPP['x']*$img_size[0]/500;
				$img_y=$PPP['y']*$img_size[0]/500;
				$img_w=$PPP['w']*$img_size[0]/500;
				$img_h=$PPP['h']*$img_size[0]/500;
				$targ_w =388;
				$targ_h =259;
				$jpeg_quality = 85;
				//var_dump($model->imageFile->extension);exit;
				if($model->imageFile->extension=='png'){
					$img_r = imagecreatefrompng($img_up);
				}else{
					$img_r = imagecreatefromjpeg($img_up);
				}
				$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
				imagecopyresampled($dst_r,$img_r,0,0,$img_x,$img_y,
				$targ_w,$targ_h,$img_w,$img_h);
				imagejpeg($dst_r,"uploads/jcrop/".$img_name,$jpeg_quality);
				imagedestroy($dst_r);
				$img_jcrop="jcrop/".$img_name;
				//图片裁剪已完成
				//上传到数据库
				$upid=$text->attributes['id'];
				Yii::$app->db->createCommand()->update('news', ['img' => $img_jcrop],['id'=>$upid])->execute();
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '修改成功'));
				return $this->redirect(Url::to('qydt'));
			}
		}
		return $this->render('add_qydt', ['model' => $model,'text'=>$text]);
	}
	public function actionEdit_qydt($id)
    {
		$text=News::findone($id);;
		$model = new UploadForm();
        $this->performAjaxValidation($model);
		if(\Yii::$app->request->post()){
			//var_dump($text->upload());exit;
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			if($model->upload()&&$text->load(\Yii::$app->request->post()) && $text->save(false)){
				$img_name=$model->imageFile->name;
				$img_up='uploads/'.date('Ymd',time()).'/'. $img_name;
				$PPP=Yii::$app->request->post();
				$img_size=getimagesize($img_up);
				$img_x=$PPP['x']*$img_size[0]/500;
				$img_y=$PPP['y']*$img_size[0]/500;
				$img_w=$PPP['w']*$img_size[0]/500;
				$img_h=$PPP['h']*$img_size[0]/500;
				$targ_w =388;
				$targ_h =259;
				$jpeg_quality = 85;
				//var_dump($model->imageFile->extension);exit;
				if($model->imageFile->extension=='png'){
					$img_r = imagecreatefrompng($img_up);
				}else{
					$img_r = imagecreatefromjpeg($img_up);
				}
				$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
				imagecopyresampled($dst_r,$img_r,0,0,$img_x,$img_y,
				$targ_w,$targ_h,$img_w,$img_h);
				imagejpeg($dst_r,"uploads/jcrop/".$img_name,$jpeg_quality);
				imagedestroy($dst_r);
				$img_jcrop="jcrop/".$img_name;
				//图片裁剪已完成
				//上传到数据库
				Yii::$app->db->createCommand()->update('news', ['img' => $img_jcrop ],['id'=>$id])->execute();
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '修改成功'));
				return $this->redirect(Url::to('qydt'));
			}
		}
		return $this->render('edit_qydt', ['model' => $model,'text'=>$text]);
	}
	/*
	public function actionEdit_qydt($id)
    {
		$model=News::findone($id);
        $this->performAjaxValidation($model);
		if(\Yii::$app->request->post()){
			if($model->load(\Yii::$app->request->post()) && $model->save(false)){
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '添加成功'));
				return $this->redirect(Url::to('qydt'));
			}
		}
		return $this->render('edit_qydt', ['model' => $model,]);
    }*/
    public function actionHyxw()
    {
		Url::remember('', 'actions-redirect');
        $query = News::find()->where(['type'=>'2','isdel' =>'0' ]);
		$provider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'pageSize' => 20,
			],
			'sort' => [
				'defaultOrder' => [
					'id' => SORT_ASC,
				]
			],
		]);
		//var_dump($provider);
		return $this->render('hyxw', ['dataProvider'=>$provider]);
	}
	public function actionAdd_hyxw()
    {
		$text=new News();
		$model = new UploadForm();
        $this->performAjaxValidation($model);
		if(\Yii::$app->request->post()){
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			if($model->upload()&&$text->load(\Yii::$app->request->post()) && $text->save(false)){
				$img_name=$model->imageFile->name;
				$img_up='uploads/'.date('Ymd',time()).'/'. $img_name;
				$PPP=Yii::$app->request->post();
				$img_size=getimagesize($img_up);
				$img_x=$PPP['x']*$img_size[0]/500;
				$img_y=$PPP['y']*$img_size[0]/500;
				$img_w=$PPP['w']*$img_size[0]/500;
				$img_h=$PPP['h']*$img_size[0]/500;
				$targ_w =388;
				$targ_h =259;
				$jpeg_quality = 85;
				//var_dump($model->imageFile->extension);exit;
				if($model->imageFile->extension=='png'){
					$img_r = imagecreatefrompng($img_up);
				}else{
					$img_r = imagecreatefromjpeg($img_up);
				}
				$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
				imagecopyresampled($dst_r,$img_r,0,0,$img_x,$img_y,
				$targ_w,$targ_h,$img_w,$img_h);
				imagejpeg($dst_r,"uploads/jcrop/".$img_name,$jpeg_quality);
				imagedestroy($dst_r);
				$img_jcrop="jcrop/".$img_name;
				//图片裁剪已完成
				//上传到数据库
				$upid=$text->attributes['id'];
				Yii::$app->db->createCommand()->update('news', ['img' => $img_jcrop],['id'=>$upid])->execute();
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '添加成功'));
				return $this->redirect(Url::to('hyxw'));
			}
		}
		return $this->render('add_hyxw', ['model' => $model,'text'=>$text]);
    }
    public function actionEdit_hyxw($id)
    {
		$text=News::findone($id);;
		$model = new UploadForm();
        $this->performAjaxValidation($model);
		if(\Yii::$app->request->post()){
			//var_dump($text->upload());exit;
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			if($model->upload()&&$text->load(\Yii::$app->request->post()) && $text->save(false)){
				$img_name=$model->imageFile->name;
				$img_up='uploads/'.date('Ymd',time()).'/'. $img_name;
				$PPP=Yii::$app->request->post();
				$img_size=getimagesize($img_up);
				$img_x=$PPP['x']*$img_size[0]/500;
				$img_y=$PPP['y']*$img_size[0]/500;
				$img_w=$PPP['w']*$img_size[0]/500;
				$img_h=$PPP['h']*$img_size[0]/500;
				$targ_w =388;
				$targ_h =259;
				$jpeg_quality = 85;
				//var_dump($model->imageFile->extension);exit;
				if($model->imageFile->extension=='png'){
					$img_r = imagecreatefrompng($img_up);
				}else{
					$img_r = imagecreatefromjpeg($img_up);
				}
				$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
				imagecopyresampled($dst_r,$img_r,0,0,$img_x,$img_y,
				$targ_w,$targ_h,$img_w,$img_h);
				imagejpeg($dst_r,"uploads/jcrop/".$img_name,$jpeg_quality);
				imagedestroy($dst_r);
				$img_jcrop="jcrop/".$img_name;
				//图片裁剪已完成
				//上传到数据库
				Yii::$app->db->createCommand()->update('news', ['img' => $img_jcrop ],['id'=>$id])->execute();
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '修改成功'));
				return $this->redirect(Url::to('hyxw'));
			}
		}
		return $this->render('edit_hyxw', ['model' => $model,'text'=>$text]);
	}
	public function actionEdit_cpfl($id)
    {
		$model=Cpfl::findone($id);;
        $this->performAjaxValidation($model);
		if(\Yii::$app->request->post()){
			if($model->load(\Yii::$app->request->post()) && $model->save(false)){
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '修改成功'));
				return $this->redirect(Url::to('cpfl'));
			}
		}
		return $this->render('edit_cpfl', ['model' => $model,]);
    }
    public function actionDelete_id($id)
    {
		Yii::$app->db->createCommand()->update('news', ['isdel' => 1], ['id' => $id ])->execute();
        return $this->redirect(Url::previous('actions-redirect'));
    }
	public function actionBlock($id,$action)
    {
		if($action=='stop'){
			Yii::$app->db->createCommand()->update('news', ['isrun' => -1], ['id' => $id ])->execute();
		}elseif($action=='run'){
			Yii::$app->db->createCommand()->update('news', ['isrun' => 0], ['id' => $id ])->execute();
		}
        return $this->redirect(Url::previous('actions-redirect'));
	}
	public function actionXwss_img()
    {
		Url::remember('', 'actions-redirect');
        $query = Xwssimg::find();
		$provider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'pageSize' => 20,
			],
			'sort' => [
				'defaultOrder' => [
					'id' => SORT_ASC,
				]
			],
		]);
		//var_dump($provider);
		return $this->render('xwss_img', ['dataProvider'=>$provider]);
	}
	
	public function actionEdit_img($id)
    {
		$text=Xwssimg::findone($id);
		$model = new UploadForm();
        $this->performAjaxValidation($model);
		//var_dump($text);exit;
		if(\Yii::$app->request->post()){
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			if($model->upload()){
				$img_name=$model->imageFile->name;
				$img_up='uploads/'.date('Ymd',time()).'/'. $img_name;
				$PPP=Yii::$app->request->post();
				$img_size=getimagesize($img_up);
				$img_x=$PPP['x']*$img_size[0]/500;
				$img_y=$PPP['y']*$img_size[0]/500;
				$img_w=$PPP['w']*$img_size[0]/500;
				$img_h=$PPP['h']*$img_size[0]/500;
				$targ_w =1920;
				$targ_h =954;
				$jpeg_quality = 85;
				//var_dump($model->imageFile->extension);exit;
				if($model->imageFile->extension=='png'){
					$img_r = imagecreatefrompng($img_up);
				}else{
					$img_r = imagecreatefromjpeg($img_up);
				}
				$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
				imagecopyresampled($dst_r,$img_r,0,0,$img_x,$img_y,
				$targ_w,$targ_h,$img_w,$img_h);
				imagejpeg($dst_r,"uploads/jcrop/".$img_name,$jpeg_quality);
				imagedestroy($dst_r);
				$img_jcrop="jcrop/".$img_name;
				//图片裁剪已完成
				//上传到数据库
				Yii::$app->db->createCommand()->update('xwss_img', ['img' => $img_jcrop],['id'=>$id])->execute();
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '修改成功'));
				return $this->redirect(Url::to('xwss_img'));
			}
		}
		return $this->render('edit_img', ['model' => $model,'text'=>$text]);
	}
    public function actions(){
		return [
			'ueditor'=>[
				'class' => 'yii\ueditor\UeditorAction',
				'config'=>[
					//上传图片配置
					'imageMaxSize'=>'10240000',
					'imageUrlPrefix' => "", /* 图片访问路径前缀 */
					'imagePathFormat' => "/uploads/{yyyy}{mm}{dd}/{time}{rand:10}", /* 上传保存路径,可以自定义保存路径和文件名格式 */
				]
			]
		];
	}
	
}