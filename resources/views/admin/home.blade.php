@extends('admin.layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>
        <div>
            <h5>关于作者</h5>
            <p>博客: <a href="https://vienblog.com"><strong>Vien Blog</strong></a></p>
            <p>邮箱: support@vienblog.com</p>
            <p>一键搭建VPN教程、免费ss/ssr账号分享: <a href="https://vien.tech"><strong>Vien Tech</strong></a></p>
            <hr>
            <h5>关于Vien Blog</h5>
            <p>
                1. 界面简洁、适配pc和mobile、有良好的视觉体验<br>
                2. 支持markdown、并且可以拖拽或者粘贴上传图片、分屏实时预览<br>
                3. SEO友好：支持自定义文章slug、title、description、keywords<br>
                4. 自定义导航、自定义sidebar、随时去掉不需要的模块<br>
                5. 支持标签、分类、置顶、友链等博客基本属性<br>
                6. 支持百度自动推送链接、手动推送链接、更高效收录<br>
            </p>
            <hr>
            <h5>
                License
            </h5>
            <p>
                使用<a href="https://vienblog.com"><strong>Vien Blog</strong></a>构建应用，必须在页脚保留<strong>Powered by <a
                            href="https://vienblog.com">Vien Blog</a></strong>字样以及相关链接。<br>
                在遵守以上规则的情况下，你可以享受等同于<strong>MIT License</strong>协议的授权，
                并且获取<a href="https://vienblog.com"><strong>Vien Blog</strong></a>的站点导航资格，
                满足条件的博主请联系作者将你的博客地址加入导航。
            </p>
        </div>
    </main>
@endsection