<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
  public function run()
  {
    $users = [
      [
        'id'         => 1,
        'email'      => 'slow@test.com',
        'password'   => bcrypt('test'),
        'created_at' => Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon::now()->toDateTimeString()
      ],
      [
        'id'         => 2,
        'email'      => 'moderate@test.com',
        'password'   => bcrypt('test'),
        'created_at' => Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon::now()->toDateTimeString()
      ],
      [
        'id'         => 3,
        'email'      => 'fast@test.com',
        'password'   => bcrypt('test'),
        'created_at' => Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon::now()->toDateTimeString()
      ]
    ];

    foreach ($users as $user) {
      DB::table('users')->insert($user);
    }
  }
}
