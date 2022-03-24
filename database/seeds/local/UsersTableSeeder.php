<?php
namespace Database\Seeds\Local;

use App\User;
use App\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

/*
 dev環境用データ
*/
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //勤務時間総計の検算用
        $for_check = [
            new Attendance(["attend_time"=>new Carbon('2022-03-01 07:00'), "leave_time"=>new Carbon('2022-03-01 14:00')]), //7h
            new Attendance(["attend_time"=>new Carbon('2022-03-02 08:53'), "leave_time"=>new Carbon('2022-03-02 13:00')]), //4h 7m
            new Attendance(["attend_time"=>new Carbon('2022-03-28 11:03'), "leave_time"=>new Carbon('2022-03-28 17:02')]), //5h59m // 3月合計 17h 6m
            new Attendance(["attend_time"=>new Carbon('2022-02-28 07:00'), "leave_time"=>new Carbon('2022-02-28 14:00')]), //7h    // 2月合計  7h
        ];
        User::create(['name'=>'田中　太郎', 'email'=>'tanaka@mail.com','password'=>Hash::make('abcd1234')]);
        User::create(['name'=>'佐藤　次郎', 'email'=>'sato@mail.com','password'=>Hash::make('abcd1234')])->attendances()->saveMany($for_check);
        factory(User::class, 11)->create()->each(function (User $user) {
            $user->attendances()->saveMany(factory(Attendance::class, rand(20, 120))->make());
        });
    }
}
