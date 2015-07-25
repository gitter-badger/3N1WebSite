@extends('layouts.app')

@section('content')
<div id="cy-home">
    <div class="container">
        <div class="row items-card">
            <div class="col-sm-12 section-title">
                <div class="caption text-center">
                    简单优雅，三合一 实用的WEB程序
                    <small>PHP5(Laravel5.1) + MySQL</small>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default panel-blog-card">
                    <div class="panel-body text-center">
                        <i class="fa fa-file-text-o"></i>
                        <div class="caption">
                            {{ trans('home.Blog') }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="panel panel-default panel-topic-card">
                    <div class="panel-body text-center">
                        <i class="fa fa-comments"></i>
                        <div class="caption">
                            {{ trans('home.BBS') }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="panel panel-default panel-cms-card">
                    <div class="panel-body text-center">
                        <i class="fa fa-university"></i>
                        <div class="caption">
                            {{ trans('home.CMS') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default panel-description">
                    <div class="panel-body">
                        <div class="caption"><i class="fa fa-leaf"></i> 优雅地搭建你的网站</div>
                        <div>
                            这个WEB程序可以同时搭建博客、论坛、内容站、企业站等 <br>
                            并且它是易于功能扩展的
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default panel-description">
                    <div class="panel-body">
                        <div class="caption"><i class="fa fa-github"></i> 开源</div>
                        <p>您可以<a href="https://github.com/dev4living/newCommunity" target="_blank">在此</a>跟进开发进度，贡献代码以及加入产品的开发</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
