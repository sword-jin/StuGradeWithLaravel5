<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Grade;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
        'id' => 1210311232,
        'name' => '李锐',
        'password' => Hash::make('1210311232')
        ]);

        User::create([
        'id' => 1210311233,
        'name' => '陈曦',
        'password' => Hash::make('1210311233')
        ]);

        User::create([
        'id' => 1234567890,
        'name' => '管理员',
        'password' => Hash::make('root'),
        'is_admin' => 1
        ]);

        Grade::create([
            'user_id' => 1210311232,
            'math'    => 99,
            'english'    => 80,
            'c'    => 96,
            'sport'    => 95,
            'think'    => 99,
            'soft'    => 98,
            ]);

        Grade::create([
            'user_id' => 1210311233,
            ]);

    }

}
