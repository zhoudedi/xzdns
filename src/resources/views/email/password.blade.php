<center>
    <h1>用户密码重置</h1>
    <p style="font-size: 12px;color: grey">
        {{ $username }}，您好！您正在申请重置{{ $webName }}用户密码，请点击下面链接重新设置密码。<br>
        <a href="{{ $url }}">{{ $url }}</a><br><br>
        如有其它问题请在浏览器打开此链接：<a href="{{ config('sys.html_kefu') }}">{{ config('sys.html_kefu') }}</a>
    </p>
</center>