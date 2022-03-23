<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Attendance;
use Faker\Generator as Faker;
//Carbonの日付操作は破壊的(mutableな)メソッドであり自身を上書きしてしまうためCarbonImmutableを用いる
use Carbon\CarbonImmutable;

$factory->define(Attendance::class, function (Faker $faker) {
    //[過去240日間7〜14時+-10分の時刻]をランダム生成する
    $attend_time = CarbonImmutable::today()->subDays(rand(0, 240))->addHours(rand(7, 14))->addMinutes(rand(-10, 10));
    //[attend_time+1~8時間+-10分の時刻]をランダム生成する
    $leave_time = $attend_time->addHours(rand(1, 8))->addMinutes(-10, 10);
    return [
        'attend_time' => $attend_time,
        'leave_time' => $leave_time
    ];
});
