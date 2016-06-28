<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskUserTableSeeder extends Seeder
{
  public function run()
  {

    // inactive tasks
    for ($task = 1; $task <= 100; $task++) {
      DB::table('task_user')->insert(
        [
          'task_id' => $task,
          'user_id' => 1
        ]);
    }

    for ($task = 101; $task <= 200; $task++) {
      DB::table('task_user')->insert(
        [
          'task_id' => $task,
          'user_id' => 2
        ]);
    }

    for ($task = 201; $task <= 300; $task++) {
      DB::table('task_user')->insert(
        [
          'task_id' => $task,
          'user_id' => 3
        ]);
    }

    // active tasks
    for ($task = 301; $task <= 305; $task++) {
      DB::table('task_user')->insert(
        [
          'task_id' => $task,
          'user_id' => 1
        ]);
    }

    for ($task = 306; $task <= 310; $task++) {
      DB::table('task_user')->insert(
        [
          'task_id' => $task,
          'user_id' => 2
        ]);
    }

    for ($task = 311; $task <= 315; $task++) {
      DB::table('task_user')->insert(
        [
          'task_id' => $task,
          'user_id' => 3
        ]);
    }

  }

}
