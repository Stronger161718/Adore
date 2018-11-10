<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = '后台管理';
?>
<script type="text/javascript">
  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('请先选择裁剪区域');
    return false;
  };


</script>
<style type="text/css">
#target {
    background-color: #ccc;
    width: 500px;
    height: 330px;
    font-size: 24px;
    display: block;
}
#cropedBigImg{
    width:500px;
}

</style>
<div class="row">

    <div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
                    <!--img src="<?php //echo Url::to('@web/uploads/'.$logo->img);?>" style="width:100%"-->
                    <?= $form->field($model, 'imageFile')->fileInput()->label(''); ?>
                    图片比例为1920：1348
                    <img id="cropedBigImg" value='custom' alt="lorem ipsum dolor sit" data-address='' title="裁剪" style="display:none;"/>
                    <input type="hidden" id="x" name="x" />
                    <input type="hidden" id="y" name="y" />
                    <input type="hidden" id="w" name="w" />
                    <input type="hidden" id="h" name="h" />
                    <br>
                    <?= $form->field($text, 'link')->label('链接'); ?>
                    <button type="submit" class="btn btn-success btn-block" onclick="return checkCoords();">Submit</button>

                <?php ActiveForm::end() ?>
<script>
	$('#uploadform-imagefile').on('change',function(){
		
		var filePath = $(this).val(),         //获取到input的value，里面是文件的路径
			fileFormat = filePath.substring(filePath.lastIndexOf(".")).toLowerCase(),
			src = window.URL.createObjectURL(this.files[0]); //转成可以在本地预览的格式
		// 检查是否是图片
		if( !fileFormat.match(/.png|.jpg|.jpeg/) ) {
			error_prompt_alert('上传错误,文件格式必须为：png/jpg/jpeg');
			return;  
		}
	  
		$('#cropedBigImg').attr('src',src);
		//$('#cropbox1').attr('src',src);
		//$('#cropbox1').attr('style','width:500px');
		$("#cropedBigImg").attr("style", "display:block");
			$('#cropedBigImg').Jcrop({
			  aspectRatio: 1920/1348,
			  onSelect: updateCoords,
              allowResize: true
			});
	});
</script>
</div>
        </div>
    </div>
</div>
