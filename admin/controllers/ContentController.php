<?php

namespace app\controllers;

use yii\web\Controller;
use yii\db\Query;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use Yii;

use yii\web\UploadedFile;
use app\models\Content;
use app\models\UploadForm;
use dektrium\user\traits\AjaxValidationTrait;

class ContentController extends Controller
{	
	use AjaxValidationTrait;
	
	public function actionLogo()
    {
		$model = new UploadForm();
        $this->performAjaxValidation($model);
		if(\Yii::$app->request->post()){
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			$model->upload();
			$img_name=$model->imageFile->name;
			$img_up='uploads/'.date('Ymd',time()).'/'. $img_name;
			$PPP=Yii::$app->request->post();
			$img_size=getimagesize($img_up);
			$img_x=$PPP['x']*$img_size[0]/500;
			$img_y=$PPP['y']*$img_size[0]/500;
			$img_w=$PPP['w']*$img_size[0]/500;
			$img_h=$PPP['h']*$img_size[0]/500;
			$targ_w =500;
			$targ_h =80;
			$jpeg_quality = 80;
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
			Yii::$app->db->createCommand()->update('content', ['img' => $img_jcrop],['menu'=>'logo'])->execute();
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '添加成功'));
				return $this->redirect(Url::to('logo'));
		}
		$logo=Content::findBySql("SELECT * FROM content where menu='logo' and isrun='0' and isDel='0' order by id desc")->one();
        return $this->render('logo', ['model' => $model,'logo'=> $logo]);
	}
	public function actionBanner()
    {
		Url::remember('', 'actions-redirect');
		$model = new Content();
        $query = Content::find()->where([ 'menu' => 'banner' ,'isDel' => '0' ]);
		$provider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'pageSize' => 20,
			],
			'sort' => [
				'defaultOrder' => [
					'id' => SORT_DESC,
				]
			],
		]);
		return $this->render('banner', ['dataProvider'=>$provider]);
	}
	public function actionAdd_banner()
    {
		$text= new Content();
		$model = new UploadForm();
        $this->performAjaxValidation($model);
		if(\Yii::$app->request->post() && $text->load(\Yii::$app->request->post())){
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			$model->upload();
			$img_name=$model->imageFile->name;
			$img_up='uploads/'.date('Ymd',time()).'/'. $img_name;
			$PPP=Yii::$app->request->post();
			$img_size=getimagesize($img_up);
			$img_x=$PPP['x']*$img_size[0]/500;
			$img_y=$PPP['y']*$img_size[0]/500;
			$img_w=$PPP['w']*$img_size[0]/500;
			$img_h=$PPP['h']*$img_size[0]/500;
			$targ_w =1920;
			$targ_h =1048;
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
			//var_dump($text->link);exit;
			Yii::$app->db->createCommand()->insert('content', ['img' => $img_jcrop,'link'=>$text->link,'menu'=>'banner','addtime'=>time() ])->execute();
			Yii::$app->getSession()->setFlash('success', Yii::t('user', '添加成功'));
			return $this->redirect(Url::to('banner'));
		}
		return $this->render('add_banner', ['model' => $model,'text' => $text]);
	}
	public function actionEdit_banner($id)
    {
		$text=Content::findone($id);
		$model = new UploadForm();
        $this->performAjaxValidation($model);
		if(\Yii::$app->request->post() && $text->load(\Yii::$app->request->post())){
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			$model->upload();
			$img_name=$model->imageFile->name;
			$img_up='uploads/'.date('Ymd',time()).'/'. $img_name;
			$PPP=Yii::$app->request->post();
			$img_size=getimagesize($img_up);
			$img_x=$PPP['x']*$img_size[0]/500;
			$img_y=$PPP['y']*$img_size[0]/500;
			$img_w=$PPP['w']*$img_size[0]/500;
			$img_h=$PPP['h']*$img_size[0]/500;
			$targ_w =1920;
			$targ_h =1048;
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
			Yii::$app->db->createCommand()->update('content', ['img' => $img_jcrop,'link'=> $text->link,'addtime'=>time() ],['id'=>$id])->execute();
			Yii::$app->getSession()->setFlash('success', Yii::t('user', '添加成功'));
			return $this->redirect(Url::to('banner'));
		}
		$banner=Content::findOne($id);
		return $this->render('edit_banner', ['model' => $model,'banner'=>$banner,'text'=> $text]);
	}

	public function actionDt()
    {
		Url::remember('', 'actions-redirect');
		$model = new Content();
        $query = Content::find()->where([ 'menu' => 'zxdt' ,'isDel' => '0' ]);
		$provider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'pageSize' => 20,
			],
			'sort' => [
				'defaultOrder' => [
					'id' => SORT_DESC,
				]
			],
		]);
		return $this->render('zxdt', ['dataProvider'=>$provider]);
	}
	public function actionAdd_dt()
    {
		$text= new Content();
		$model = new UploadForm();
        $this->performAjaxValidation($model);
		if(\Yii::$app->request->post()){
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			if($model->upload() && $text->load(\Yii::$app->request->post())){
				$img_name=$model->imageFile->name;
				$img_up='uploads/'.date('Ymd',time()).'/'. $img_name;
				$PPP=Yii::$app->request->post();
				$img_size=getimagesize($img_up);
				$img_x=$PPP['x']*$img_size[0]/500;
				$img_y=$PPP['y']*$img_size[0]/500;
				$img_w=$PPP['w']*$img_size[0]/500;
				$img_h=$PPP['h']*$img_size[0]/500;
				$targ_w =1920;
				$targ_h =1348;
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
				Yii::$app->db->createCommand()->insert('content', ['img' => $img_jcrop,'link' => $text->link,'menu'=>'zxdt','addtime'=>time() ])->execute();
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '添加成功'));
				return $this->redirect(Url::to('dt'));
			}
		}
		return $this->render('add_dt', ['model' => $model,'text'=>$text]);
	}
	public function actionEdit_dt($id)
    {
		$text=Content::findone($id);
		$model = new UploadForm();
        $this->performAjaxValidation($model);
		if(\Yii::$app->request->post()){
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			if($model->upload() && $text->load(\Yii::$app->request->post())){
				$img_name=$model->imageFile->name;
				$img_up='uploads/'.date('Ymd',time()).'/'. $img_name;
				$PPP=Yii::$app->request->post();
				$img_size=getimagesize($img_up);
				$img_x=$PPP['x']*$img_size[0]/500;
				$img_y=$PPP['y']*$img_size[0]/500;
				$img_w=$PPP['w']*$img_size[0]/500;
				$img_h=$PPP['h']*$img_size[0]/500;
				$targ_w =1920;
				$targ_h =1348;
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
				Yii::$app->db->createCommand()->update('content', ['img' => $img_jcrop,'link' => $text->link,'addtime'=>time() ],['id'=>$id])->execute();
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '添加成功'));
				return $this->redirect(Url::to('dt'));
			}
		}
		$banner=Content::findOne($id);
		return $this->render('edit_dt', ['model' => $model,'banner'=>$banner,'text'=>$text]);
	}
	public function actionCpzx()
    {
		Url::remember('', 'actions-redirect');
		$model = new Content();
        $query = Content::find()->where([ 'menu' => 'cpzx' ,'isDel' => '0' ]);
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
		return $this->render('cpzx', ['dataProvider'=>$provider]);
	}
	public function actionEdit_cpzx($id)
    {
		$text=Content::findone($id);;
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
				$targ_w =2624;
				$targ_h =2624;
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
				Yii::$app->db->createCommand()->update('content', ['img' => $img_jcrop,'addtime'=>time() ],['id'=>$id])->execute();
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '修改成功'));
				return $this->redirect(Url::to('cpzx'));
			}
		}
		$banner=Content::findOne($id);
		return $this->render('edit_cpzx', ['model' => $model,'text'=>$text,'banner'=>$banner]);
	}
	public function actionFoot()
    {
		Url::remember('', 'actions-redirect');
		$model = new Content();
        $query = Content::find()->where([ 'menu' => 'foot' ,'isDel' => '0' ]);
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
		return $this->render('foot', ['dataProvider'=>$provider]);
	}
	public function actionEdit_foot($id)
    {
		$text=Content::findone($id);;
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
				$targ_w =500;
				$targ_h =500;
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
				Yii::$app->db->createCommand()->update('content', ['img' => $img_jcrop,'addtime'=>time() ],['id'=>$id])->execute();
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '修改成功'));
				return $this->redirect(Url::to('foot'));
			}
		}
		$banner=Content::findOne($id);
		return $this->render('edit_foot', ['model' => $model,'text'=>$text,'banner'=>$banner]);
	}
	public function actionLjwmsp()
    {
		Url::remember('', 'actions-redirect');
		$model = new Content();
        $query = Content::find()->where([ 'menu' => 'ljwmsp' ,'isDel' => '0' ]);
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
		return $this->render('ljwmsp', ['dataProvider'=>$provider]);
	}
	public function actionEdit_ljwmsp($id)
    {
		$text=Content::findone($id);;
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
				$targ_w =1920;
				$targ_h =1278;
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
				Yii::$app->db->createCommand()->update('content', ['img' => $img_jcrop,'addtime'=>time() ],['id'=>$id])->execute();
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '修改成功'));
				return $this->redirect(Url::to('ljwmsp'));
			}
		}
		$banner=Content::findOne($id);
		return $this->render('edit_ljwmsp', ['model' => $model,'text'=>$text,'banner'=>$banner]);
	}
	public function actionPpgs()
    {
		Url::remember('', 'actions-redirect');
		$model = new Content();
        $query = Content::find()->where([ 'menu' => 'ppgs' ,'isDel' => '0' ]);
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
		return $this->render('ppgs', ['dataProvider'=>$provider]);
	}
	public function actionEdit_ppgs($id)
    {
		$model=Content::findone($id);;
        $this->performAjaxValidation($model);
		if(\Yii::$app->request->post()){
			if($model->load(\Yii::$app->request->post()) && $model->save(false)){
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '修改成功'));
				return $this->redirect(Url::to('ppgs'));
			}
		}
		return $this->render('edit_ppgs', ['model' => $model,]);
	}
	public function actionLjwm()
    {
		Url::remember('', 'actions-redirect');
		$model = new Content();
        $query = Content::find()->where([ 'menu' => 'ljwm' ,'isDel' => '0' ]);
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
		return $this->render('ljwm', ['dataProvider'=>$provider]);
	}
	public function actionEdit_ljwm($id)
    {
		$text=Content::findone($id);;
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
				$targ_w =3071;
				$targ_h =2048;
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
				Yii::$app->db->createCommand()->update('content', ['img' => $img_jcrop,'addtime'=>time() ],['id'=>$id])->execute();
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '修改成功'));
				return $this->redirect(Url::to('ljwm'));
			}
		}
		$banner=Content::findOne($id);
		return $this->render('edit_ljwm', ['model' => $model,'text'=>$text,'banner'=>$banner]);
	}

	public function actionDelete_id($id)
    {
		Yii::$app->db->createCommand()->update('content', ['isdel' => 1], ['id' => $id ])->execute();
        return $this->redirect(Url::previous('actions-redirect'));
    }
	public function actionBlock($id,$action)
    {
		$user=Content::findone($id);
		if($action=='stop'){
			Yii::$app->db->createCommand()->update('content', ['isrun' => -1], ['id' => $id ])->execute();
		}elseif($action=='run'){
			Yii::$app->db->createCommand()->update('content', ['isrun' => 0], ['id' => $id ])->execute();
		}
        return $this->redirect(Url::previous('actions-redirect'));
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