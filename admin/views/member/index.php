<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\helpers\Html;

$this->title = '东升铝业管理后台';
?>
<div class="site-index">
<?php
echo yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
	'columns' => [
		[
            'attribute' => '#',
            'value' => function ($model) {
                return $model->id;
            },
        ],
		[
            'attribute' => '用户名',
            'value' => function ($model) {
                return $model->username;
            },
        ],
		'email',
		[
            'attribute' => '最近登录时间',
            'value' => function ($model) {
                return date('Y-m-d H:i:s',$model->last_login_at);
            },
        ],
		[
            'header' => Yii::t('user', '状态'),
            'value' => function ($model) {
                if (!$model->status) {
                    return Html::a(Yii::t('user', 'Run'), ['block', 'id' => $model->id], [
                        'class' => 'btn btn-xs btn-success btn-block',
                        'data-method' => 'post',
                        'data-confirm' => Yii::t('user', 'Are you sure you want to stop  this user?'),
                    ]);
                } else {
                    return Html::a(Yii::t('user', 'Stop'), ['block', 'id' => $model->id], [
                        'class' => 'btn btn-xs btn-danger btn-block',
                        'data-method' => 'post',
                        'data-confirm' => Yii::t('user', 'Are you sure you want to run this user?'),
                    ]);
                }
            },
            'format' => 'raw',
        ],
		[
			'header' => Yii::t('user', '操作'),
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
        ],
		
	],
]);
?>
</div>
