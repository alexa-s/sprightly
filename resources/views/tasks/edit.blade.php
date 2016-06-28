<div style="position: relative; top:2px;">
    @if($task->size=='XS' || $task->size=='S')
        <span class="label label-success">{{$task->size}}</span>
        @foreach($task->users as $user)
            <span class="label label-info">{{$user->email}}</span>
        @endforeach
    @endif
    @if($task->size=='M')
        <span class="label label-warning">{{$task->size}}</span>
        @foreach($task->users as $user)
            <span class="label label-info">{{$user->email}}</span>
        @endforeach
    @endif
    @if($task->size=='L' || $task->size=='XL')
        <span class="label label-danger">{{$task->size}}</span>
        @foreach($task->users as $user)
            <span class="label label-info">{{$user->email}}</span>
        @endforeach
    @endif
</div>

<div class="panel @if($task->size=='L' || $task->size=='XL') panel-danger @endif @if($task->size=='M') panel-warning @endif  @if($task->size=='XS' || $task->size=='S') panel-success @endif ">
    <div class="panel-body">

        <div>
            <strong>{{$task->title}}</strong><br>
            <small>{{$task->description}}</small>
        </div>

        <hr>

        <div>
            <button type="button" class="btn btn-primary btn-xs pull-left" data-toggle="modal" data-target="#modal-show-{{$task->id}}">
                <span class="glyphicon glyphicon-eye-open"></span> Show
            </button>

            @if($task->type == 'done')
                {!! Form::open(['method'=>'post', 'url' => ['/tasks/'.$task->id.'/archive'],'style' => 'display:inline' ]) !!}
                {!! Form::hidden('active', 0) !!}
                <button type="submit" class="btn btn-warning btn-xs pull-right">
                    <span><i class="glyphicon glyphicon-floppy-saved"></i></span>
                </button>
                {!! Form::close() !!}
            @endif

            @if($task->type != 'done')
                {!!Form::open(['method'=>'delete', 'url' => ['/tasks', $task->id],'style' => 'display:inline' ]) !!}
                <button type="submit" class="btn btn-danger btn-xs pull-right">
                    <span><i class="glyphicon glyphicon-trash"></i></span>
                </button>
                {!! Form::close() !!}
            @endif
        </div>
    </div>
</div>


<div class="modal fade" id="modal-show-{{$task->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content col-lg-12">

            {!! Form::model($task, ['method' => 'PATCH', 'url' => ['/tasks', $task->id], 'class' => 'form-horizontal']) !!}

            <div class="modal-header col-lg-12">
                <h4 class="modal-title">Show Task ...</h4>
            </div>

            <div class="modal-body col-lg-12">

                <div class="col-lg-12">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                        {!! Form::text('title', $task->title, ['class' => 'form-control', 'placeholder'=>'Title']) !!}
                        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group{{ $errors->has('description') ? 'has-error' : ''}}">
                        {!! Form::textarea('description', $task->description, ['class' => 'form-control', 'placeholder'=>'Description']) !!}
                        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <select name="users[]" multiple class="form-control">
                            @foreach($project->users as $p_user)
                                <option value={{$p_user->id}}
                                @foreach($task->users as $t_user) @if($p_user->id == $t_user->id) selected @endif @endforeach>{{$p_user->email}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="alert alert-info col-lg-12">
                    <p>
                        This task should take about
                        <strong>{{ \Carbon\Carbon::createFromFormat('H:i:s', gmdate("H:i:s", $task->predicted_duration))->hour}} hours</strong> and
                        <strong>{{ \Carbon\Carbon::createFromFormat('H:i:s', gmdate("H:i:s", $task->predicted_duration))->minute}} minutes</strong>.
                    </p>
                    <p>
                        It should take you approximately
                        <strong>{{ \Carbon\Carbon::createFromFormat('H:i:s', gmdate("H:i:s", $task_durations[$task->size]))->hour}} hours</strong>  and
                        <strong>{{ \Carbon\Carbon::createFromFormat('H:i:s', gmdate("H:i:s", $task_durations[$task->size]))->minute}} minutes</strong>.
                    </p>
                </div>

                @if($task->type == 'progress')
                    <div class="alert alert-warning col-lg-12">
                        <p>
                            In progress since
                            <strong>{{ \Carbon\Carbon::createFromFormat('H:i:s', gmdate("H:i:s", $task->duration))->hour}} hours</strong> and
                            <strong>{{ \Carbon\Carbon::createFromFormat('H:i:s', gmdate("H:i:s", $task->duration))->minute}} minutes</strong> ago.
                        </p>
                    </div>
                @endif

                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="mx-button  pull-left">
                            <input type="radio" name="size" id="button_xs-{{$task->id}}" value="XS" @if($task->size=='XS') checked @endif>
                            <label for="button_xs-{{$task->id}}" unselectable>XS</label>
                        </div>
                        <div class="mx-button  pull-left">
                            <input type="radio" name="size" id="button_s-{{$task->id}}" value="S" @if($task->size=='S') checked @endif>
                            <label for="button_s-{{$task->id}}" unselectable>S</label>
                        </div>
                        <div class="mx-button  pull-left">
                            <input type="radio" name="size" id="button_m-{{$task->id}}" value="M" @if($task->size=='M') checked @endif>
                            <label for="button_m-{{$task->id}}" unselectable>M</label>
                        </div>
                        <div class="mx-button  pull-left">
                            <input type="radio" name="size" id="button_l-{{$task->id}}" value="L" @if($task->size=='L') checked @endif>
                            <label for="button_l-{{$task->id}}" unselectable>L</label>
                        </div>
                        <div class="mx-button  pull-left">
                            <input type="radio" name="size" id="button_xl-{{$task->id}}" value="XL" @if($task->size=='XL') checked @endif>
                            <label for="button_xl-{{$task->id}}" unselectable>XL</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="mx-button pull-right">
                            <input type="radio" name="type" id="button_done-{{$task->id}}" value="done" @if($task->type=='done') checked @endif>
                            <label for="button_done-{{$task->id}}" unselectable>Done</label>
                        </div>
                        <div class="mx-button pull-right">
                            <input type="radio" name="type" id="button_progress-{{$task->id}}" value="progress" @if($task->type=='progress') checked @endif>
                            <label for="button_progress-{{$task->id}}" unselectable>Progress</label>
                        </div>
                        <div class="mx-button pull-right">
                            <input type="radio" name="type" id="button_sprint-{{$task->id}}" value="sprint" @if($task->type=='sprint') checked @endif>
                            <label for="button_sprint-{{$task->id}}" unselectable>Sprint</label>
                        </div>
                        <div class="mx-button pull-right">
                            <input type="radio" name="type" id="button_product-{{$task->id}}" value="product" @if($task->type=='product') checked @endif>
                            <label for="button_product-{{$task->id}}" unselectable>Backlog</label>
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer col-lg-12">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                {!! Form::submit('Save Changes', ['class' => 'btn btn-sm btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>