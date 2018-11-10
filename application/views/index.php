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
<title>爱步自行车_首页</title>
<?php echo link_tag('assets/css/bootstrap.min.css');?>
<?php echo link_tag('assets/css/jquery.fancybox.css');?>
<?php echo link_tag('assets/css/main.css');?>
<?php echo link_tag('assets/css/responsive.css');?>
<?php echo link_tag('assets/css/animate.min.css');?>
<?php echo link_tag('assets/css/font-icon.css');?>
<?php echo link_tag('assets/css/style.css');?>
<?php echo link_tag('assets/css/banner.css');?>
</head>

<body>
<!--header navigation -->
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
<!--header navigation --> 
<div class="box">
	<div class="box_img">
		<ul>
				<?php foreach($banner_query->result() as $row){ ?>
					<a href="<?php echo $row->link;?>">
					<li style="background-image: url(<?php echo uploads().$row->img;?>)"></li>
					</a>
				<?php } ?>
			
		</ul>
		<div class="box_tab"></div>
	</div>
	
</div>
<!-- header section --> 
<!-- about section -->
<section id="intro" class="section intro no-padding" >
	<div class="row" style="margin-left:0px;margin-right:0px;">
		<div class="col-md-12 no-padding title1">最新动态</div>

		<div class="col-md-12 no-padding zxdt" style="overflow:hidden;position:relative;">
			<div class="col-md-2" style="background:url(assets/images/new1.png) no-repeat;position:absolute;top:0px;height:340px;z-index:3;">
			</div>
			<ul class="slides">	
			<?php $i=0;
			foreach($zxdt_query->result() as $row){
				$i++;
				?>
				<li>
					<a href="<?php echo $row->link;?>">
						<img src="<?php echo uploads().$row->img;?>" alt="">
					</a>
				</li>
			<?php
				if($i==1){
					$img_zxdt=uploads().$row->img;
				} 
			}
			if($i%2!=0){?>
				<li>
					<img src="<?php echo uploads().$row->img;?>" alt="">
				</li>
			<?php } ?>

      </ul>
		<ul class="flex-direction-nav">
			<li><a class="flex-prev" href="javascript:;">Previous</a></li>
			<li><a class="flex-next" href="javascript:;">Next</a></li>
		</ul>
    </div>
  
  </div>
  <div class="col-md-12 title2" >产品中心</div>
</section>
<!-- about section --> 
<!-- product section -->
<section  class="works section no-padding" style="background:url(assets/images/bg1.jpg) no-repeat;padding-bottom:200px;">
  <div class="container-fluid">
    <div  class="row no-gutter">
      <div  class="col-lg-2 col-md-4 col-sm-4 work" > 
	<!--山地--> <a href="<?php if( $cpzx[0]->link){echo $cpzx[0]->link;}else{echo '###';}?>" class="work-box">
		<img src="assets/images/SD.jpg" alt="">
        </a> </div>
      <div class="col-lg-4 col-md-8 col-sm-8 work"> <a href="<?php if( $cpzx[0]->link){echo $cpzx[0]->link;}else{echo '###';}?>" class="work-box"> <img src="<?php echo uploads().$cpzx[0]->img;?>" alt="">
        <div class="overlay">
		  <p><?php echo $cpzx[0]->text;?></p>
        </div>
        <!-- overlay --> 
        </a> </div>
      <div class="col-lg-4 col-md-8 col-sm-8 work"> <a href="<?php if( $cpzx[1]->link){echo $cpzx[1]->link;}else{echo '###';}?>" class="work-box"> <img src="<?php echo uploads().$cpzx[1]->img;?>" alt="">
        <div class="overlay">
		  <p><?php echo $cpzx[1]->text;?></p>
        </div>
        <!-- overlay --> 
        </a> </div>
      <div class="col-lg-2 col-md-4 col-sm-4 work" > 
	  <!--公路--><a href="<?php if( $cpzx[1]->link){echo $cpzx[1]->link;}else{echo '###';}?>" class="work-box"> 
		<img src="assets/images/GL.jpg" alt=""> 
        </a> </div>
	</div>
	<div class="row no-gutter">
      <div class="col-lg-2 col-md-4 col-sm-4 work"> 
	  <!--青少年--><a href="<?php if( $cpzx[2]->link){echo $cpzx[2]->link;}else{echo '###';}?>" class="work-box"> 
		<img src="assets/images/TEEN.jpg" alt="">

        </a> </div>
      <div class="col-lg-4 col-md-8 col-sm-8 work"> <a href="<?php if( $cpzx[2]->link){echo $cpzx[2]->link;}else{echo '###';}?>" class="work-box"> <img src="<?php echo uploads().$cpzx[2]->img;?>" alt="">
        <div class="overlay">
		  <p><?php echo $cpzx[2]->text;?></p>
        </div>
        <!-- overlay --> 
        </a> </div>
      <div class="col-lg-4 col-md-8 col-sm-8 work"> <a href="<?php if( $cpzx[3]->link){echo $cpzx[3]->link;}else{echo '###';}?>"  class="work-box"> <img src="<?php echo uploads().$cpzx[3]->img;?>" alt="">
        <div class="overlay">
		  <p><?php echo $cpzx[3]->text;?></p>
        </div>
        <!-- overlay --> 
        </a> </div>
      <div class="col-lg-2 col-md-4 col-sm-4 work" > 
	  <!--旅游--><a href="<?php if( $cpzx[3]->link){echo $cpzx[3]->link;}else{echo '###';}?>" class="work-box"> 
        <img src="assets/images/LY.jpg" alt="">
        </a> </div>
	</div>
  </div>
  
</section>
<!-- product  section --> 
<!-- join section -->
<section class="section no-padding" style="background:url(assets/images/bg1.jpg) no-repeat;height:500px;">
	<a href="<?php echo base_url();?>index.php/welcome/zsjm/" id="join">
		<div class="col-md-12 title3"></div>
		<div class="title3-font">  <p>　&nbsp	</p> </div>
		<center>
			<p style="font-size:36px;">足下路，骑爱步</p>
			<p></p>
		</center>
	</a>
</section>
<!-- join  section --> 

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
<script src= "<?php echo base_url();?>/assets/js/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){	
        $(".title1").click(function(){
			var t1scroll = $(".slides").offset().top;
			var headH = $("#header").height();
			var t1 = t1scroll-headH;
            $('html,body').animate({scrollTop: t1}, 1000);
        });
		$(".title2").click(function(){
			var t2scroll = $(".works").offset().top;
			var headH = $("#header").height();
			var t2 = t2scroll-headH;
            $('html,body').animate({scrollTop: t2}, 800);
        });
		$("#totop").click(function(){
            $('html,body').animate({scrollTop:"0px"}, 500);
        });
		$("#totop").click(function(){
            $('html,body').animate({scrollTop:"0px"}, 500);
        });
		$(".box_img").css("height",$(this).width()/16*9);
		$(".box_img ul li").css("height",$(this).width()/16*9);
				var n = $(".slides").find('img').length;
		$(".slides").css("width",$(".zxdt").width()*n/2);
		$(".slides img").css("width",$(".slides").width()/n);
		$(".slides").css("height",$(".slides img").height());
		var i=0;
		var imagew=$(".slides img").width();
		$(".flex-next").mousedown(function(){
			if (i >= n-2) {
				i=0;
			} else {
				i++;
			}
			$('.slides').animate({right: imagew*i}, 800);
        });
		$(".flex-prev").mousedown(function(){
			var l=i-1;
			if (l <= 0) {
				l=0;
				i=0;
			}else {
				i--;
			}
			$('.slides').animate({right: imagew*l}, 800);
        });
		var time = setInterval(move,3000);

		function move(){
			i++;
			if(i>= n-2){
				i=0;
			}

			$('.slides').animate({right: imagew*i}, 800);
		}

		$('.slides').hover(function(){
			clearInterval(time);
		},function(){
			time = setInterval(move,3000);
		});
    });
</script>
<script src= "<?php echo base_url();?>/assets/js/bootstrap.min.js"></script>
<script src= "<?php echo base_url();?>/assets/js/jquery.fancybox.pack.js"></script>
<script type="text/javascript">

	$(document).ready(function(){
		var timejg=3000;//轮播间隔时间
		var size = $('.box_img ul a li').size();
		for(var i=1;i<=size;i++){
			$('.box_tab').append('<a href="javascript:(void)">'+i+'</a>');
		}

		$('.box_img ul a li').eq(0).show();
		$('.box_tab a').eq(0).addClass('active')
		$('.box_tab a').mouseover(function(){
			$(this).addClass('active').siblings().removeClass('active');
			var index = $(this).index();
			i=index;
			for(var m=0;m<size;m++){
				if(m!=i){
					//$('.box_img ul a li').eq(m).css('display','none');
					$('.box_img ul a li').eq(m).fadeOut(300)
				}else{
					$('.box_img ul a li').eq(i).fadeIn(300);
				}
			}
			//$('.box_img ul a li').eq(index).stop().fadeIn(300).siblings().stop().fadeOut(300);
		});

		var i = 0;
		var time = setInterval(move,timejg);

		function move(){
			i++;
			if(i==size){
				$('.box_img ul a li').hide();
				i=0;
			}

			$('.box_tab a').eq(i).addClass('active').siblings().removeClass('active');
			$('.box_img ul a li').eq(i).fadeIn(300);
		}

		$('.box').hover(function(){
			clearInterval(time);
		},function(){
			time = setInterval(move,timejg);
		});
	});
</script> 

<script src= "<?php echo base_url();?>/assets/js/main.js"></script>
</body>
</html>