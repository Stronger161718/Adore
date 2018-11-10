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
            'attribute' => '产品名称',
            'value' => function ($model) {
                return $model['cpmc'];
            },
        ],
        [
            'attribute' => '产品分类',
            'value' => function ($model) {
                return Cpfl::getCpfl()[$model['cpfl']];
            },
        ],
        [
            'attribute' => '产品图片',
			'format' => ['image', ['width'=>'200']],
            'value' => function ($model) {
                return '@web/uploads/'.$model['img'];
            },
        ],
        [
            'header' => Yii::t('user', '状态'),
            'value' => function ($model) {
                if (!$model['isrun']) {
                    return Html::a(Yii::t('user', 'Run'), ['block_cpzx', 'id' => $model['id'],'action'=>'stop'], [
                        'class' => 'btn btn-xs btn-success btn-block',
                        'data-method' => 'post',
                        'data-confirm' => Yii::t('user', 'Are you sure you want to stop?'),
                    ]);
                } else {
                    return Html::a(Yii::t('user', 'Stop'), ['block_cpzx','id' => $model['id'] ,'action'=>'run' ], [
                        'class' => 'btn btn-xs btn-danger btn-block',
                        'data-method' => 'post',
                        'data-confirm' => Yii::t('user', 'Are you sure you want to run?'),
                    ]);
                }
            },
            'format' => 'raw',
        ],
        [
            'attribute' => '操作',
            'format' => 'html',
            'value' => function ($model) {
                // /index.php?r=site/index&src=ref1
                return Html::a('修改', ['edit_cpzx', 'id' => $model['id']], ['class' => 'profile-link']).'|'.Html::a('删除', ['delete_id_cpzx', 'id' => $model['id']], ['class' => 'profile-link']);
            },
        ],
        [
            'attribute' => '产品信息',
            'format' => 'html',
            'value' => function ($model) {
                // /index.php?r=site/index&src=ref1
                return Html::a('配色', ['ps', 'id' => $model['id']], ['class' => 'profile-link']).'|'.Html::a('尺寸价格', ['ccjg', 'id' => $model['id']], ['class' => 'profile-link']).'|'.Html::a('产品描述', ['cpms', 'id' => $model['id']], ['class' => 'profile-link']);
            },
        ],		
		
	],
]);
?>
</div>
<div class="col-md-6 col-md-offset-2">
<?php //return Html::a(Yii::t('user', 'Run'), ['block']);?>
    <a href="<?=url::to(['add_index']);?>">
		<button class="btn btn-success btn-block">添加新产品</button>
	</a>
</div>
</div>
