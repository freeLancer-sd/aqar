<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/sliders.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('sliders.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
