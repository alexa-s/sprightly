<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Task;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sprightly\Repositories\ProjectRepository;

class TasksController extends Controller
{
  public function __construct(ProjectRepository $repository)
  {
    $this->middleware('auth');
    $this->repository = $repository;
  }

  public function store(Request $request)
  {
    $task = Task::create($request->all());

    if (isset($request->all()['users'])) {
      $task->users()->sync($request->all()['users']);
    }

    return $this->redirectBackToProject($task);
  }

  private function redirectBackToProject($task)
  {
    return redirect("projects/$task->project_id");
  }

  public function update($id, Request $request)
  {
    $task = Task::findOrFail($id);

    if (isset($request->all()['users'])) {
      $task->users()->sync($request->all()['users']);
    }

    $task->predicted_duration = $this->repository->compute($task->users->last(), $task->project, $task->size)['prediction'];

    $task->update($request->all());

    return $this->redirectBackToProject($task);
  }

  public function destroy($id)
  {
    $task = Task::findOrFail($id);
    $task->users()->detach();
    Task::destroy($id);

    return $this->redirectBackToProject($task);
  }

  public function archive($id, Request $request)
  {
    $task = Task::findOrFail($id);
    $task->update($request->all());

    return $this->redirectBackToProject($task);
  }
}