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
<title>爱步自行车_了解我们</title>
<?php echo link_tag('assets/css/bootstrap.min.css');?>
<?php echo link_tag('assets/css/flexslider.css');?>
<?php echo link_tag('assets/css/jquery.fancybox.css');?>
<?php echo link_tag('assets/css/main.css');?>
<?php echo link_tag('assets/css/responsive.css');?>
<?php echo link_tag('assets/css/animate.min.css');?>
<?php echo link_tag('assets/css/font-icon.css');?>
<?php echo link_tag('assets/css/style.css');?>
<style>
.about-1bg{
	background-image: url(<?php echo uploads().$ljwmsp->img;?>);
}
.about-2bg{
	background-image: url(<?php echo uploads().$ljwm->img;?>);
}
</style>
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
<section class="row about">
	<div class="col-md-12 no-padding about-1bg">
		<div class="about-1bg-text">
			<p style="font-size:60px;"><?php echo $ljwmsp->text;?></p>
		</div>
		
	</div>
	<div class="col-md-12 no-padding">
		<div class="col-md-10" style="float:none;margin:0 auto;padding-bottom:5%;">
			
			<br>
			<center><h1 style="font-style:normal;">品牌故事</h1></center>
			<p><?php echo $ppgs->text;?></p></div>
	</div>
	<div class="col-md-12 no-padding about-2bg" >
		
		 <div class="col-md-12 no-padding about-2bg-text" >
			<div class="col-md-3 no-padding" style="text-align:center;">
				<h1>品牌定位</h1>
			</div>
			<div class="col-md-12 " style="text-align:right;">
				<p style="font-size:36px;"><?php echo $ljwm->text;?></p>
			</div>
		</div>
		
		<div class="col-md-12 no-padding about-2bg-text2">
			<div class="col-md-3 no-padding" style="float:right;text-align:center;">
				<h1>品牌愿景</h1>
			</div>
			<div class="col-md-12 " style="text-align:right;">
				<p style="font-size:36px;"><?php echo $ljwm->content;?></p>
			</div>
		</div>
	</div>
	<div id="m-ppgs"></div>
	<div id="m-ppdw"></div>
	<div id="m-ppyj"></div>
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
        $(".about-1bg-text").css('top',$(".about-1bg").height()/3.2);
		$(".about-1bg-text").fadeIn(1000);
		$(".about-2bg-text").css('top',$(".about-2bg").height()/5.5);
		$(".about-2bg-text2").css('top',$(".about-2bg").height()/1.8);
    });	
</script>
<script src="<?php echo base_url();?>assets/js/main.js"></script>
<script>
    //根据参数名获得该参数  pname等于想要的参数名
    function getParam(pname) {
        var params = location.search.substr(1); //  获取参数 平且去掉？
        var ArrParam = params.split('&');
        if (ArrParam.length == 1) {
            //只有一个参数的情况
            return params.split('=')[1];
        }
        else {
            //多个参数参数的情况
            for (var i = 0; i < ArrParam.length; i++) {
                if (ArrParam[i].split('=')[0] == pname) {
                    return ArrParam[i].split('=')[1];
                }
            }
        }

    }

    $(function() {
        var mao = $("#" + getParam("paramName")); //获得锚点
        if (mao.length > 0) {//判断对象是否存在
            var pos = mao.offset().top-50;          //页面跳转后距离顶部50px;
            $("html,body").animate({ scrollTop: pos  + 'px'}, 500);
        }
    });

</script>

</body>
</html>