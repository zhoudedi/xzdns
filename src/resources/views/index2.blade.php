<!-- Required meta tags --><html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>{{ config('sys.web.title',config('sys.web.name','网站首页')) }}</title><!-- Bootstrap CSS / Color Scheme -->
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/css/zt2/bootstrap.css" id="theme-color">
	</head>
	<body>
		<!--navigation-->
		<section class="smart-scroll">
			<div class="container-fluid">
				<nav class="navbar navbar-expand-md navbar-light">
					<a class="navbar-brand heading-black" href=""> {{ config('sys.web.name') }} </a> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span data-feather="menu"></span> </button>
					<div class="collapse navbar-collapse" id="navbarCollapse">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item"><a class="nav-link page-scroll" href="/login">立即登入</a></li>
							<li class="nav-item"><a class="nav-link page-scroll" href="/login?act=reg">用户注册</a></li>
						</ul>
						<form class="form-inline">
							<a class="btn btn-primary page-scroll" href="{!! config('sys.html_kefu') !!}">客服</a>
						</form>
					</div>
				</nav>
			</div>
		</section> <!--hero header-->
		<section class="pt-5" id="home">
			<div class="container-fluid">
				<div class="row vh-md-100">
					<div class="col-md-4 ml-auto my-auto text-center text-md-left order-2 order-md-1">
						<h1 class="text-capitalize">告别传统对接</h1>
						<p class="lead text-muted mb-5">{{ config('sys.web.name') }}，简单快捷、功能强大的控制面板。主打稳定长久稳定客户，控制面板无任何广告，让我们伴您的网站成长 !</p> <a href="/login?act=reg" class="btn btn-primary d-inline-flex flex-row align-items-center page-scroll"> 立即注册 <em data-feather="arrow-right" width="20" height="20" class="ml-2"></em> </a> <a href="/login" class="btn btn-primary d-inline-flex flex-row align-items-center page-scroll"> 立即登录 <em data-feather="arrow-right" width="20" height="20" class="ml-2"></em> </a>
					</div>
					<div class="col-md-7 my-auto pt-5 pt-md-0 order-1 order-md-2">
						<img src="/images/zt2/mockup.svg" class="img-fluid d-block mx-auto" alt="Mockup">
					</div>
				</div>
			</div>
		</section> <!-- features section -->
		<section class="py-7 bg-white" id="features">
			<div class="container">
				<div class="row">
					<div class="col-md-6 mx-auto text-center">
						<h2 class="text-capitalize">因为出众，所以不凡 !</h2>
						<p class="text-muted lead">拥有近万人的用户群,上百家互联对接我们,不忘初心,方得始终！</p>
					</div>
				</div>
				<div class="row mt-5 feature-boxes">
					<div class="col-md-4 box">
						<div class="icon-box">
							<div class="icon-box-inner small text-primary">
							  <span data-feather="users" width="30" height="30"></span>
							</div>
						</div>
						<h5>稳定域名</h5>
						<p class="text-muted">大量优质好域名,给用户更好的体验</p>
					</div>
					<div class="col-md-4 box">
						<div class="icon-box">
							<div class="icon-box-inner small text-primary">
							  <span data-feather="refresh-ccw" width="30" height="30"></span>
							</div>
						</div>
						<h5>多平台对接支持</h5>
						<p class="text-muted">支持阿里云,腾讯云,Cloudflare等</p>
					</div>
					<div class="col-md-4 box">
						<div class="icon-box">
							<div class="icon-box-inner small text-primary">
							  <span data-feather="layout" width="30" height="30"></span>
							</div>
						</div>
						<h5>24H持续运行</h5>
						<p class="text-muted">24小时不间断运行,稳定,快速,实用</p>
					</div>
					<div class="col-md-4 box">
						<div class="icon-box">
							<div class="icon-box-inner small text-primary">
							  <span data-feather="message-circle" width="30" height="30"></span>
							</div>
						</div>
						<h5>专业的客服</h5>
						<p class="text-muted">客服在线24小时一对一指导，再也不怕遇到对接问题了！选择我们就是相信自己！</p>
					</div>
					<div class="col-md-4 box">
						<div class="icon-box">
							<div class="icon-box-inner small text-primary">
							  <span data-feather="search" width="30" height="30"></span>
							</div>
						</div>
						<h5>浏览器搜索</h5>
						<p class="text-muted">本平台已被各大网站收录，如果记不住我们的网址请收藏！</p>
					</div>
				</div>
			</div>
		</section> <!--signup section-->
		<section class="bg-hero py-7" id="signup" style="background-image: url({$web.cdn}/Public/static/img/mockup.svg)">
			<div class="container">
				<div class="row">
					<div class="col-md-6 my-md-auto text-center text-md-left pb-5 pb-md-0">
						<h2 class="text-white">来自官方售后区</h2>
						<p class="lead text-light">虽然我们不是最好的，但一定是你想要的！</p>
					</div>
					<div class="col-md-5 ml-auto">
						<div class="card">
							<div class="card-body p-4">
							  <h5 class="text-center">①遇到问题请联系客服解决！<br></h5>
							  <form class="signup-form">
							  <div class="form-group">
							  </div>
							  </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> <!--footer-->
		<footer class="py-6 bg-white">
			<div class="container">
				<div class="row">
					<div class="col-sm-5 mr-auto">
						<h6>服务企业</h6>
						<p>拥有高速、稳定的服务器，简单易用、功能强大的控制面板。主打稳定长久稳定客户，控制面板无任何广告，让我们伴您的网站成长!</p>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-md-6 mx-auto text-muted text-center small-xl">
						Copyright <script type="text/javascript">
           var date = new Date();
             document.write(date .getFullYear())
              </script> . All Rights Reserved. <a href="" target="_blank" title="域名">{{ config('sys.web.name') }}</a> By <a class="font-w600" href="#" target="_blank">小周</a>  
					</div>
				</div>
				<div class="row mt-1.5">
					<div class="col-md-6 mx-auto text-muted text-center small-xl">
					    您的IP：<span id="ip"></span> &nbsp; 您的位置：<span id="ipwz"></span>
					</div>
				</div>
			</div>
		</footer> <!--scroll to top-->
		<link href="/css/zt2/sweetalert.min.css" rel="stylesheet">
		<script src="/js/sweetalert.min.js"></script>
		<script src="/js/ip.js"></script>
	</body>
<script>
if({{ config('sys.html_yh') }}==0){

}else{
function loadJs(path,callback){var header=document.getElementsByTagName("head")[0];var script=document.createElement('script');script.setAttribute('src',path);header.appendChild(script);if(!/*@cc_on!@*/false){script.onload=function(){callback();}}else{script.onreadystatechange=function(){if(script.readystate=="loaded" ||script.readState=='complate'){callback();}}}}
        loadJs("/js/yinghua.min.js",function(){yinghua(50,1.5)});
}
</script>

</html>