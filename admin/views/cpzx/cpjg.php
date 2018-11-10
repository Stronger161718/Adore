<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Cpfl;

$this->title = '后台管理';
?>
<div class="site-index">

	<div class="col-md-12 col-md-offset-0">
<?php
echo yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
	'columns' => [
        [
            'attribute' => '尺寸',
            'value' => function ($model) {
                return $model->cpcc;
            },
        ],
        [
            'attribute' => '价格',
            'value' => function ($model) {
                return '￥'.$model->cpjg;
            },
        ],
        [
            'header' => Yii::t('user', '状态'),
            'value' => function ($model) {
                if (!$model->isrun) {
                    return Html::a(Yii::t('user', 'Run'), ['block_xx', 'id' => $model->id,'action'=>'stop'], [
                        'class' => 'btn btn-xs btn-success btn-block',
                        'data-method' => 'post',
                        'data-confirm' => Yii::t('user', 'Are you sure you want to stop?'),
                    ]);
                } else {
                    return Html::a(Yii::t('user', 'Stop'), ['block_xx','id' => $model->id ,'action'=>'run' ], [
                        'class' => 'btn btn-xs btn-danger btn-block',
                        'data-method' => 'post',
                        'data-confirm' => Yii::t('user', 'Are you sure you want to run?'),
                    ]);
                }
            },
            'format' => 'raw',
        ],
		[
            'header' => Yii::t('user', '操作'),
            'class' => 'yii\grid\ActionColumn',
            'template' => '{edit_xx}{delete_id_xx}'
        ],

		
	],
]);
?>
</div>
<div class="col-md-6 col-md-offset-2">
<?php //return Html::a(Yii::t('user', 'Run'), ['block']);?>
    <a href="<?=url::to(['add_ccjg','id'=>$id]);?>">
		<button class="btn btn-success btn-block">添加新尺寸价格</button>
	</a>
</div>
</div>