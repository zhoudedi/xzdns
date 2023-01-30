<?php
/* *
 * 配置文件
 */
 
//↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓

//支付API地址
$alipay_config['apiurl']    = 'http://epay.zhoudedi.top:306/';

//商户ID
$alipay_config['partner']		= '1';

//商户KEY
$alipay_config['key']			= 'bUGZgko5XKD5vdF3c733zXPGB5kuNKF';

$notify_url = "https://二级域名分发网站/epay/notify_url.php";
        //需http://格式的完整路径，不能加?id=123这类自定义参数
        //页面跳转同步通知页面路径
$return_url = "https://二级域名分发网站/epay/return_url.php";
        //需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/

$con=mysqli_connect("127.0.0.1","root","123456","www_zdds","3306");//请配置链接数据库信息-数据库地址、数据库用户名、数据库密码、数据库名、数据库端口
if (mysqli_connect_errno($con))
{
    echo "连接失败: " . mysqli_connect_error();
}

//数据库表名前缀
$pricetable='xzdns_';//数据库表名前缀【默认不更改，如果你在安装时更改了数据库表名则需要更改】

$pricename = 'point';//金额字段名【默认不更改】
$priceusername='uid';//充值表对应的用户字段名【默认不更改】
$priceproportion = 50;//充值金额比例，不更改则默认1rm币＝50积分

//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑


//签名方式 不需修改
$alipay_config['sign_type']    = strtoupper('MD5');

//字符编码格式 目前支持 gbk 或 utf-8
$alipay_config['input_charset']= strtolower('utf-8');

//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
$alipay_config['transport']    = 'http';
?>