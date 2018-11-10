<?php

/**
 * Jcrop image cropping plugin for jQuery
 * Example cropping script
 * @copyright 2008-2009 Kelly Hallman
 * More info: http://deepliquid.com/content/Jcrop_Implementation_Theory.html
 */

// If not a POST request, display page below:

?><!DOCTYPE html>
<html lang="en">
<head>
  <title>图片裁剪</title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery.Jcrop.js"></script>
  <link rel="stylesheet" href="demo_files/main.css" type="text/css" />
  <link rel="stylesheet" href="demo_files/demos.css" type="text/css" />
  <link rel="stylesheet" href="../css/jquery.Jcrop.css" type="text/css" />


<style type="text/css">
  #target {
    background-color: #ccc;
    width: 500px;
    height: 330px;
    font-size: 24px;
    display: block;
  }


</style>

</head>
<body>

<div class="container">
<div class="row">
<div class="span12">
<div class="jc-demo-box">

<div class="page-header">
<ul class="breadcrumb first">
</ul>
<h1>图片裁剪</h1>
</div>
		<form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" id="chooseImage" name="img">
            <!-- 保存用户自定义的背景图片 -->
            <img id="cropedBigImg" value='custom' alt="lorem ipsum dolor sit" data-address='' title="自定义背景" style="display:none;"/>
			<div id="bili" style="display:none;">宽度：高度<input type='text' id='width' name='width'>：<input type='text' id='height' name='height'></div>
			<br><button type="submit" id='button' style="display:none;">下一步</button>
		</form>
		<script>
		$('#chooseImage').on('change',function(){
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
		$("#bili").attr("style", "display:block");
		
});
	$('#width').on('change',function(){
		if($("#width").val() && $("#height").val())
		{
			$("#button").attr("style", "display:block");
		}
	});
	$('#height').on('change',function(){
		if($("#width").val() && $("#height").val())
		{
			$("#button").attr("style", "display:block");
		}
	});
		</script>



	</div>
	</div>
	</div>
	</div>
	</body>

</html>
