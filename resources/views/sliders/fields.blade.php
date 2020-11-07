<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/sliders.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<!-- Title Field -->

<div class="form-group col-sm-6">
    {!! Form::label('status', __('models/sliders.fields.status').':') !!}
    {!! Form::select('status', [null => __('models/sliders.fields.status')] +
     [1 => 'Activate', 0=> 'Inactivate'], null, ['class' => 'form-control']) !!}
</div>
<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_url', __('models/sliders.fields.image_url').':') !!}
    {!! Form::file('image_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('sliders.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
