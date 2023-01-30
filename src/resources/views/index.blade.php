<!doctype html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('sys.web.title',config('sys.web.name','网站首页')) }}</title>
    <meta name="keywords" content="{{ config('sys.web.keywords') }}"/>
    <meta name="description" content="{{ config('sys.web.description') }}"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
</head>

<body>
<header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar bd-navbar-index"style="background: {{ config('sys.zts.zt') }};color: white;">
    <a class="navbar-brand mr-0 mr-md-2" href="/" aria-label="Bootstrap">
        <img src="/images/logo.png" width="36" height="36">
    </a>

    <div class="navbar-nav-scroll">
        <ul class="navbar-nav bd-navbar-nav flex-row">
            <li class="nav-item">
                <a class="nav-link active" href="/">━━━━首页━━━━</a>
            </li>
        </ul>
    </div>

    @if(auth()->check())
        <ul class="navbar-nav flex-row ml-md-auto d-md-flex">
            <li class="nav-item">
                <a class="nav-item nav-link dropdown-toggle" href="#" id="user_btns"
                   data-toggle="dropdown">{{ auth()->user()->username }}<span
                            class="d-none d-sm-inline">[{{ auth()->user()->group?auth()->user()->group->name:'' }}
                        ]</span>
                </a>
                <div class="dropdown-menu" style="left: auto" aria-labelledby="user_btns">
                    <a class="dropdown-item" href="/home">解析记录</a>
                    <a class="dropdown-item" href="/home/profile">修改密码</a>
                    <a class="dropdown-item" href="/logout" onclick="return confirm('确认退出登录？');">退出登录</a>
                </div>
            </li>
        </ul>
    @else
        <ul class="navbar-nav flex-row ml-md-auto d-md-flex">
            <li class="nav-item">
                <a class="nav-link p-2" href="/login">登录</a>
            </li>
            <li class="nav-item">
                <a class="nav-link p-2" href="/login?act=reg">注册</a>
            </li>
        </ul>
    @endif
</header>
<main class="bd-masthead" id="content">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3">
                {!! config('sys.html_header') !!}
            </div>
            <div class="col-12 mt-0 mt-sm-3">
                <form id="form-check">
                    <input type="text" class="d-none">
                    <div class="input-group">
                        <input type="text" class="form-control" style="height: 3rem" name="name"
                               placeholder="输入你想要的二级域名前缀">
                        <select name="did" class="form-control" style="flex: none;width: 100px;height: 3rem">
                            @foreach(\App\Helper::getAvailableDomains() as $domain)
                                <option value="{{ $domain->did }}">.{{ $domain->domain }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                        <span class="input-group-text" style="background: {{ config('sys.zts.zt') }};color: white;"
                              onclick="check()">查询</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

             <div class="col-lg-9 container">
               <div class="row mb-4">
                 <div class="col-md-6 pt-lg-5 pt-4">
                   <div class="card mb-4">
                     <div class="card-body">
                       <h1>💮</h1>
                       <h5 class="h3">24H运行</h5>
                       <p>服务器24h不间断运行，稳定、快速、实用</p>
                     </div>
                   </div>
                   <div class="card mb-6">
                     <div class="card-body">
                       <h1>💕</h1>
                       <h5 class="h3">包售后</h5>
                       <p>有专人在线售后维护，使用更放心、贴心</p>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-6 pt-lg-5 pt-4">
                   <div class="card mb-4">
                     <div class="card-body">
                      <h1>💞</h1>
                       <h5 class="h3">稳定域名</h5>
                       <p>大量腾讯云域名、给用户更好的体验&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                     </div>
                   </div>
                   <div class="card mb-6">
                     <div class="card-body">
                       <h1>🔰</h1>
                       <h5 class="h3">信息安全</h5>
                       <p>正版系统，确保安全</p>
                     </div>
                   </div>
                 </div>
               </div>
             </div>

<!--底部-->
   <div id="vue" class="pt-3 pt-sm-0">
        <div class="card"style="background: {{ config('sys.zts.zt') }};color: white;">
            <div class="card-header">
<!--版本-->
   <footer class="py-5" id="footer-main">
     <div class="container">
       <div class="row align-items-center justify-content-xl-between">
         <div class="col-xl-6"style="background: {{ config('sys.zts.zt') }};color: white;">
           <div class="copyright text-center text-xl-left text-muted"style="background: {{ config('sys.zts.zt') }};color: white;">
             &copy; 2020-<script type="text/javascript">
           var date = new Date();
             document.write(date .getFullYear())
              </script> .<a href="/" class="font-weight-bold ml-1" style="background: {{ config('sys.zts.zt') }};color: white;"target="_blank">{{ config('sys.web.title',config('sys.web.name','网站首页')) }}</a>. 小周版权所有
           </div>
         </div>
         <div class="col-xl-6" style="background: {{ config('sys.zts.zt') }};">
             <ul class="nav nav-footer justify-content-center">
                @foreach(\App\Helper::getIndexUrls() as $url)
                <li class="nav-item ml-3">
                    <a href="{{ $url[1] }}" class="font-weight-bold" style="color: white;" target="_blank" class="nav-link">★{{ $url[0] }}</a>
                </li>
                @endforeach
          </ul>
        </div>
       </div>
     </div>
<div class="container">
        <ul class="nav nav-footer justify-content-center">
        <li class="nav-item ml-3" style="margin-top: 10px;background: {{ config('sys.zts.zt') }};">
                    <a class="font-weight-bold" style="color: white;"class="nav-link">您的IP：<span id="ip"></span> &nbsp; 您的位置：<span id="ipwz"></span>
								<br></a>
                </li>
          </ul>
   </div>
  </footer>
            </div>
        </div>
   </div>
   
</body>

<script>
if({{ config('sys.html_yh') }}==0){

}else{
function loadJs(path,callback){var header=document.getElementsByTagName("head")[0];var script=document.createElement('script');script.setAttribute('src',path);header.appendChild(script);if(!/*@cc_on!@*/false){script.onload=function(){callback();}}else{script.onreadystatechange=function(){if(script.readystate=="loaded" ||script.readState=='complate'){callback();}}}}
        loadJs("/js/yinghua/yinghua.min.js",function(){yinghua(50,1.5)});
}
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/layer/2.3/layer.js"></script>
<script src="/js/main.js"></script>
<script src="/js/ip.js"></script>
<script>
    function check() {
        $post("/check", $("#form-check").serialize())
            .then(function (data) {
                if (data.status === 0) {
                    layer.confirm(data.message, {
                        btn: ['解析', '取消']
                    }, function () {
                        window.location.href = "/home/"
                    }, function () {
                    });
                } else {
                    layer.alert(data.message)
                }
            });
    }

    document.onkeyup = function (e) {
        var code = parseInt(e.charCode || e.keyCode);
        if (code === 13) {
            check();
        }
    }
</script>
</html>