<?php

namespace App\Http\Controllers;

use App\Project;
use App\Http\Requests;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sprightly\Repositories\ProjectRepository;

class ProjectController extends Controller
{
  public function __construct(ProjectRepository $repository)
  {
    $this->middleware('auth');
    $this->repository = $repository;
  }

  /**
   * Display a listing of the resource.
   *
   * @return void
   */
  public function index()
  {
    $user = Auth::User();
    $projects = $user->projects;

    foreach ($projects as &$project) {
      $users = $project->users;
      $project['users'] = '';
      foreach ($users as $user) {
        $project['users'] = $project['users'] . ',' . $user->email;
      }
    }

    return view('projects.index', compact('projects'));
  }

  /**
   * @param Request $request
   *
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function store(Request $request)
  {
    $id = Project::create($request->all());
    $user = Auth::User();
    $user->projects()->attach($id);

    return redirect('projects');
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   *
   * @return void
   */
  public function show($id)
  {
    $user = Auth::User();
    $project = Project::findOrFail($id);

    $task_durations = [
      'XS' => $this->repository->compute($user, $project, 'XS')['prediction'],
      'S' => $this->repository->compute($user, $project, 'S')['prediction'],
      'M' => $this->repository->compute($user, $project, 'M')['prediction'],
      'L' => $this->repository->compute($user, $project, 'L')['prediction'],
      'XL' => $this->repository->compute($user, $project, 'XL')['prediction'],
    ];

    return view('projects.show', compact('project', 'task_durations'));
  }

  /**
   * @param         $id
   * @param Request $request
   *
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function update($id, Request $request)
  {
    $project = Project::findOrFail($id);
    $project->update($request->all());

    return redirect('projects');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int $id
   *
   * @return void
   */
  public function destroy($id)
  {
    $project = Project::findOrFail($id);
    $project->users()->detach();
    Project::destroy($id);

    return redirect('projects');
  }

  public function sync(Request $request, $id)
  {
    $project = Project::findOrFail($id);

    $emails = preg_replace('/\s+/', '', $request['users']);
    $emails = explode(",", $emails);

    $user_ids = [];

    foreach ($emails as $email) {
      $id = User::all()->where('email', $email)->first();
      if (!is_null($id)) {
        $id = $id->toArray()['id'];
        array_push($user_ids, $id);
      }
    }

    $project->users()->sync($user_ids);

    $project->users()->detach([Auth::User()->id]);
    $project->users()->attach([Auth::User()->id]);

    return redirect('projects')->with('sync_success', 'a');
  }

  public function getStatistics($id)
  {
    $user = Auth::User();
    $project = Project::findOrFail($id);

    $xs_line_chart = $this->getLineChart($user, $project, 'XS');
    $s_line_chart = $this->getLineChart($user, $project, 'S');
    $m_line_chart = $this->getLineChart($user, $project, 'M');
    $l_line_chart = $this->getLineChart($user, $project, 'L');
    $xl_line_chart = $this->getLineChart($user, $project, 'XL');

    return view('user.statistics', compact('xs_line_chart', 's_line_chart', 'm_line_chart', 'l_line_chart', 'xl_line_chart'));
  }

  private function getLineChart($user, $project, $size)
  {
    $tasks = $user->tasks
      ->where('size', $size)
      ->where('type', 'done')
      ->where('active', 0)
      ->where('project_id', $project->id);

    $computation = $this->repository->compute($user, $project, $size);
    $slope = $computation['slope'];
    $intercept = $computation['intercept'];

    $labels = $d_data = $p_data = '';
    $count = 0;

    foreach ($tasks as $task) {
      $count = $count + 1;
      $duration = round($slope * $count + $intercept, 0);

      $labels = $labels . '"' . $task->id . '",';

      $p_data = $p_data . $duration . ',';
      $d_data = $d_data . $task->duration . ',';
    }

    return [
      'labels' => $labels,
      'd_data' => $d_data,
      'p_data' => $p_data
    ];
  }
}
