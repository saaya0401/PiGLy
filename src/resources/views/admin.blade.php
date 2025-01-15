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
                45.0
                <span class="heading__kg">kg</span>
            </div>
        </div>
        <span class="line"></span>
        <div class="heading__group">
            <h5 class="heading__title">目標まで</h5>
            <div class="heading__number">
                -1.5
                <span class="heading__kg">kg</span>
            </div>
        </div>
        <span class="line"></span>
        <div class="heading__group">
            <h5 class="heading__title">最新体重</h5>
            <div class="heading__number">
                46.5
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
                        <input type="date" class="weight-form__search-input" name="date" value="4444-33-22">
                    </div>
                    <span class="calender-between">〜</span>
                    <div class="weight-form__search">
                        <input type="date" class="weight-form__search-input" name="date" value="年/月/日">
                    </div>
                    <button class="weight-form__search--button" type="submit">検索</button>
                </form>
                <div class="weight-logs__create">
                    <a class="weight-logs__create--button" href="/weight_logs/create">データ追加</a>
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
                <tr class="weight-logs__table--row">
                    <td class="weight-logs__table--content">
                        2023/11/26
                    </td>
                    <td class="weight-logs__table--content">
                        46.5kg
                    </td>
                    <td class="weight-logs__table--content">
                        1220cal
                    </td>
                    <td class="weight-logs__table--content">
                        00:15
                    </td>
                    <td class="weight-logs__table--content">
                        <img src="/image/pen.png" alt="">
                    </td>
                </tr>
                <tr class="weight-logs__table--row">
                    <td class="weight-logs__table--content">
                        2023/11/26
                    </td>
                    <td class="weight-logs__table--content">
                        46.5kg
                    </td>
                    <td class="weight-logs__table--content">
                        1220cal
                    </td>
                    <td class="weight-logs__table--content">
                        00:15
                    </td>
                    <td class="weight-logs__table--content">
                        <img src="/image/pen.png" alt="">
                    </td>
                </tr>
                <tr class="weight-logs__table--row">
                    <td class="weight-logs__table--content">
                        2023/11/26
                    </td>
                    <td class="weight-logs__table--content">
                        46.5kg
                    </td>
                    <td class="weight-logs__table--content">
                        1220cal
                    </td>
                    <td class="weight-logs__table--content">
                        00:15
                    </td>
                    <td class="weight-logs__table--content">
                        <img src="/image/pen.png" alt="">
                    </td>
                </tr>
            </table>
        </div>
        <div class="pagination">
            
        </div>
    </div>
</div>
@endsection