<?php
namespace Database\Seeds\Local;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //開発環境用のデータ
        User::create(['name'=>'田中　太郎', 'email'=>'tanaka@mail.com','password'=>Hash::make('abcd1234')]);
        User::create(['name'=>'佐藤　次郎', 'email'=>'sato@mail.com','password'=>Hash::make('abcd1234')]);
        factory(User::class, 11)->create();
    }
}
