<?php

namespace app\controllers;

use yii\web\Controller;
use yii\db\Query;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use Yii;

use yii\web\UploadedFile;
use app\models\Cpfl;
use app\models\Cpzx;
use app\models\Cpps;
use app\models\Cpxx;
use app\models\UploadForm;
use app\models\UploadsForm;
use app\models\UploadaForm;
use dektrium\user\traits\AjaxValidationTrait;
use yii\data\SqlDataProvider;

class QxzbController extends Controller
{	
	use AjaxValidationTrait;
    public function actionCpfl()
    {
		Url::remember('', 'actions-redirect');
		$model = new Cpfl();
        $query = Cpfl::find()->where(['isdel' =>'0','type'=>'2' ]);
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
		return $this->render('cpfl', ['dataProvider'=>$provider]);
	}
	public function actionAdd_cpfl()
    {
		$text=new Cpfl();
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
				$targ_h =824;
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
				Yii::$app->db->createCommand()->update('cpfl', ['img' => $img_jcrop ],['id'=>$upid])->execute();
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '添加成功'));
				return $this->redirect(Url::to('cpfl'));
			}
		}
		return $this->render('edit_cpfl', ['model' => $model,'text'=>$text]);
	}
	public function actionEdit_cpfl($id)
    {
		$text=Cpfl::findone($id);;
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
				$targ_h =824;
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
				Yii::$app->db->createCommand()->update('cpfl', ['img' => $img_jcrop ],['id'=>$upid])->execute();
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '修改成功'));
				return $this->redirect(Url::to('cpfl'));
			}
		}
		return $this->render('edit_cpfl', ['model' => $model,'text'=>$text]);
	}
	public function actionIndex()
    {
		Url::remember('', 'actions-redirect');
		$sql="select cpzx.* from cpfl,cpzx where cpzx.isdel='0' and cpfl.isdel='0' and cpfl.isrun='0' and cpfl.isdel='0' and cpfl.type='2' and cpzx.cpfl=cpfl.id;";
		$count = Yii::$app->db->createCommand("select count(*) from cpfl,cpzx where cpzx.isdel='0' and cpfl.isdel='0' and cpfl.isrun='0' and cpfl.isdel='0' and cpfl.type='2' and cpzx.cpfl=cpfl.id;")->queryScalar();
		$provider = new SqlDataProvider([
			'sql' => $sql,
			'totalCount' => $count,
			'pagination' => [
				'pageSize' => 20,
			],
			
		]);
		//var_dump($provider);
		return $this->render('index', ['dataProvider'=>$provider]);
	}
	public function actionAdd_index()
    {
		$cpfl=Cpfl::getCpfl(2);
		$text=new cpzx();
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
				$targ_h =1280;
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
				Yii::$app->db->createCommand()->update('cpzx', ['img' => $img_jcrop ],['id'=>$upid])->execute();
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '添加成功'));
				return $this->redirect(Url::to('index'));
			}
		}
		return $this->render('add_index', ['model' => $model,'text'=>$text,'cpfl'=>$cpfl]);
	}
	public function actionEdit_cpzx($id)
    {
		$cpfl=Cpfl::getCpfl(2);
		$text=cpzx::findone($id);
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
				$targ_h =1280;
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
				Yii::$app->db->createCommand()->update('cpzx', ['img' => $img_jcrop ],['id'=>$id])->execute();
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '修改成功'));
				return $this->redirect(Url::to('index'));
			}
		}
		return $this->render('edit_cpzx', ['model' => $model,'text'=>$text,'cpfl'=>$cpfl]);
	}
	public function actionCpms($id){
		$model = new UploadsForm();
		$text = new UploadaForm();
		$this->performAjaxValidation($model);
		//$this->performAjaxValidation($text);
        if (Yii::$app->request->isPost) {
			$text->imageFile = UploadedFile::getInstances($text, 'imageFile');
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
			
			if($text->imageFile){
				$text->imageFile=$text->imageFile[0];
				if($text->upload()){
					$img=date('Ymd',time()).'/'. $text->imageFile->name;
				}else{
					$img=null;
				}
			}else{
				$img=null;
			}
			
			
            if ($model->upload()) {
                // 文件上传成功
				//$img='uploads/'.date('Ymd',time()).'/'. $text->imageFile->name;
				$row=[];
				foreach($model->imageFiles as $rows){
					//var_dump($rows->);
					$row[]=date('Ymd',time()).'/'.$rows->name;
				}
				var_dump($row);
				$imgs=serialize($row);
				Yii::$app->db->createCommand()->update('cpzx', ['cpmsimg' => $img, 'cpms' => $imgs],['id'=>$id])->execute();
				
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '修改成功'));
				return $this->redirect(Url::to('index'));
            } 
        }

		return $this->render('edit_cpms', ['model' => $model,'text'=>$text]);
	}
	public function actionPs($id)
    {
		Url::remember('', 'actions-redirect');
        $query = Cpps::find()->where(['mid'=>$id,'isdel' =>'0' ]);
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
		return $this->render('ps', ['dataProvider'=>$provider,'id'=>$id]);
	}
	public function actionAdd_ps($id)
    {
		$text=new Cpps();
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
				$targ_h =1280;
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
				Yii::$app->db->createCommand()->update('cpps', ['img' => $img_jcrop ],['id'=>$upid])->execute();
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '添加成功'));
				return $this->redirect(Url::to(['ps','id'=>$id]));
			}
		}
		return $this->render('add_ps', ['model' => $model,'text'=>$text,'id'=>$id]);
	}
	public function actionEdit_ps($id)
    {
		$text=Cpps::findone($id);
		$model = new UploadForm();
        $this->performAjaxValidation($model);
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
				$targ_h =1280;
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
				Yii::$app->db->createCommand()->update('cpps', ['img' => $img_jcrop ],['id'=>$id])->execute();
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '添加成功'));
				return $this->redirect(Url::to(['ps','id'=>$text->mid]));
			}
		}
		return $this->render('edit_ps', ['model' => $model,'text'=>$text]);
	}
	public function actionDelete_id_ps($id)
    {
		Yii::$app->db->createCommand()->update('cpps', ['isdel' => 1], ['id' => $id ])->execute();
        return $this->redirect(Url::previous('actions-redirect'));
    }
	public function actionBlock_ps($id,$action)
    {
		$user=Cpfl::findone($id);
		if($action=='stop'){
			Yii::$app->db->createCommand()->update('cpps', ['isrun' => -1], ['id' => $id ])->execute();
		}elseif($action=='run'){
			Yii::$app->db->createCommand()->update('cpps', ['isrun' => 0], ['id' => $id ])->execute();
		}
        return $this->redirect(Url::previous('actions-redirect'));
	}
	public function actionCcjg($id)
    {
		Url::remember('', 'actions-redirect');
        $query = Cpxx::find()->where(['mid'=>$id,'isdel' =>'0' ]);
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
		return $this->render('cpjg', ['dataProvider'=>$provider,'id'=>$id]);
	}
	public function actionAdd_ccjg($id)
    {
		$model=new Cpxx();
        $this->performAjaxValidation($model);
		if(\Yii::$app->request->post()){
			if($model->load(\Yii::$app->request->post()) && $model->save(false)){
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '添加成功'));
				return $this->redirect(Url::to(['ccjg','id'=>$id]));
			}
		}
		return $this->render('add_ccjg', ['model' => $model,'id'=>$id]);
	}
	public function actionEdit_xx($id)
    {
		$model=Cpxx::findone($id);
        $this->performAjaxValidation($model);
		if(\Yii::$app->request->post()){
			if($model->load(\Yii::$app->request->post()) && $model->save(false)){
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '添加成功'));
				return $this->redirect(Url::to(['ccjg','id'=>$model->mid]));
			}
		}
		return $this->render('add_ccjg', ['model' => $model,'id'=>$model->mid]);
	}
	public function actionDelete_id_xx($id)
    {
		Yii::$app->db->createCommand()->update('cpxx', ['isdel' => 1], ['id' => $id ])->execute();
        return $this->redirect(Url::previous('actions-redirect'));
    }
	public function actionBlock_xx($id,$action)
    {
		$user=Cpfl::findone($id);
		if($action=='stop'){
			Yii::$app->db->createCommand()->update('cpxx', ['isrun' => -1], ['id' => $id ])->execute();
		}elseif($action=='run'){
			Yii::$app->db->createCommand()->update('cpxx', ['isrun' => 0], ['id' => $id ])->execute();
		}
        return $this->redirect(Url::previous('actions-redirect'));
	}
	//
	public function actionEdit_ljwm($id)
    {
		$text=Content::findone($id);
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
		$banner=Cpfl::findOne($id);
		return $this->render('edit_ljwm', ['model' => $model,'text'=>$text,'banner'=>$banner]);
	}

	public function actionDelete_id($id)
    {
		Yii::$app->db->createCommand()->update('cpfl', ['isdel' => 1], ['id' => $id ])->execute();
        return $this->redirect(Url::previous('actions-redirect'));
    }
	public function actionBlock($id,$action)
    {
		if($action=='stop'){
			Yii::$app->db->createCommand()->update('cpfl', ['isrun' => -1], ['id' => $id ])->execute();
		}elseif($action=='run'){
			Yii::$app->db->createCommand()->update('cpfl', ['isrun' => 0], ['id' => $id ])->execute();
		}
        return $this->redirect(Url::previous('actions-redirect'));
	}
	public function actionDelete_id_cpzx($id)
    {
		Yii::$app->db->createCommand()->update('cpzx', ['isdel' => 1], ['id' => $id ])->execute();
        return $this->redirect(Url::previous('actions-redirect'));
    }
	public function actionBlock_cpzx($id,$action)
    {
		if($action=='stop'){
			Yii::$app->db->createCommand()->update('cpzx', ['isrun' => -1], ['id' => $id ])->execute();
		}elseif($action=='run'){
			Yii::$app->db->createCommand()->update('cpzx', ['isrun' => 0], ['id' => $id ])->execute();
		}
        return $this->redirect(Url::previous('actions-redirect'));
	}
	public function actions(){
		return [
			'ueditor'=>[
				'class' => 'yii\ueditor\UeditorAction',
				'config'=>[
					//上传图片配置
					 
					'file_upload_limit'=>'10',
					'imageMaxSize'=>'10240000',
					'imageUrlPrefix' => "", /* 图片访问路径前缀 */
					'imagePathFormat' => "/uploads/{yyyy}{mm}{dd}/{time}{rand:10}", /* 上传保存路径,可以自定义保存路径和文件名格式 */
				]
			]
		];
	}
	
}