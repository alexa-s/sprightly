<?php
namespace Sprightly\Repositories;

class ProjectRepository
{

  public function compute($user, $project, $size)
  {
    if(!$user){
      return 0;
    }

    $tasks = $this->getTasks($user, $project, $size);

    $n = $this->countTasks($tasks);

    $xy = $this->computeXY($tasks);
    $xx = $this->computeXX($tasks);

    $sx = $this->computeSumX($tasks);
    $sy = $this->computeSumY($tasks);

    $sxy = $this->computeSumXY($xy);
    $sxx = $this->computeSumXX($xx);

    $slope = $this->computeSlope($n, $sx, $sy, $sxx, $sxy);
    $intercept = $this->computeIntercept($n, $sx, $sy, $slope);

    $prediction = $this->computeRegression($tasks, $intercept, $slope);

    return
      [
        'prediction' => $prediction,
        'slope' => $slope,
        'intercept' => $intercept
      ];
  }

  private function getTasks($user, $project, $size)
  {
    return $user->tasks
        ->where('type', 'done')
        ->where('active', 0)
        ->where('size', $size)
        ->where('project_id', $project->id);
  }

  private function countTasks($tasks)
  {
    return count($tasks);
  }

  private function computeXY($tasks)
  {
    $xy = [];

    $x = 0;
    foreach ($tasks as $task) {
      $x = $x + 1;
      $y = $task->duration;
      $xy[] = $x * $y;
    }

    return $xy;
  }

  private function computeXX($tasks)
  {
    $xx = [];

    $x = 0;
    foreach ($tasks as $task) {
      $x = $x + 1;
      $xx[] = $x * $x;
    }

    return $xx;
  }

  private function computeSumX($tasks)
  {
    $sum_x = 0;

    $x = 0;
    foreach ($tasks as $task) {
      $x = $x + 1;
      $sum_x = $sum_x + $x;
    }

    return $sum_x;
  }

  private function computeSumY($tasks)
  {
    $sum_y = 0;

    foreach ($tasks as $task) {
      $sum_y = $sum_y + $task->duration;
    }

    return $sum_y;
  }

  private function computeSumXY($xy)
  {
    $sum_xy = 0;

    foreach ($xy as $value) {
      $sum_xy = $sum_xy + $value;
    }

    return $sum_xy;
  }

  private function computeSumXX($xx)
  {
    $sum_xx = 0;

    foreach ($xx as $value) {
      $sum_xx = $sum_xx + $value;
    }

    return $sum_xx;
  }

  private function computeSlope($n, $sx, $sy, $sxx, $sxy)
  {
    // (NΣXY - (ΣX)(ΣY)) / (NΣX^2 - (ΣX)^2)

    if(($n * $sxx - $sx * $sx) == 0){
      return 0;
    }

    return ($n * $sxy - $sx * $sy) / ($n * $sxx - $sx * $sx);
  }

  private function computeIntercept($n, $sx, $sy, $slope)
  {
    // (ΣY - b(ΣX)) / N
    if($n == 0){
      return 0;
    }
    return ($sy - $slope * $sx) / $n;
  }

  private function computeRegression($tasks, $intercept, $slope)
  {
    $x = count($tasks) + 1;
    return $intercept + $slope * $x;
  }
}