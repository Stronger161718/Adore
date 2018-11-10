<?php
use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this \yii\web\View */
/* @var $content string */
?>
<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                
 
				<li>
					<?= Html::a(
                        '',
                        ['/../../'],
                        ['data-method' => 'post', 'class' => 'fa  fa-home lineheight_my',
                        'target'=>'_blank','style'=>'line-height:31px;'
                        ]
                    ) ?>
				</li>
				<li>
					<?= Html::a(
                        '',
                        ['/user/security/logout'],
                        ['data-method' => 'post', 'class' => 'fa  fa-sign-out','style'=>'line-height:31px;']
                    ) ?>

				</li>
            </ul>
        </div>
    </nav>
</header>
