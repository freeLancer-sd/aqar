<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/districts.fields.name').':') !!}
    <p>{{ $district->name }}</p>
</div>

<!-- Number Field -->
<div class="form-group">
    {!! Form::label('number', __('models/districts.fields.number').':') !!}
    <p>{{ $district->number }}</p>
</div>

<!-- City Id Field -->
<div class="form-group">
    {!! Form::label('city_id', __('models/districts.fields.city_id').':') !!}
    <p>{{ $district->city_id }}</p>
</div>

