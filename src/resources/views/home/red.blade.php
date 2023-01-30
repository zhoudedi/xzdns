@extends('home.layout.index')
@section('title', '公益防红')
@section('content')
<head>
<link rel="stylesheet" type="text/css" href="/css/sweetalert.css">
<script type="text/javascript" src="/js/sweetalert-dev.js"></script>
    <link href="/css/style.min.css" rel="stylesheet">
</head>

  <style>
    .shuaibi-tip {
      background: #fafafa repeating-linear-gradient(-45deg, #fff, #fff 1.125rem, transparent 1.125rem, transparent 2.25rem);
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
      margin: 20px 0px;
      padding: 15px;
      border-radius: 5px;
      font-size: 14px;
      color: #555555;
    }
  </style>

<body>
  <img style="background: linear-gradient(to right,#49BDAD,#f2b9ca);color:#000;" class="full-bg full-bg-bottom" ondragstart="return false;" oncontextmenu="return false;">
  <br>
  <div class="col-xs-12 col-sm-10 col-md-8 col-lg-5 center-block" style="float: none;">
    <div class="block full2">
      <div class="tab-content">
        <div class="tab-pane active" id="shop">
          <div class="shuaibi-tip animated tada text-center"><i class="fa fa-heart text-danger"></i> <b>在线生成防红短链接，支持跳转浏览器<br>说明：接口来源于网络，如有任何问题与我们无关。注：生成的链接只会显示一次，请保存好</b></div>
          <div class="form-group">
            <div class="input-group">
              <div class="card-header">短链类型</div>
              <select name="dwz-type" id="dwz-type" class="form-control">
                <option value="1">4xl.cn-QQ微信可用</option><option value="2">1v2.xyz-QQ微信可用</option><option value="3">i7q.cn-QQ微信可用</option><option value="6">sinaurl.cn（QQ☑/微信☑）</option><option value="7">0o3.cn（QQ☑/微信☑）</option><option value="8">t0k.cn（QQ☑/微信☑）</option>              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="card-header">跳转类型</div>
              <select name="dwz-pattern" id="dwz-pattern" class="form-control">
                <option value="1" selected>微信/QQ内跳浏览器</option><option value="2" >微信/QQ不跳浏览器</option><option value="4" >无需防红 - 直接缩短</option>        </select>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="card-header">缩短网址</div>
              <input type="url" name="url" id="url" value="" class="form-control" placeholder="请输入正确网址" required="">
            </div>
          </div>
          <button type="submit" class="float-right btn btn-sm btn-primary " id="start">一键生成</button>
          <br>
          <div id="result2" class="form-group" style="display:none;">
            <tbody id="list">
            </tbody>
            </table>
          </div>
          <div class="am-modal-bd">
            <p id="dwz"></p>
            <p id="data"></p>
            <p id="tzurl"></p>
            <p id="qrcode"></p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
  <script src="https://lib.baomitu.com/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://lib.baomitu.com/amazeui/2.3.0/js/amazeui.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#start').click(function() {
        $('#start').text('正在生成中，请耐心等待...');
        $("#start").addClass("am-btn-warning").removeClass("am-btn-success");
        var stype = $("select[id='dwz-type']").val();
        var pattern = $("select[id='dwz-pattern']").val();
        var url = $("input[id='url']").val();
        url = url.replace(/\+/g, "%2B");
        url = url.replace(/\&/g, "%26");
        $.ajax({
          type: "get",
          url: "https://www.lzfh.com/api/dwz.php",
          dataType: "json",
          data: 'cb=' + pattern + '&sturl=' + stype + '&longurl=' + url ,
          
          success: function(obj) {
            $('#start').text('一键生成');
            $("#start").removeClass("am-btn-warning").addClass("am-btn-success");
            if (obj.code == 200) {
              var strJson = JSON.stringify(obj)
              var data = $.parseJSON(strJson);
              $('#dwz').html('短链地址：' + data.dwz);
              $('#qrcode').html('<img class="qrimg" width="200px" src="https://www.lzfh.com/api/dwz.php?' + data.dwz + '" />');
            } else {
                        var tanchuang;
                        tanchuang=obj.msg+'\n'+'短链地址：'+obj.dwz_url;
                        swal(tanchuang);
            }
          },
          error: function(obj) {
            $('#start').text('生成失败');
            $("#start").removeClass("am-btn-warning").addClass("am-btn-danger");
          }

        });
      });
    });
  </script>
</body>