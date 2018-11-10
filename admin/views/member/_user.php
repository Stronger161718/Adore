<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/**
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\User $user
 */
 $this->title = '东升铝业管理后台';
?>
 <section class="col-lg-offset-1 col-lg-9" style="padding:30px;background-color:#fff;">
 <?php
 $form = ActiveForm::begin([
			'layout' => 'horizontal',
			'enableAjaxValidation' => true,
			'enableClientValidation' => false,
			'fieldConfig' => [
				'horizontalCssClasses' => [
					'wrapper' => 'col-sm-6',
				],
			],
		]);
?>

<?= $form->field($user, 'email')->label('邮箱')->textInput(['maxlength' => 255]) ?>
<?= $form->field($user, 'username')->textInput(['maxlength' => 255])->label('用户名') ?>
<?= $form->field($user, 'password')->passwordInput()->label('密码') ?>
<div class="form-group">
    <div class="col-lg-offset-3 col-lg-6">
        <?= Html::submitButton(Yii::t('user', 'Update'), ['class' => 'btn btn-block btn-success']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
</section>