<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('models/property_types.fields.title').':') !!}
    <p>{{ $propertyType->title }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('models/property_types.fields.status').':') !!}
    <p>{{ $propertyType->status }}</p>
</div>

