@extends('master')

@section('content')

        <!-- Content -->
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default panel-fs">
                    <div class="panel-heading">
                        <h3 class="panel-title">Project Show - {{$project->title}}</h3>
                    </div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#modal-add">
                                        <span class="glyphicon glyphicon-plus-sign"></span>
                                        &nbsp;Add Task
                                    </button>
                                    <a class="btn btn-default" href="{{ url('/projects/' . $project->id . '/statistics') }}">
                                        <span><i class="glyphicon glyphicon-stats"></i></span>
                                        &nbsp;Statistics
                                    </a>
                                    <hr>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <span class="glyphicon glyphicon-list"></span>
                                            &nbsp;Product
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        @foreach($project->activeTasks as $task)
                                            @if($task->type == 'product')
                                                @include('tasks.edit', ['task' => $task])
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="panel-footer">
                                        The entire product backlog.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <span class="glyphicon glyphicon-list"></span>
                                            &nbsp;Sprint
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        @foreach($project->activeTasks as $task)
                                            @if($task->type == 'sprint')
                                                @include('tasks.edit', ['task' => $task])
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="panel-footer">
                                        This weeks sprint backlog.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="panel panel-warning">

                                    <div class="panel-heading clearfix">
                                        <h3 class="panel-title">
                                            <span class="glyphicon glyphicon-time"></span>
                                            &nbsp;In Progress
                                        </h3>
                                    </div>

                                    <div class="panel-body">
                                        @foreach($project->activeTasks as $task)
                                            @if($task->type == 'progress')
                                                @include('tasks.edit', ['task' => $task])
                                            @endif
                                        @endforeach
                                    </div>

                                    <div class="panel-footer">
                                        All tasks currently undergoing development.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <span class="glyphicon glyphicon-list"></span>
                                            &nbsp;Done
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        @foreach($project->activeTasks as $task)
                                            @if($task->type == 'done')
                                                @include('tasks.edit', ['task' => $task])
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="panel-footer">
                                        All tasks finished in the current sprint.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('tasks.create')

</div>
@endsection