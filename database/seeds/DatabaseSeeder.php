<?php

use Database\Seeds\Local;
use Database\Seeds\Production;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    const LOCAL = [
        Local\UsersTableSeeder::class,
    ];

    const PROD = [
        Production\UsersTableSeeder::class
    ];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            $this->call(App::isLocal() ? self::LOCAL : self::PROD);
        });
    }
}
