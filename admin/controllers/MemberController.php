<?php

namespace app\controllers;

use yii\web\Controller;
use yii\db\Query;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use Yii;
use dektrium\user\models\RegistrationForm;
use dektrium\user\models\User;
use dektrium\user\traits\AjaxValidationTrait;
use yii\filters\AccessControl;
use dektrium\user\Finder;
use yii\widgets\ActiveForm;
use yii\web\NotFoundHttpException;


class MemberController extends Controller
{	
	use AjaxValidationTrait;
	
	protected $finder;
	
	public function __construct($id, $module, Finder $finder, $config = [])
    {
        $this->finder = $finder;
        parent::__construct($id, $module, $config);
    }
	
	
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    ['allow' => true, 'actions' => ['index', 'add', 'block', 'update', 'delete'], 'roles' => ['@']],
                ],
            ],
            /* 'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ], */
        ];
    }
	
    public function actionIndex()
    {
		Url::remember('', 'actions-redirect');
		$query = User::find()->where('status>=0');
		$count = $query->count();
		$pagination = new Pagination(['totalCount' => $count]);
		$articles = $query->offset($pagination->offset)
			->limit($pagination->limit)
			->all();
		$query = User::find()->where('status>=0');
		$provider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'pageSize' => 10,
			],
			'sort' => [
				'defaultOrder' => [
					'id' => SORT_ASC,
				]
			],
		]);
		//$dataProvider=
        return $this->render('index',['dataProvider'=>$provider]);
    }
	/* public function beforeAction($action) {
		var_dump(111);
		return true;
	} */
	public function actionBlock($id)
    {
        if ($id == Yii::$app->user->getId()) {
            Yii::$app->getSession()->setFlash('danger', Yii::t('user', 'You can not Stop your own account'));
        } else {
			$user=User::findById($id);
			if($user->getStatus()==0){
				Yii::$app->db->createCommand()->update('user', ['status' => 1], ['id' => $id ])->execute();
			}elseif($user->getStatus()==1){
				Yii::$app->db->createCommand()->update('user', ['status' => 0], ['id' => $id ])->execute();
			}
        }

        return $this->redirect(Url::previous('actions-redirect'));
    }
	public function actionDelete($id)
    {
        if ($id == Yii::$app->user->getId()) {
            Yii::$app->getSession()->setFlash('danger', Yii::t('user', 'You can not delete your own account'));
        } else {
			$user=User::findById($id);
			Yii::$app->db->createCommand()->update('user', ['status' => -1], ['id' => $id ])->execute();
        }
        return $this->redirect(Url::previous('actions-redirect'));
    }
	public function actionAdd()
    {
        $model = \Yii::createObject(RegistrationForm::className());

        $this->performAjaxValidation($model);
		
		if(\Yii::$app->request->post()){
			if ($model->load(\Yii::$app->request->post()) && $model->register()) {
				Yii::$app->getSession()->setFlash('success', Yii::t('user', '注册成功'));
				return $this->redirect(Url::to('index'));
				//return url:to('index');
			}else{
				Yii::$app->getSession()->setFlash('danger', Yii::t('user', '注册失败'));
			}
		}
        return $this->render('register', [
            'model'  => $model,
            'module' => $this->module,
        ]);
    }
	public function actionUpdate($id)
    {
        Url::remember('', 'actions-redirect');
        $user = $this->findModel($id);
		//$user=User::findById($id);
        $user->scenario = 'register';
		$this->performAjaxValidation($user);
        if ($user->load(\Yii::$app->request->post()) && $user->save()) {
            \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'Account details have been updated'));

            return $this->refresh();
        }
        return $this->render('_user', ['user' => $user]);
    }
	protected function findModel($id)
    {
        $user = $this->finder->findUserById($id);
        if ($user === null) {
            throw new NotFoundHttpException('The requested page does not exist');
        }

        return $user;
    }
	
}
