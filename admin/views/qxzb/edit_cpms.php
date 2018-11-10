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
					<?= $form->field($text, 'imageFile')->fileInput()->label('第一张图,不上传则为默认'); ?>
					<?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label('图片'); ?>
                    <button type="submit" class="btn btn-success btn-block" onclick="return checkCoords();">Submit</button>

                <?php ActiveForm::end() ?>

</div>
        </div>
    </div>
</div>
