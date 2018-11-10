<?php 
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '后台管理';
?>
<div class="row">

    <div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body" style="font-size:18px;line-height:30px;">
				*文件清理只会清理无用文件;<br>
				*文件清理过程可能耗时较久,请耐心等待;<br>
				*请不要频繁清理文件;<br>
            </div>
			<a href="<?=url::to(['trash']);?>">
				<button class="btn btn-success btn-block">点击清理</button>
			</a>
        </div>
    </div>
</div>