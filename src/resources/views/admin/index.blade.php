@extends('admin.layout.index')
@section('title', '小周二级域名分发后台首页')
@section('content')
<br>
<div class="alert alert-primary">
<?php
// 存储数据的文件
$filename = 'data.dat';       
// 指定页面编码
header('Content-type: text/html; charset=utf-8');
if(!file_exists($filename)) {
    die($filename . ' 数据文件不存在');
}
// 读取整个数据文件
$data = file_get_contents($filename);
// 按换行符分割成数组
$data = explode(PHP_EOL, $data);
// 随机获取一行索引
$result = $data[array_rand($data)];
// 去除多余的换行符（保险起见）
$result = str_replace(array("\r","\n","\r\n"), '', $result);
echo $result;
?>
</div>

    <div id="vue" class="pt-3 pt-sm-0">
        <div class="card">
            <div class="card-header">
                添加域名简单教程
            </div>
            <div class="card-body">
                <div class="list-group-item">
                    1、点击菜单栏的<a href="/admin/config/dns">接口配置</a>，先对你使用的域名解析平台的接口进行配置！
                </div>
                <div class="list-group-item">
                    2、点击菜单栏的<a href="/admin/domain/list">域名列表</a>，然后点击添加》选择你配置的解析平台》获取，然后选择你要添加的域名，然后保存！
                </div>
            </div>
        </div>
    </div>
<br>
        <div class="list-group-item">
                <div class="layui-card-header">服务器信息</div>
                     <hr>
                        <tbody>
                            <tr>
                                <td>服务器系统：</td>
                                <td>
                                    <?php $os = explode(" ", php_uname());
                    echo $os[0]; ?>
                                </td>
                            </tr>
                         <br>
                            <tr>
                                <td>PHP运行版本：</td>
                                <td>
                                    <?php echo PHP_VERSION ?>
                                </td>
                            </tr>
                          <br>
                            <tr>
                                <td>服务器解释引擎：</td>
                                <td style="padding-bottom: 0;">
                                    <?php echo $_SERVER['SERVER_SOFTWARE']; ?>
                                </td>
                            </tr>
                           <br>
                            <tr>
                                <td>源码当前版本：</td>
                                <td style="padding-bottom: 0;">
                                    v3.1.1
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
<br>
@endsection