<?php

namespace app\controllers;

use yii\web\Controller;
use yii\helpers\Url;
use Yii;


class TrashController extends Controller
{	
    public function actionIndex()
    {
		Url::remember('', 'actions-redirect');
		return $this->render('index');
	}
	public function actionTrash()
    {
		Url::remember('', 'actions-redirect');
		$dir='../..'.Url::base().'/uploads/';
		$del_success=0;
		$del_error=0;
		//$name=$dir.'20181020/1540007757.jpg';
		
		if (is_dir($dir)){
			if ($dh = opendir($dir)){
				while (($file = readdir($dh)) !== false){ 
					if($file != "." && $file != ".."){
						$child=$dir.$file.'/';
						if (is_dir($child)){
							if ($dh_child = opendir($child)){
								while (($file_child = readdir($dh_child)) !== false){ 
									if($file_child != "." && $file_child != ".."){
										//echo $file_child;
										$file_child_son=$file.'/'.$file_child;
										$sql_content="select * from content where img like '%".$file_child_son."%' or content like '%".$file_child_son."%'";
										$is_content=Yii::$app->db->createCommand($sql_content)->queryScalar();
										if(!$is_content){
											$sql_cpps="select * from cpps where img like '%".$file_child_son."%' ";
											$is_cpps=Yii::$app->db->createCommand($sql_cpps)->queryScalar();
											if(!$is_cpps){
												$sql_cpzx="select * from cpzx where img like '%".$file_child_son."%' or cpmsimg like '%".$file_child_son."%' or cpms like '%".$file_child_son."%' ";
												$is_cpzx=Yii::$app->db->createCommand($sql_cpzx)->queryScalar();
												if(!$is_cpzx){
													$sql_news="select * from news where img like '%".$file_child_son."%' or content like '%".$file_child_son."%' ";
													$is_news=Yii::$app->db->createCommand($sql_news)->queryScalar();
													if(!$is_news){
														$sql_xwss_img="select * from xwss_img where img like '%".$file_child_son."%' ";
														$is_xwss_img=Yii::$app->db->createCommand($sql_xwss_img)->queryScalar();
														if(!$is_xwss_img){
															//echo($file_child_son);
															//$del_success++;
															if (!unlink($dir.$file_child_son)){
																$del_error++;
															}else{
																$del_success++;
															}
														}
														
													}
												}
											}
										}
									} 
								}
							}
							closedir($dh_child);
							//Yii::$app->getSession()->setFlash('success', Yii::t('user', '清理成功'));
						}
					} 
				}
			}
			closedir($dh);
			Yii::$app->getSession()->setFlash('success', Yii::t('user', $del_success.'个文件清理成功'));
			if($del_error){
				Yii::$app->getSession()->setFlash('error', Yii::t('user', $del_error.'个文件清理失败'));
			}
			return $this->redirect(Url::to('index'));
		}
		return $this->render('index');
	}
}