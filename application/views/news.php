<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>爱步自行车_新闻详情</title>
<?php echo link_tag('assets/css/bootstrap.min.css');?>
<?php echo link_tag('assets/css/flexslider.css');?>
<?php echo link_tag('assets/css/jquery.fancybox.css');?>
<?php echo link_tag('assets/css/main.css');?>
<?php echo link_tag('assets/css/responsive.css');?>
<?php echo link_tag('assets/css/animate.min.css');?>
<?php echo link_tag('assets/css/font-icon.css');?>
<?php echo link_tag('assets/css/style.css');?>
</head>

<body>
<section class="banner-none" role="banner" >  
      <header id="header">
    <div class="header-content clearfix"> 
		<a class="logo" href="#">
			<?php echo img(uploads().getlogo());?>
		</a>
      <nav class="navigation" role="navigation">
        <ul class="primary-nav" >
			<li>
				<a href="<?php echo base_url();?>">
				首页
				</a>
				<p style="position:relative;left:52%;">Home</p>
			</li>
            <li id="products">
				<a>
				产品中心
				</a>
				<p style="position:relative;left:45%;">Product</p>
				<ul id="product">
				<?php 
				$i=0;
				$ids=0;
				foreach(getcpfl() as $key=>$value){ 
					if($i==1){
						$ids=$key;
						$i=0;
					}
					if($id==$key){
						$i=1;
					}
					?>
					<a href="<?php echo base_url();?>index.php/welcome/cpzx/<?php echo $key;?>"><li><?php echo $value?></li></a>
				<?php }
				if($ids==0){
					$ids=$key;
				} 
				?>
				</ul>
			</li>
            <li id="equipments">
				<a>
				骑行装备
				</a>
				<p style="position:relative;left:38%;">Equipment</p>
				<ul id="equipment">
				<?php foreach(getqxzb() as $key=>$value){ ?>
					<a href="<?php echo base_url();?>index.php/welcome/qxzb/<?php echo $key;?>"><li><?php echo $value?></li></a>
				<?php } ?>
				</ul>
			</li>
			<li id="news">
				<a>
				新闻赛事
				</a>
				<p style="position:relative;left:50%;">News</p>
				<ul id="new">
					<a href="<?php echo base_url();?>index.php/welcome/qydt"><li>企业动态</li></a>
					<a href="<?php echo base_url();?>index.php/welcome/hyxw"><li>行业新闻</li></a>
				</ul>
			</li>
			<li id="sells">
				<a>
				经销网络
				</a>
				<p style="position:relative;left:33%;">Distribution</p>
				<ul id="sell">
					<a href="<?php echo base_url();?>index.php/welcome/xsmd"><li>销售门店</li></a>
					<a href="<?php echo base_url();?>index.php/welcome/zsjm"><li>招商加盟</li></a>
				</ul>
			</li>
			<li>
				<a href="<?php echo base_url();?>index.php/welcome/ljwm">
				了解我们
				</a>
				<p style="position:relative;left:40%;">About us</p>
			</li>
        </ul>
      </nav>
  </header>
</section>
<section class="row product-details">
	<div class="col-md-1 no-padding">
		<a href="<?php echo base_url();?>index.php/welcome/qydt" onclick="javascript:history.back(-1);">
		<img id="news-detail-guide" width="100%" src="<?php echo base_url();?>assets/images/back-m.png" style="position:absolute;left:0px;">
		</a>
	</div>
	<div class="col-md-10 no-padding news-details">
		<div class="col-md-12 no-padding news-title-padding" style="position:relative;background-color:#fff;float:none;">
			<div class="col-md-1 news-title">
				<h4>新闻赛事</h4>
			</div>
		</div>
		<div class="col-md-11 news-details-content" style="padding:30px;">
			<h3 style="text-align:center;"><?php echo $news->title;?></h3>
			<?php echo $news->content;?>
		</div>
	</div>
	
</section>

<!-- Footer section -->
<footer class="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="footer-col col-md-5" style="color:#fff;font-style:normal;" >
          <h4>关于我们</h4>
		  <p>联系电话：<?php echo $foot->text;?></p>
          <p>公司地址：<?php echo $foot->content;?></p>
        </div>
        <div class="footer-col col-md-2" >
          <h4>了解我们</h4>
          <p>
          <ul>
					<li><a id="ppgs" href="<?php echo base_url();?>index.php/welcome/ljwm#m-ppgs">品牌故事</a></li>
					<li><a id="ppdw" href="<?php echo base_url();?>index.php/welcome/ljwm#m-ppdw">品牌定位</a></li>
					<li><a id="ppyj" href="<?php echo base_url();?>index.php/welcome/ljwm#m-ppyj">品牌愿景</a></li>
					<li><a href="<?php echo base_url();?>index.php/welcome/zsjm">招商加盟</a></li>
          </ul>
          </p>
        </div>
		<div class="footer-col col-md-2" >
          <h4>友情链接</h4>
          <p>
          <ul>
            <li><a href="http://tjxh.norbicycle.cn/">天津自行车协会</a></li>
            <li><a href="http://www.china-bicycle.com/">中国自行车协会</a></li>
            <li><a href="http://www.cyclingchina.net/site/">骑行家</a></li>
			<li><a href="https://www.bicycling.net.cn/">单车志</a></li>
			<li><a href="http://www.biketo.com/">美骑网</a></li>
          </ul>
          </p>
        </div>
        <div class="footer-col col-md-2" >
          <h4>关注我们</h4>
		  <ul>
            <li><img src="<?php echo uploads().$foot->img;?>" alt="" width="60%" ></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- footer top --> 
</footer>
		<span id="totop" class="glyphicon glyphicon-menu-up" style="position:fixed;right:20px;top:50%;color:#fff;font-size:60px;display:none;cursor:pointer;" ></span>
<!-- Footer section --> 
<!-- JS FILES --> 
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript">  
$(function() { 
	$(".news-title-padding").css('height',$("#news-detail-guide").height()/2);
});
</script> 
<script src="<?php echo base_url();?>assets/js/main.js"></script>

</body>
</html>