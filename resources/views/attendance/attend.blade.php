@extends('layouts.app')

@section('content')
<div class="container">
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