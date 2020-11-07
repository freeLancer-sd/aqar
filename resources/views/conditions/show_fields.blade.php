<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('models/conditions.fields.title').':') !!}
    <p>{{ $condition->title }}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', __('models/conditions.fields.body').':') !!}
    <p>{{ $condition->body }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/conditions.fields.created_at').':') !!}
    <p>{{ $condition->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/conditions.fields.updated_at').':') !!}
    <p>{{ $condition->updated_at }}</p>
</div>

