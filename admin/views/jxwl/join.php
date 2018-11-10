<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Zsjm;


$this->title = '后台管理';
?>
<div class="site-index">

	<div class="col-md-12 col-md-offset-0">
<?php
echo yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
	'columns' => [
        [
            'attribute' => '姓名',
            'value' => function ($model) {
                return $model->name;
            },
        ],
        [
            'attribute' => '手机',
            'value' => function ($model) {
                return $model->phone;
            },
        ],
        [
            'attribute' => '地区',
            'value' => function ($model) {
                return $model->sf.$model->sq.$model->xq;
            },
        ],
        [
            'attribute' => '店铺规模',
            'value' => function ($model) {
                if($model->dplx==0){return  '旗舰店';}elseif($model->dplx==1){return  '标准店';}else{return  '基础店';};
            },
        ],
		[
            'attribute' => '操作',
            'format' => 'html',
            'value' => function ($model) {
                // /index.php?r=site/index&src=ref1
                return Html::a('查看', ['see_join', 'id' => $model->id], ['class' => 'profile-link']);
            },
        ],

		
	],
]);
?>
</div>
<div class="col-md-6 col-md-offset-2">
<?php //return Html::a(Yii::t('user', 'Run'), ['block']);?>
</div>
</div>
