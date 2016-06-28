<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectUserTableSeeder extends Seeder
{
  public function run()
  {
    $relations = [
      [
        'project_id' => 1,
        'user_id'    => 1,
      ],
      [
        'project_id' => 1,
        'user_id'    => 2,
      ],
      [
        'project_id' => 1,
        'user_id'    => 3,
      ],
      [
        'project_id' => 2,
        'user_id'    => 1,
      ],
      [
        'project_id' => 2,
        'user_id'    => 3,
      ]
    ];

    foreach ($relations as $relation) {
      DB::table('project_user')->insert($relation);
    }
  }
}
