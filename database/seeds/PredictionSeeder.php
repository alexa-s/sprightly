<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Sprightly\Repositories\ProjectRepository;

class PredictionSeeder extends Seeder
{
  /**
   * @var ProjectRepository
   */
  private $repository;

  public function __construct(ProjectRepository $repository)
  {
    $this->repository = $repository;
  }

  public function run()
  {
    $users = \App\User::all();

    foreach ($users as $user) {
      $tasks = $user->tasks;
      foreach ($tasks as $task){
        $task->update(['predicted_duration' => $this->repository->compute($user, $task->project, $task->size)['prediction']]);
      }
    }

  }
}
