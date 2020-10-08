<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/propertyTypes.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', __('models/propertyTypes.fields.status').':') !!}
    {!! Form::number('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('propertyTypes.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
