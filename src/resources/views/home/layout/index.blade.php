
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('sys.web.name') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/style.min.css" rel="stylesheet">
    @yield('head')
</head>

<!--圆形头像css代码-->
<style>
.yuanxing{
width:80px;
height:80px;
margin: 4px 4px 4px 0;
position: absolute;
border-radius: 50px;
}
</style>

<?php
$str=auth()->user()->email;
$x=substr($str,strripos($str,"@")+1);
if($x=="qq.com"){
$qqh=substr($str,0,strpos($str, '@'));
$qqimage='http://q1.qlogo.cn/g?b=qq&nk='.$qqh.'&s=100&t='. 'time()';  
}else{
     $qqimage = config('sys.html_bjt');
}
?>

<body>
<header class="navbar navbar-expand flex-md-row bd-navbar">
    <div class="navbar-nav-scroll">
        <ul class="navbar-nav bd-navbar-nav flex-row">
            <li class="nav-item d-sm-none" id="menu">
                <a class="nav-link nav-menu" href="#">
                    <i class="fa fa-bars fa-lg"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-logo-name" href="/"><i class="fa fa-cloud"></i>{{ config('sys.web.name') }}</a>
            </li>
        </ul>
    </div>

    <ul class="navbar-nav flex-row ml-auto d-md-flex">
        <li class="nav-item dropdown">
            <a class="nav-item nav-link dropdown-toggle" href="#" id="user_btns"
               data-toggle="dropdown">{{ auth()->user()->username }}<span
                        class="d-none d-sm-inline">[{{ auth()->user()->group?auth()->user()->group->name:'' }}]</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="user_btns">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="yuanxing"  src="<?php echo $qqimage ?>"><br><br><br><br>
                <center><a>UID:{{ auth()->user()->uid }}</a>&nbsp;&nbsp;&nbsp;<a>积分:{{ auth()->user()->point }}</a></center><hr>
                <center><a class="mdi mdi-account btn" href="/home/profile" style="color: black;">个人信息</a></center>
                <center><a class="mdi mdi-account btn" href="{!! config('sys.html_kefu') !!}"style="color: black;">联系客服</a><hr></center>             
                <center><a class="mdi mdi-account btn" href="/logout" onclick="return confirm('确认退出登录？');"style="color: black;">退出登录</a></center><br>
            </div>
        </li>
    </ul>
</header>
<div class="container-fluid">
    <div class="row flex-xl-nowrap">
        <div class="col-12 col-md-3 col-xl-2 bd-sidebar"><p></p>
            <div class="menu-item"style="background-color: #FFFFFF;border-top-left-radius:15px;border-top-right-radius: 15px;">
                <a href="/home" class="menu-link">
                    <i class="fa fa-globe"></i> 解析记录
                </a>
            </div>

<?php
$t=config('sys.qt.fhkg');
if ($t==0)
{
$fh=' ';
}
else
{
$fh='<div class="menu-item"style="background-color: #FFFFFF;border-bottom-left-radius:15px;border-bottom-right-radius: 15px;"><a href="/home/red" class="menu-link"><i class="fa fa-cube"></i> 免费防红</a></div>';
}
?>
<?php echo $fh ?>
            <div class="menu-item"style="background-color: #FFFFFF;border-bottom-left-radius:15px;border-bottom-right-radius: 15px;">
                <a href="/home/point" class="menu-link">
                    <i class="fa fa-cube"></i> 积分充值/明细
                </a>
            </div>
        </div>
        <main class="col-12 col-md-9 col-xl-10 py-md-3 pl-md-5 bd-content">
            @yield('content')
        </main>
    </div>
</div>
</body>

<script>
if({{ config('sys.html_yh') }}==0){

}else{
function loadJs(path,callback){var header=document.getElementsByTagName("head")[0];var script=document.createElement('script');script.setAttribute('src',path);header.appendChild(script);if(!/*@cc_on!@*/false){script.onload=function(){callback();}}else{script.onreadystatechange=function(){if(script.readystate=="loaded" ||script.readState=='complate'){callback();}}}}
        loadJs("/js/yinghua.min.js",function(){yinghua(50,1.5)});
}
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/layer/2.3/layer.js"></script>
<script src="/js/main.js"></script>
<script>
    var showMenu = false;
    $("#menu").click(function () {
        if (showMenu) {
            $(".bd-sidebar").removeClass('openMenu');
            $(".bd-content").removeClass('moveRight');
            $(".bd-content").addClass('moveAnimation');
            showMenu = false;
        } else {
            $(".bd-content").removeClass('moveAnimation');
            $(".bd-sidebar").addClass('openMenu');
            $(".bd-content").addClass('moveRight');
            showMenu = true;
        }
    });
</script>
@yield('foot')
</html>