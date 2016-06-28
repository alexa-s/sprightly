@extends('master')

<style type="text/css">
    .bootstrap-tagsinput {
        width: 100%;
    }
</style>

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xs-12">
                    @if(Session::has('sync_success'))
                        <div class="alert alert-dismissible alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Success!</strong> Sync Complete.
                        </div>
                    @endif
                    <div class="panel panel-default panel-fs">
                        <div class="panel-heading">
                            <h3 class="panel-title">Project Index</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#modal-add-project">
                                            <span class="glyphicon glyphicon-plus-sign"></span>
                                            &nbsp;Add Project
                                        </button>
                                        <hr>
                                    </div>
                                    <div class="text-left">
                                        @foreach($projects as $project)

                                            @include('projects.edit', ['project' => $project])

                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">{{$project->title}}</h3>
                                                </div>
                                                <div class="panel-body">
                                                    {{$project->description}}
                                                </div>
                                                <div class="panel-footer clearfix ">
                                                    <div class="pull-left">
                                                        {!!Form::open(['method'=>'post', 'url' => ['/projects/'.$project->id.'/sync'],'style' => 'display:inline' ]) !!}
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="users"
                                                                       value="{{$project['users']}}"
                                                                       placeholder="Add users here ..."
                                                                       data-role="tagsinput">
                                                                <span class="input-group-btn">
                                                                     <button class="btn btn-default btn-sm form-control"
                                                                             type="submit">
                                                                         <span class="glyphicon glyphicon-refresh"></span>
                                                                         &nbsp;Sync
                                                                     </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                    <div class="col-sm-6"></div>
                                                    <div class=" pull-right">
                                                        {!!Html::link('/projects/'.$project->id,'Show',['class'=>'btn btn-sm btn-info'])!!}

                                                        <button type="button" class="btn btn-sm btn-primary"
                                                                data-toggle="modal"
                                                                data-target="#modal-edit-project-{{$project->id}}">
                                                            Update
                                                        </button>

                                                        {!!Form::open(['method'=>'delete', 'url' => ['/projects', $project->id],'style' => 'display:inline' ]) !!}
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <span><i class="glyphicon glyphicon-trash"></i></span>
                                                            &nbsp;Destroy
                                                        </button>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('projects.create')

@endsection
