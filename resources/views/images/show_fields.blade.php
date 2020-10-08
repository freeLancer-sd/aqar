<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/images.fields.name').':') !!}
    <p>{{ $image->name }}</p>
</div>

<!-- Url Field -->
<div class="form-group">
    {!! Form::label('url', __('models/images.fields.url').':') !!}
    <p>{{ $image->url }}</p>
</div>

<!-- Property Id Field -->
<div class="form-group">
    {!! Form::label('property_id', __('models/images.fields.property_id').':') !!}
    <p>{{ $image->property_id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/images.fields.user_id').':') !!}
    <p>{{ $image->user_id }}</p>
</div>

