@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center jumbotron" id="clock">
        <h1><span class="month-num">-</span>月<span class="date">-</span>日(<span class="day-ja">-</span>)</h1>
        <h1><span class="hour">00</span>:<span class="minute">00</span>:<span class="second" style="font-size: 70%">00</span></h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col">
                    <form action="{{ action("AttendanceController@attend") }}" method="post">
                        @csrf
                        <input type="submit" value="出勤" class="btn btn-primary w-100">
                    </form>
                </div>
                <div class="col">
                    <form action="{{ action("AttendanceController@leave") }}" method="post">
                        @csrf
                        <input type="submit" value="退勤" class="btn btn-danger w-100">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection