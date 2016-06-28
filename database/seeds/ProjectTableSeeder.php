<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTableSeeder extends Seeder
{
  public function run()
  {
    $projects = [
      [
        'id'          => 1,
        'title'       => 'Test Project 01',
        'description' => 'This test project will showcase task duration prediction for multiple types of users.'
      ],
      [
        'id'          => 2,
        'title'       => 'Test Project 02',
        'description' => 'This test project will showcase ability to have more than one project.'
      ]
    ];

    foreach ($projects as $project) {
      DB::table('projects')->insert($project);
    }
  }
}
