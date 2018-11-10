<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '后台管理';
?>
<div class="site-index">

	<div class="col-md-12 col-md-offset-0">
<?php
echo yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
	'columns' => [
		[
            'attribute' => '图片',
			'format' => ['image', ['width'=>'200']],
            'value' => function ($model) {
                return '@web/uploads/'.$model->img;
            },
        ],
        [
            'attribute' => '品牌定位',
            'value' => function ($model) {
                return $model->text;
            },
        ],
        [
            'attribute' => '品牌愿景',
            'value' => function ($model) {
                return $model->content;
            },
        ],
		[
            'header' => Yii::t('user', '操作'),
            'class' => 'yii\grid\ActionColumn',
            'template' => '{edit_ljwm}'
        ],		
		
	],
]);
?>
</div>
<div class="col-md-6 col-md-offset-2">
<?php //return Html::a(Yii::t('user', 'Run'), ['block']);?>
</div>
</div>
