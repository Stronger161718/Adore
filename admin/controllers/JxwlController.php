<?php

namespace app\controllers;

use yii\web\Controller;
use yii\db\Query;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use Yii;

use yii\web\UploadedFile;
use app\models\Zsjm;
use app\models\Join;
use app\models\UploadForm;
use dektrium\user\traits\AjaxValidationTrait;

class JxwlController extends Controller
{	
	use AjaxValidationTrait;
    public function actionIndex()
    {
		Url::remember('', 'actions-redirect');
        $query = Zsjm::find()->where(['isdel' =>'0' ]);
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
		return $this->render('index', ['dataProvider'=>$provider]);
	}
	public function actionJoin()
    {
		Url::remember('', 'actions-redirect');
        $query = Join::find();
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
		//var_dump($provider);
		return $this->render('join', ['dataProvider'=>$provider]);
	}
	public function actionSee_join($id)
    {
		Url::remember('', 'actions-redirect');
        $model = Join::findone($id);
		//var_dump($provider);
		Yii::$app->db->createCommand()->update('join', ['isread' =>'1'], ['id' => $id ])->execute();
		return $this->render('see_join', ['model'=>$model]);
    }
	public function actionAdd_index()
    {
        $sf=Zsjm::getsf();
        $sq=Zsjm::getallsq();
        $xq=Zsjm::getallxq();
        //array_unshift($sf,'请选择');
        //var_dump($sf);
		$model=new Zsjm();
        $this->performAjaxValidation($model);
		if(\Yii::$app->request->post()){
			if($model->load(\Yii::$app->request->post()) && $model->save(false)){
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '添加成功'));
				return $this->redirect(Url::to('index'));
			}
		}
		return $this->render('add_index', ['model' => $model,'sf'=>$sf,'sq'=>$sq,'xq'=>$xq]);
    }
    public function actionSite($typeid,$pid)
    {
        //$typeid 0返回市区;1返回县区;
        if($typeid==0){
            $sq=Zsjm::getsq($pid);
            $data='<option value="">--请选择市区--</option>';
            foreach($sq as $key=>$value){
                $data=$data.'<option value="'.$key.'">'.$value.'</option>';
            }
            echo $data;
            
            
        }elseif($typeid==1){
            $xq=Zsjm::getxq($pid);
            $data='<option value="">--请选择县区--</option>';
            foreach($xq as $key=>$value){
                $data=$data.'<option value="'.$key.'">'.$value.'</option>';
            }
            echo $data; 
        }
    }
    public function actionEdit_index($id)
    {
        $model=Zsjm::findone($id);
        $sf=Zsjm::getsf();
        $sq=Zsjm::getsq($model->sf);
        $xq=Zsjm::getxq($model->sq);
        $this->performAjaxValidation($model);
		if(\Yii::$app->request->post()){
			if($model->load(\Yii::$app->request->post()) && $model->save(false)){
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '添加成功'));
				return $this->redirect(Url::to('index'));
			}
		}
		return $this->render('edit_index', ['model' => $model,'sf'=>$sf,'sq'=>$sq,'xq'=>$xq]);
    }
    public function actionDelete_id($id)
    {
		Yii::$app->db->createCommand()->update('zsjm', ['isdel' => 1], ['id' => $id ])->execute();
        return $this->redirect(Url::previous('actions-redirect'));
    }
	public function actionBlock($id,$action)
    {
		if($action=='stop'){
			Yii::$app->db->createCommand()->update('zsjm', ['isrun' => -1], ['id' => $id ])->execute();
		}elseif($action=='run'){
			Yii::$app->db->createCommand()->update('zsjm', ['isrun' => 0], ['id' => $id ])->execute();
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