<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url; 

$this->title = '后台管理';
?>
<div class="row">

    <div class="col-md-10 col-md-offset-1 col-sm-6 col-sm-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
                    <?= $form->field($model, 'dpmc')->label('店铺名称'); ?>
                    <?= $form->field($model,'sf')->dropDownList($sf,
                        [
                            'prompt'=>'--请选择省份--',
                            'onchange'=>'
                            $.get("'.yii::$app->urlManager->createUrl('jxwl/site').'?typeid=0&pid="+$(this).val(),function(data){
                                $("select#zsjm-sq").html(data);
                            });',
                        ])->label('省份');
                    ?>
                        
                    <?= $form->field($model,'sq')->dropDownList($sq,
                        [
                            'prompt'=>'--请选择市区--',
                            'onchange'=>'
                            $.get("'.yii::$app->urlManager->createUrl('jxwl/site').'?typeid=1&pid="+$(this).val(),function(data){
                                $("select#zsjm-xq").html(data);
                            });',
                        ])->label('省份');
                    ?>
                    <?= $form->field($model,'xq')->dropDownList($xq,['prompt'=>'--请选择县区--'])->label('县区');?>
                    <?= $form->field($model, 'xxdz')->label('详细地址')?>
                    <?= $form->field($model, 'tel')->label('电话')?>
                    
                    <button type="submit" class="btn btn-success btn-block" onclick="return checkCoords();">Submit</button>

                <?php ActiveForm::end() ?>

</div>
        </div>
    </div>
</div>
