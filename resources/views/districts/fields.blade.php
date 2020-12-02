<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/districts.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number', __('models/districts.fields.number').':') !!}
    {!! Form::text('number', null, ['class' => 'form-control']) !!}
</div>

<!-- City Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city_id', __('models/districts.fields.city_id').':') !!}
    {!! Form::select('city_id', $city, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('districts.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
