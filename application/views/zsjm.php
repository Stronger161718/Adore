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
<title>爱步自行车_招商加盟</title>
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
<section class="row join">
	<img id="join-bg" src="<?php echo base_url();?>assets/images/join.png" alt="" style="position:absolute;left:0px;width:100%;">
	<div class="col-md-2 no-padding join-titles">
		<div class="row" style="text-align:right;">
				<a href="<?php echo base_url();?>index.php/welcome/xsmd"><h2>销售门店</h2></a>
				<br>
				<br>
				<br>
				<br>
		</div>
		<div class="row" style="margin-top:50%;font-style:normal;">
			<h3>联系方式</h3>
			<h5 style="font-family:'微软雅黑';">手机：<?php echo $foot->text;?></h5>
			<h5 style="font-family:'微软雅黑';">传真：<?php echo $foot->text;?></h5>
		</div>
		<div class="row" style="margin-top:60%">
			<a href="<?php echo base_url();?>index.php/welcome/join">
				<div class="col-md-12 sq">
				</div>
			</a>
		</div>
	</div>
	<div class="join-box">
		<div class="col-md-8 join-order" style="float:none;">
			<div class="col-md-3"><h1>01</h1></div>
			<div class="col-md-6">
				<h3>提交加盟申请</h3>
				<p>通过网络、电话、邮件等形式递交加盟申请</p>
			</div>
		</div>
		<div class="col-md-8 join-order" style="float:none;">
			<div class="col-md-3"><h1>02</h1></div>
			<div class="col-md-6">
				<h3>了解项目</h3>
				<p>通过与总部销售主管沟通对项目进行全面了解</p>
			</div>
		</div>
		<div class="col-md-8 join-order" style="float:none;">
			<div class="col-md-3"><h1>03</h1></div>
			<div class="col-md-7">
				<h3>来总部考察洽谈</h3>
				<p>对项目全面了解后可获得总部发出的邀约考察通知</p>
			</div>
		</div>
		<div class="col-md-8 join-order" style="float:none;">
			<div class="col-md-3"><h1>04</h1></div>
			<div class="col-md-7">
				<h3>签订加盟合同</h3>
				<p>通过考察确认合作，随即签订加盟合同并交纳加盟费</p>
			</div>
		</div>
		<div class="col-md-8 join-order" style="float:none;">
			<div class="col-md-3"><h1>05</h1></div>
			<div class="col-md-6">
				<h3>参加系统培训</h3>
				<p>签订加盟合同后必须参加总部组织的系统培训</p>
			</div>
		</div>
		<div class="col-md-8 join-order" style="float:none;">
			<div class="col-md-3"><h1>06</h1></div>
			<div class="col-md-6">
				<h3>店面选址装修</h3>
				<p>总部协助店面的选址及装修工作</p>
			</div>
		</div>
		<div class="col-md-8 join-order" style="float:none;">
			<div class="col-md-3"><h1>07</h1></div>
			<div class="col-md-6">
				<h3>试营业</h3>
				<p>店面装修通过总部验收后即货品上架开始试营业</p>
			</div>
		</div>
		<div class="col-md-8 join-order" style="float:none;">
			<div class="col-md-3"><h1>08</h1></div>
			<div class="col-md-7">
				<h3>开业</h3>
				<p>试营业期间运行正常，即选定日期举行开业庆典，正式开业</p>
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
        $(".join-box").css('top',$("#join-bg").height()/6.3);
		$(".join-titles").css('top',$("#join-bg").height()/6.3);
		var h = $("#join-bg").height()/3;
		$(".join-titles").css('height',h*2);
		$(".sq").css('height',h/2);
		var w = $("#join-bg").width()/1000;
		$(".join-box").css('width',w*699);
		$(".join").css('height',$(".join-box").height()*1.2);
    });	
</script>
<script src="<?php echo base_url();?>assets/js/main.js"></script>
</body>
</html>