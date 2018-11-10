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
<title>爱步自行车_申请加盟</title>
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
<section class="banner-m row">
	<div class="col-md-1">
	</div>
	<div class="col-md-10 no-padding messages">
		<a href="<?php echo base_url();?>index.php/welcome/zsjm" onclick="javascript:history.back(-1);">
			<img id="back-m" src="<?php echo base_url();?>assets/images/back-m.png" alt="" style="position:absolute;left:0px;width:10%">
		</a>
		<div class="message-box">
			<div class="col-md-3 sqjm no-padding">
				<img src="<?php echo base_url();?>assets/images/sqjm.png" alt="" >
			</div>
			<div class="col-md-2 lx no-padding" >
				<h4>加盟咨询</h4>
				<img src="<?php echo base_url();?>assets/images/lx-bg.png" alt="">
			</div>
			<div class="col-md-9" style="position:relative;left:5%;padding-top:5%;">
				
				
            <form method="post" accept-charset="utf-8" id='join_form' action="join">
					<div class="row">
						<h4>申请人信息</h4>
						<div class="col-md-4 form">
							<p>姓名：</p><input type="text" name="name" value="">
							<br><br>
							<p>学历：</p><input type="text" name="xl" value="">
							<br><br>
							<p>QQ或微信：</p><input type="text" name="qw" value="">
							<br><br>
						</div>
						<div class="col-md-4 form">
							<p>性别：</p><div class="col-md-3"></div><div class="col-md-3">男<input type="radio" name="sex" value="01" /></div>
										<div class="col-md-3">女<input type="radio" name="sex" value="1"/></div>
							<br><br>
							<p>手机：</p><input type="text" name="phone" value="">
							<br><br>
							<p>电子邮件：</p><input type="text" name="email" value="">	
						</div>
						<div class="col-md-4 form">
							<div class="row"></div>
							<br><br>
							<p>电话：</p><input type="text" name="tel" value="">
							<br><br>
							<p>邮政编码：</p><input type="text" name="yb" value="">	
						</div>
						<div class="col-md-12" >
							<p style="font-size:16px;">联系地址：</p>
							<input type="text" name="lxdz" value="" style="width:65.7%;border:none;">
						</div>
						<div class="col-md-12 form">
							<p style="float:left;">从何渠道了解ADORE：</p>
							<div class="col-md-1">杂志<input type="checkbox" name="qd[]" value="杂志"></div>
							<div class="col-md-1">展会<input type="checkbox" name="qd[]" value="展会"></div>
							<div class="col-md-2" style="width:11.5%;">百度搜索<input type="checkbox" name="qd[]" value="百度搜索" ></div>
							<div class="col-md-2" style="width:11.5%;">网络信息<input type="checkbox" name="qd[]" value="网络信息" ></div>
							<div class="col-md-1">朋友<input type="checkbox" name="qd[]" value="朋友"></div>
							<div class="col-md-1">其他<input type="checkbox" name="qd[]" value="其他"></div>
						</div>
						<div class="col-md-6 form">
							<p>是否属于商业机构投资：</p>
							<div class="col-md-2" >是<input type="radio" name="sytz" value="0" /></div>
							<div class="col-md-2" >否<input type="radio" name="sytz" value="1"/></div>
						</div>
					</div>
					<div class="row">
						<h4>加盟意向</h4>
						<div class="col-md-12">
							<p style="float:left;">申请加盟地区：</p>
							<div class="col-md-2">
								<input type="text" name="sf" size="10" style="float:left;border:none;"><p style="float:right;">省</p>
							</div>
							<div class="col-md-3" style="width:19.5%;">
								<input type="text" name="sq" size="10" style="float:left;border:none;"><p style="float:right;">地/市</p>
							</div>
							<div class="col-md-3" style="width:22.5%;">
								<input type="text" name="xq" size="10" style="float:left;border:none;"><p style="float:right;">县/市/区</p>
							</div>
						</div>
						<div class="col-md-10">
							<p style="font-size:16px;">当地其他自行车专卖店品牌:</p><input type="text" name="qt" value="" style="width:80%;border:none;">
						</div>
						<div class="col-md-8 form">
							<p>店铺规模：</p>
							<div class="col-md-2" >旗舰店<input type="radio" name="dplx" value="0" /></div>
							<div class="col-md-2" >标准店<input type="radio" name="dplx" value="1"/></div>
							<div class="col-md-2" >基础店<input type="radio" name="dplx" value="2"/></div>
						</div>
					</div>
					<div class="row">
						<h4>背景资源</h4>
						<div class="col-md-6 form">
							<p>是否已选定门店：</p>
							<div class="col-md-2" >是<input type="radio" name="xdmd" value="0" /></div>
							<div class="col-md-2" >否<input type="radio" name="xdmd" value="1"/></div>
						</div>
						<div class="col-md-6 form">
							<p>是否有行业经验：</p>
							<div class="col-md-2" >是<input type="radio" name="hyjy" value="0" /></div>
							<div class="col-md-2" >否<input type="radio" name="hyjy" value="1"/></div>
						</div>
					</div>
					<div class="row">
						<h5>客户自我分析（性格、管理经验、营销理念、社会关系）：</h5>
						<div class="col-md-12">
							<textarea rows="5" cols="50" name="zwfx" id="zwfx" style="resize:none;heigh:100%;width:100%;border:none;" placeholder="请在此处输入文本.."></textarea>
						</div>
					</div>
					<div class="row">
						<h5>加盟ADORE的理由：</h5>
						<div class="col-md-12">
							<textarea rows="5" cols="50" name="ly" id="ly" style="resize:none;heigh:100%;width:100%;border:none;" placeholder="请在此处输入文本.."></textarea>
						</div>
					</div>
					<br><br><br><br><br><br><br><br><br>
					<div class="col-md-8 submit" type='submit' id ='sub' style="cursor:pointer;">
						<img src="<?php echo base_url();?>assets/images/submit.png" alt="">
					</div>
					</form>
				
				
			</div>
		</div>
	</div>
	<div class="col-md-1">
	</div>
</section>
<!-- Footer section -->
<footer class="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="footer-col col-md-5" style="color:#fff;font-style:normal;" >
          <h4>加入我们</h4>
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
<?php if($massage==1){?>
<script type="text/javascript">alert('提交成功！');</script>
<?php }?>
<script type="text/javascript">
    $(function(){
        $(".message-box").css('top',$("#back-m").height()/2);
    });
    $("#sub").click(function(){
       $("#join_form").submit();
    });
</script>
<script src="<?php echo base_url();?>assets/js/main.js"></script>
</body>
</html>