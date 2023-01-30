@extends('admin.layout.index')
@section('title', '美化配置')
@section('content')
    <div id="vue" class="pt-3 pt-sm-0 row">
        <div class="col-12 col-md-6 mt-2">
            <div class="card">
                <div class="card-header">
                    美化设置
                </div>
                <div class="card-body">
                    <form id="form-web">
                        <input type="hidden" name="action" value="config">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">首页主题色</label>
                            <div class="col-sm-9">
                                <select name="zts[zt]" :value="'{{ config('sys.zts.zt','#7f34ff') }}'"
                                        class="form-control">
                                    <option value="#ff7c7c">粉红色</option>
                                    <option value="#7f34ff">紫色</option>
                                    <option value="#00ffc8">青绿色</option>
                                    <option value="#000000">黑色</option>
                                    <option value="#00dfff">浅蓝色</option>
                                    <option value="#ff0000">红色</option>
                                </select>
                                <div class="input_tips">
                                       推荐使用粉红色和紫色（注：仅对原版模板有效）
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">首页模板</label>
                            <div class="col-sm-9">
                                <select name="html_mb" :value="'{{ config('sys.html_mb','index') }}'"
                                        class="form-control">
                                    <option value="index">默认模板</option>
                                    <option value="index1">战王二级域名分发模板</option>
                                    <option value="index2">模板3号</option>
                                </select>
                                <div class="input_tips">
                                       （注：渣到不能在渣的渣机尽量不要更换，否则可能会出现一些未知错误。（大部分没啥问题的））
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">用户默认头像</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="html_bjt" placeholder="输入头像链接"
                                >{{ config('sys.html_bjt') }}</textarea>
                                <div class="input_tips">
                                       支持图床、随机图片api、本地（注：1.康乐主机设置后建议清除一下缓存 2.用户默认头像设置仅支持不是QQ邮箱注册的人）
                                </div>
                            </div>
                          </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">樱花设置</label>
                            <div class="col-sm-9">
                                <select name="html_yh" :value="'{{ config('sys.html_yh','index') }}'"
                                        class="form-control">
                                    <option value="0">关闭</option>
                                    <option value="1">打开</option>
                                </select>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="card-footer">
                    <a class="btn btn-info text-white float-right" @click="form('web')">保存</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('foot')
    <script>
        new Vue({
            el: '#vue',
            data: {},
            methods: {
                form: function (id) {
                    var vm = this;
                    this.$post("/admin/config", $("#form-" + id).serialize())
                        .then(function (data) {
                            if (data.status === 0) {
                                vm.$message(data.message, 'success');
                            } else {
                                vm.$message(data.message, 'error');
                            }
                        });
                },
            },
            mounted: function () {
            }
        });
    </script>
@endsection