@extends('layouts.app')

@section('content')
<div id="cy-home">
    <div class="container">
        <div class="text-center">
            <p style="font-size:18px">
                赣+, 是赣州青年的家园
            </p>
            <p style="font-size:16px">
                赣+小栈，我们是一家青旅，我们也是一家咖啡馆 <br>
                我们更是一个家，你可以在这里工作学习、生活娱乐 <br>
                小栈正在<a href="">筹划建造</a>，敬请等待，同时也需要你的小小<a href="">支持</a>
            </p>
            <p style="font-size:16px">
                这个线上社区，你也可以尽情地畅所欲言
            </p>
        </div>
        <br>

        <div class="row">
            <div class="col-sm-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        活动
                    </div>
                    <div class="panel-body" style="height:444px;">
                        @if (!$blogs->count())
                        <div>{{ trans('app.No data') }}</div>
                        @endif
                        @foreach ($blogs as $key => $blog)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <p class="caption" style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis;"><a href="{{ url('/blog', ['id' => $blog->id]) }}" style="font-size:18px;">{{ $blog->title }}</a></p>
                                <p>{!! mb_strcut($blog->body, 0, 100, 'utf-8') !!}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-sm-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        话题
                    </div>
                    <div class="panel-body" style="height:222px;">
                        @if ($topics->count())
                            <div class="row items-topic">
                                @foreach ($topics as $topic)
                                    <div class="col-sm-12 item-topic" style="margin-bottom:10px;">
                                        <!-- Avatar -->
                                        <div class="avatar pull-left">
                                            <a> <img src="{{ $topic->author->avatar }}" style="width:48px; height:38px; padding-right:10px;"> </a>
                                        </div>
                                        <!-- Reply count -->
                                        <div class="badge-number pull-right">
                                            <span class="badge"><i class="fa fa-comments"></i>&nbsp;&nbsp;{{ $topic->comment_count }}</span>
                                        </div>
                                        <!-- Topics body -->
                                        <div class="topic-text">
                                            <div class="title">
                                                <a href="{{ url('topic', [$topic->id]) }}">{{ $topic->title }}</a>
                                            </div>
                                            <div class="info">
                                                <span class="nodeName">
                                                    <a href="{{ route('topic.index', ['category_id' => $topic->category_id]) }}">{{ $topic->category->name }}</a>
                                                </span>
                                                <a>{{ $topic->author->name }}</a>
                                                <span class="separator">|</span>
                                                @if ($topic->comment_count)
                                                    <a>{{ $topic->getLastCommentUser()->author->name }}</a>
                                                    {{ timeAgo($topic->updated_at) }}{{ trans('topic.reply') }}
                                                @else
                                                    {{ trans('topic.No reply') }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div>{{ trans('app.No data') }}</div>
                        @endif
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        资讯
                    </div>
                    <div class="panel-body" style="height:154px;">
                        <ul class="list-unstyled">
                            @if (!$articles->count())
                                <li>{{ trans('app.No data') }}</li>
                            @endif
                            @foreach ($articles as $key => $article)
                            <?php if ($key == 8) {
                                break;
                            } ?>
                            <li>
                                <span class="pull-right" style="color:#777">
                                    {{ getYMD4datetime($article->created_at) }}
                                </span>
                                <a href="{{ url('/article', ['id' => $article->id]) }}">{{ $article->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
