<?php
if($_POST){
	$temp = explode(".", $_FILES["img"]["name"]);
	$extension = end($temp);
	$time=time().'.'.$extension;
	move_uploaded_file($_FILES["img"]["tmp_name"], "upload/".$time);
	$b=$_POST['width']/$_POST['height'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>图片裁剪</title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery.Jcrop.js"></script>
  <link rel="stylesheet" href="demo_files/main.css" type="text/css" />
  <link rel="stylesheet" href="demo_files/demos.css" type="text/css" />
  <link rel="stylesheet" href="../css/jquery.Jcrop.css" type="text/css" />

<script type="text/javascript">

  $(function(){

    $('#cropbox').Jcrop({
      aspectRatio: <?php echo $b?>,
      onSelect: updateCoords
    });

  });

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
    alert('Please select a crop region then press submit.');
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

		<!-- This is the image we're attaching Jcrop to -->
		<img src="upload/<?php echo $time;?>" id="cropbox" />

		<!-- This is the form that our event handler fills -->
		<form action="save.php" method="post" onsubmit="return checkCoords();">
			<input type="text" id="img" name='img' value="upload/<?php echo $time;?>" style="display:none"/>
			<input type="text" id="width" name='width' value="<?php echo $_POST['width'];?>" style="display:none"/>
			<input type="text" id="height" name='height' value="<?php echo $_POST['height'];?>" style="display:none"/>
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
			<input type="submit" value="Crop Image" class="btn btn-large btn-inverse" />
		</form>



	</div>
	</div>
	</div>
	</div>
	</body>

</html>