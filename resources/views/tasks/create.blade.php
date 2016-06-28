<div class="modal fade" id="modal-add" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content col-lg-12">
            {!! Form::open(['url' => '/tasks', 'class' => 'form-horizontal']) !!}
            <div class="modal-header col-lg-12">
                <h4 class="modal-title">Add Task ...</h4>
            </div>
            <div class="modal-body col-lg-12">

                {!! Form::hidden('project_id', $project->id) !!}

                <div class="col-lg-12">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder'=>'Task Title']) !!}
                        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder'=>'Task Description']) !!}
                        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <select name="users[]" multiple class="form-control">
                            @foreach($project->users as $user)
                                <option value={{$user->id}}>{{$user->email}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="mx-button  pull-left">
                            <input type="radio" name="size" id="button_xs" value="XS">
                            <label for="button_xs" unselectable>XS</label>
                        </div>
                        <div class="mx-button  pull-left">
                            <input type="radio" name="size" id="button_s" value="S">
                            <label for="button_s" unselectable>S</label>
                        </div>
                        <div class="mx-button  pull-left">
                            <input type="radio" name="size" id="button_m" value="M" checked>
                            <label for="button_m" unselectable>M</label>
                        </div>
                        <div class="mx-button  pull-left">
                            <input type="radio" name="size" id="button_l" value="L">
                            <label for="button_l" unselectable>L</label>
                        </div>
                        <div class="mx-button  pull-left">
                            <input type="radio" name="size" id="button_xl" value="XL">
                            <label for="button_xl" unselectable>XL</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="mx-button pull-right">
                            <input type="radio" name="type" id="button_done" value="done">
                            <label for="button_done" unselectable>Done</label>
                        </div>
                        <div class="mx-button pull-right">
                            <input type="radio" name="type" id="button_progress" value="progress">
                            <label for="button_progress" unselectable>Progress</label>
                        </div>
                        <div class="mx-button pull-right">
                            <input type="radio" name="type" id="button_sprint" value="sprint">
                            <label for="button_sprint" unselectable>Sprint</label>
                        </div>
                        <div class="mx-button pull-right">
                            <input type="radio" name="type" id="button_product" value="product" checked>
                            <label for="button_product" unselectable>Backlog</label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer col-lg-12">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                {!! Form::submit('Save Task', ['class' => 'btn btn-sm btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
