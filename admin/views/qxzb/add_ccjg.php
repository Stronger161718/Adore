<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = '后台管理';
?>
<div class="row">

    <div class="col-md-12 col-md-offset-0 col-sm-6 col-sm-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
                    <?= $form->field($model, 'cpcc')->label('装备尺寸'); ?>
                    <?= $form->field($model, 'cpjg')->label('装备价格'); ?>
                    <?= Html::activeHiddenInput($model,'mid',array('value'=>$id)) ?>
                    <button type="submit" class="btn btn-success btn-block" onclick="return checkCoords();">Submit</button>

                <?php ActiveForm::end() ?>

</div>
        </div>
    </div>
</div>
