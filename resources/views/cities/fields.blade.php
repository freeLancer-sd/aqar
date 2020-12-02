<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/cities.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('cities.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
