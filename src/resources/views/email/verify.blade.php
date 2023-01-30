<center>
    <h1>会员激活认证</h1><br>
    <p style="font-size: 12px;color: grey">
        {{ $username }}，您好！感谢你注册{{ $webName }}，请点击下面链接完成激活认证你的账户。<br>
        <a href="{{ $url }}">{{ $url }}</a><br><br>
        如有其它问题请在浏览器打开此链接：<a href="{{ config('sys.html_kefu') }}">{{ config('sys.html_kefu') }}</a>
    </p>
</center>