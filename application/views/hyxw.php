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
<title>爱步自行车_行业新闻</title>
<?php echo link_tag('assets/css/bootstrap.min.css');?>
<?php echo link_tag('assets/css/flexslider.css');?>
<?php echo link_tag('assets/css/jquery.fancybox.css');?>
<?php echo link_tag('assets/css/main.css');?>
<?php echo link_tag('assets/css/responsive.css');?>
<?php echo link_tag('assets/css/animate.min.css');?>
<?php echo link_tag('assets/css/font-icon.css');?>
<?php echo link_tag('assets/css/style.css');?>
</head>
<style>
.news-bg{
	background-image:url(<?php echo uploads().$qydt_banner_img->img;?>);
}
</style>
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
				<?php foreach(getcpfl() as $key=>$value){ ?>
					<a href="<?php echo base_url();?>index.php/welcome/cpzx/<?php echo $key;?>"><li><?php echo $value?></li></a>
				<?php } ?>
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
<section class="col-md-12 no-padding news">
	<div class="col-md-12 no-padding news-bg">
		<div class="col-md-6 no-padding news-bg-text">
			<p style="font-size:48px;font-style:italic;">NEWS</p>
			<br>
			<p style="font-size:48px;">行业新闻</p>
		</div>
	</div>
	<div class="col-md-1 no-padding">
		<img id="news-guide" width="100%" src="<?php echo base_url();?>assets/images/news-guide.png" style="position:absolute;">
	</div>
	<div class="col-md-11 no-padding news-content">
		<div class="col-md-11 no-padding news-today">
			<div class="date">
			<?php if(sizeof($qydt)>0){ ?>
				<br>
				<p><?php echo date('Y',$qydt[0]->date);?></p>
				<p><?php echo date('m',$qydt[0]->date);?></p>
				<p><?php echo date('d',$qydt[0]->date);?></p>
			<?php }?>
			</div>
			<?php if(sizeof($qydt)>0){ ?>
			<a href="<?php echo base_url();?>index.php/welcome/news/<?php echo $qydt[0]->id;?>">
			<div class="col-md-7 no-padding news-c-t">
				<div class="col-md-12" style="margin:0 auto;padding-top:5%;">
					<div class="col-md-5 no-padding news-c-img">
						<img src="<?php echo uploads().$qydt[0]->img;?>"/>
					</div>
					<div class="col-md-7 no-padding news-c-text">
						<h4><?php echo $qydt[0]->title;?></h4>
						<p><?php echo $qydt[0]->js;?></p>
					</div>
				</div>
			</div>
			</a>
			<?php }?>
		</div>
		
		<div class="col-md-12 no-padding other-news">
			<div class="col-md-3 no-padding news-list">
					<div class="col-md-9">
					<h2>近期活动</h2>
					</div>
					<div class="col-md-11" style="margin-top:10%;margin-left:5%;text-align:left;">
					<ul>
					<?php 
					$i=1;
					if(sizeof($qydt)>0){ 
					foreach($qydt as $row){?>
					<a href="<?php echo base_url();?>index.php/welcome/news/<?php echo $row->id;?>">
						<li><?php echo $i.'.'.$row->title;?></li>
					</a>
					<?php $i++;}}?>
					</ul>
				</div>
			</div>
			<?php if(sizeof($qydt)>1){ ?>
			<a href="<?php echo base_url();?>index.php/welcome/news/<?php echo $qydt[1]->id;?>">
			<div id="ot1" class="col-md-8 no-padding other-news-content">
				<div class="date">
				<br>
				<p><?php echo date('Y',$qydt[1]->date);?></p>
				<p><?php echo date('m',$qydt[1]->date);?></p>
				<p><?php echo date('d',$qydt[1]->date);?></p>
				</div>
				<div class="col-md-10 no-padding news-c">
				<div class="col-md-12" style="margin:0 auto;padding-top:5%;">
					<div class="col-md-5 no-padding news-c-img">
					<img src="<?php echo uploads().$qydt[1]->img;?>"/>
					</div>
					<div class="col-md-7 no-padding news-c-text">
						<h4><?php echo $qydt[1]->title;?></h4>
						<p><?php echo $qydt[1]->js;?></p>
					</div>
				</div>
			</div>
			</div>
			</a>
			<?php } 
			if(sizeof($qydt)>2){ ?>
			<a href="<?php echo base_url();?>index.php/welcome/news/<?php echo $qydt[2]->id;?>">
			<div id="ot2" class="col-md-8 no-padding other-news-content" style="margin-top:3.25%;">
				<div class="date">
				<br>
				<p><?php echo date('Y',$qydt[2]->date);?></p>
				<p><?php echo date('m',$qydt[2]->date);?></p>
				<p><?php echo date('d',$qydt[2]->date);?></p>
				</div>
				<div class="col-md-10 no-padding news-c">
				<div class="col-md-12" style="margin:0 auto;padding-top:5%;">
					<div class="col-md-5 no-padding news-c-img">
					<img src="<?php echo uploads().$qydt[2]->img;?>"/>
					</div>
					<div class="col-md-7 no-padding news-c-text">
						<h4><?php echo $qydt[2]->title;?></h4>
						<p><?php echo $qydt[2]->js;?></p>
					</div>
				</div>
				</div>
			</div>
			</a>
			<?php }?>
			<div id="next-ot"> 
				<img src="<?php echo base_url();?>assets/images/next-ot.png"/>
			</div>
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
    $(function(){
		$(".news-bg-text").css('top',$(".news-bg").height()/3);
		$(".news-bg-text").css('right',$(".news-bg").width()/-2.2);
		$(".news-bg-text").fadeIn(1500);
		$(".news-content").css('top',$("#news-guide").height()/3);
		$(".news-c-t").css('height',$(".news-today").height());
		var o=1;
		var e=2;
		$("#ot"+o).fadeIn(500);
		$("#ot"+e).fadeIn(500);
		$("#next-ot").click(function(){
			$("#ot"+o).hide();
			o=o+2;
			$("#ot"+e).hide();
			e=e+2;
			$("#ot"+o).fadeIn(500);
			$("#ot"+e).fadeIn(500);
			var o1scroll = $("#ot"+o).offset().top;
			var headH = $("#header").height();
			var o1 = o1scroll-headH;
            $('html,body').animate({scrollTop: o1}, 500);
		});
    });
</script>
<script src="<?php echo base_url();?>assets/js/main.js"></script>
</body>
</html>