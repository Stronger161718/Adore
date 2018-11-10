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
                <table style="line-height:36px;font-size:20px;">
                    <tr>
                        <th width='60%'>姓名:<?php echo $model->name;?></th>
                        <th width='40%'>性别:<?php if($model->name==0){echo '男';}else{echo '女';}?></th>
                    </tr>
                    <tr>
                        <td>学历:<?php echo $model->xl;?></td>
                        <td>手机:<?php echo $model->phone;?></td>
                    </tr>
                    <tr>
                        <td>邮箱:<?php echo $model->email;?></td>
                        <td>手机:<?php echo $model->phone;?></td>
                    </tr>  
                    <tr>
                        <td>qq或微信:<?php echo $model->qw;?></td>
                        <td>邮编:<?php echo $model->yb;?></td>
                    </tr>  
                    <tr>
                        <td>联系地址:<?php echo $model->lxdz;?></td>
                        <td>了解渠道:<?php echo $model->qd;?></td>
                    </tr>  
                    <tr>
                        <td>商业机构投资<?php if($model->sytz==0){echo '是';}else{echo '否';}?></td>
                        <td>加盟地区:<?php echo $model->sf.$model->sq.$model->xq;?></td>
                    </tr>
                    <tr>
                        <td>当地其他自行车专卖店品牌:<?php echo $model->qt;?></td>
                        <td>店铺规模:<?php if($model->dplx==0){echo '旗舰店';}elseif($model->dplx==1){echo '标准店';}else{echo '基础店';}?></td>
                    </tr>
                    <tr>
                        <td>是否已选定门店：<?php if($model->xdmd==0){echo '是';}else{echo '否';}?></td>
                        <td>是否有行业经验:<?php if($model->hyjy==0){echo '是';}else{echo '否';}?></td>
                    </tr>
                    <tr>
                        <td colspan="2">客户自我分析:<?php echo $model->zwfx;?></td>
                    </tr>
                    <tr>
                        <td colspan="2">加盟ADORE的理由:<?php echo $model->ly;?></td>
                    </tr>
                
                </table>
                
               <br>
            </div>
        </div>
    </div>
</div>
