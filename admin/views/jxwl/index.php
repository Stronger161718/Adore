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
            'attribute' => '店铺名称',
            'value' => function ($model) {
                return $model->dpmc;
            },
        ],
        [
            'attribute' => '地区',
            'value' => function ($model) {
                $sq=Zsjm::getsq($model->sf)[$model->sq];
                if($sq=='市辖区' || $sq=='县'){
                    $sq='';
                }
                return Zsjm::getsf()[$model->sf].$sq.Zsjm::getxq($model->sq)[$model->xq];
            },
        ],
        [
            'attribute' => '详细地址',
            'value' => function ($model) {
                return $model->xxdz;
            },
        ],
        [
            'attribute' => '电话',
            'value' => function ($model) {
                return $model->tel;
            },
        ],
        [
            'header' => Yii::t('user', '状态'),
            'value' => function ($model) {
                if (!$model->isrun) {
                    return Html::a(Yii::t('user', 'Run'), ['block', 'id' => $model->id,'action'=>'stop'], [
                        'class' => 'btn btn-xs btn-success btn-block',
                        'data-method' => 'post',
                        'data-confirm' => Yii::t('user', 'Are you sure you want to stop?'),
                    ]);
                } else {
                    return Html::a(Yii::t('user', 'Stop'), ['block','id' => $model->id ,'action'=>'run' ], [
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
            'template' => '{edit_index}{delete_id}'
        ],

		
	],
]);
?>
</div>
<div class="col-md-6 col-md-offset-2">
<?php //return Html::a(Yii::t('user', 'Run'), ['block']);?>
    <a href="<?=url::to(['add_index']);?>">
		<button class="btn btn-success btn-block">添加新店铺</button>
	</a>
</div>
</div>
