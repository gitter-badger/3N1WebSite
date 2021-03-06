@extends('layouts.app')

@section('title')
    {{ trans('topic.Topic') }} - @parent
@endsection

@section('content')
<!-- Topic -->
<div class="container">
    <div class="row">
        <div class="col-sm-8 section-topic">
            <!-- HotNode -->
            <div class="section-hotNode" style="height:30px; overflow:hidden;">
                @if (!$categorys->count())
                    {{ trans('app.No data') }}
                @endif
                @foreach ($categorys as $category)
                    <span  class="{{ @$_GET['category_id'] == $category->id ? 'selected' : '' }} label label-default">
                        <a href="{{ route('topic.index', ['category_id' => $category->id, 'filter' => isset($_GET['filter']) ? $_GET['filter'] : '']) }}">{{ $category->name }}</a>
                    </span>
                @endforeach
            </div>

            <div class="panel panel-default" id="section-items-topic">
                <div class="panel-heading">
                    <a href="{{ url('/topic') }}">{{ trans('topic.Topics') }}</a>

                    <!-- Filter -->
                    <div class="filter">
                        <a class="{{ @$_GET['filter'] === 'recent' ? 'selected' : '' }}" href="{{ route('topic.index', ['category_id' => isset($_GET['category_id']) ? $_GET['category_id'] : '', 'filter' => 'recent']) }}">
                            {{ trans('topic.Recent') }}
                        </a>
                        <a class="{{ @$_GET['filter'] === 'vote' ? 'selected' : '' }}" href="{{ route('topic.index', ['category_id' => isset($_GET['category_id']) ? $_GET['category_id'] : '', 'filter' => 'vote']) }}">
                            {{ trans('topic.Vote') }}
                        </a>
                        <a class="{{ @$_GET['filter'] === 'noreply' ? 'selected' : '' }}" href="{{ route('topic.index', ['category_id' => isset($_GET['category_id']) ? $_GET['category_id'] : '', 'filter' => 'noreply']) }}">
                            {{ trans('topic.NoReply') }}
                        </a>
                    </div>

                    <!-- Shortcut -->
                    <div class="pull-right shortcut">
                        <a href="{{ route('topic.create') }}">{{ trans('topic.Create Topic') }}</a>
                    </div>
                </div>
                <div class="panel-body">
                    @include('snippets.items-topic', ['topics' => $topics, 'colType' => 'col-sm-12'])
                </div>
            </div>
         </div>

        <div class="col-sm-4">
            <div style="height:35px">
            </div>

            @include('snippets.panel-side')
        </div>
    </div>
</div>


<!-- Category  -->
@include('snippets.panel-category')

@endsection
