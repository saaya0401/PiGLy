@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('content')
<div class="content">
    <div class="heading">
        <div class="heading__group">
            <h5 class="heading__title">目標体重</h5>
            <div class="heading__number">
                {{$weightTarget->target_weight}}
                <span class="heading__kg">kg</span>
            </div>
        </div>
        <span class="line"></span>
        <div class="heading__group">
            <h5 class="heading__title">目標まで</h5>
            <div class="heading__number">
                {{$weightTarget->target_weight - $weightLogs->first()->weight}}
                <span class="heading__kg">kg</span>
            </div>
        </div>
        <span class="line"></span>
        <div class="heading__group">
            <h5 class="heading__title">最新体重</h5>
            <div class="heading__number">
                {{$weightLogs->first()->weight}}
                <span class="heading__kg">kg</span>
            </div>
        </div>
    </div>
    <div class="weight-logs">
        <div class="weight-logs__content">
            <div class="weight-logs__menu">
                <form action="/weight_logs/search" class="weight-logs__form" method="get">
                    @csrf
                    <div class="weight-form__search">
                        <input type="date" class="weight-form__search-input" name="date_start" placeholder="開始日">
                    </div>
                    <span class="calender-between">〜</span>
                    <div class="weight-form__search">
                        <input type="date" class="weight-form__search-input" name="date_end" placeholder="終了日">
                    </div>
                    <button class="weight-form__search--button" type="submit">検索</button>
                </form>
                <div class="weight-logs__create">
                    @livewire('modal')
                </div>
            </div>
            <table class="weight-logs__table">
                <tr class="weight-logs__table--row">
                    <th class="weight-logs__table--header-date">日付</th>
                    <th class="weight-logs__table--header-weight">体重</th>
                    <th class="weight-logs__table--header-calory">食事摂取カロリー</th>
                    <th class="weight-logs__table--header-activity">運動時間</th>
                    <th class="weight-logs__table--header-blank"></th>
                </tr>
                @foreach($weightLogs as $weightLog)
                <tr class="weight-logs__table--row">
                    <td class="weight-logs__table--content">
                        {{$weightLog->date}}
                    </td>
                    <td class="weight-logs__table--content">
                        {{$weightLog->weight}}
                        <span class="weight-logs__table--content-unit">kg</span>
                    </td>
                    <td class="weight-logs__table--content">
                        {{$weightLog->calories}}
                        <span class="weight-logs__table--content-unit">cal</span>
                    </td>
                    <td class="weight-logs__table--content">
                        {{$weightLog->exercise_time}}
                    </td>
                    <td class="weight-logs__table--content">
                        <form action="/weight_logs/" method="post" class="weight-logs__table--form">
                            <input type="hidden" name="id" value="{{$weightLog->id}}">
                            <button class="weight-logs__table--button" type="submit">
                                <img src="/image/pen.png" alt="詳細">
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="pagination">
            @if($weightLogs->onFirstPage())
                    <div class="previous"><span >&lt;</span></div>
                @else
                    <div class="previous"><a class="pagination-link" href="{{$weightLogs->previousPageUrl()}}" rel="preview">&lt;</a></div>
                @endif
                @for($page=1; $page<= $weightLogs->lastPage(); $page++)
                @if($weightLogs->currentPage()== $page)
                    <div class="active"><span>{{$page}}</span></div>
                @else
                    <div class="other"><a href="{{$weightLogs->url($page)}}">{{$page}}</a></div>
                @endif
                @endfor
                @if($weightLogs->hasMorePages())
                    <div class="next"><a class="pagination-link" href="{{$weightLogs->nextPageUrl()}}" rel="next">&gt;</a></div>
                @else
                    <div class="next"><span>&gt;</span></div>
                @endif
        </div>
    </div>
</div>
@endsection