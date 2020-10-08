<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/images.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', __('models/images.fields.url').':') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Property Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('property_id', __('models/images.fields.property_id').':') !!}
    {!! Form::number('property_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('models/images.fields.user_id').':') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('images.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
