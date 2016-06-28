<div class="modal fade" id="modal-edit-project-{{$project->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content col-lg-12">
            {!! Form::model($project, ['method' => 'PATCH', 'url' => ['/projects', $project->id], 'class' => 'form-horizontal']) !!}
            <div class="modal-header col-lg-12">
                <h4 class="modal-title">Update Project ...</h4>
            </div>
            <div class="modal-body col-lg-12">
                <div class="col-lg-12">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder'=>'Project Title']) !!}
                        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder'=>'Project Description']) !!}
                        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
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