<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/settings.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Version Field -->
<div class="form-group col-sm-6">
    {!! Form::label('version', __('models/settings.fields.version').':') !!}
    {!! Form::text('version', null, ['class' => 'form-control']) !!}
</div>

<!-- Version Last Field -->
<div class="form-group col-sm-6">
    {!! Form::label('version_last', __('models/settings.fields.version_last').':') !!}
    {!! Form::text('version_last', null, ['class' => 'form-control']) !!}
</div>

<!-- Primary Color Field -->
<div class="form-group col-sm-6">
    {!! Form::label('primary_color', __('models/settings.fields.primary_color').':') !!}
    {!! Form::text('primary_color', null, ['class' => 'form-control']) !!}
</div>

<!-- Secondary Color Field -->
<div class="form-group col-sm-6">
    {!! Form::label('secondary_color', __('models/settings.fields.secondary_color').':') !!}
    {!! Form::text('secondary_color', null, ['class' => 'form-control']) !!}
</div>

<!-- Logo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logo', __('models/settings.fields.logo').':') !!}
    {!! Form::text('logo', null, ['class' => 'form-control']) !!}
</div>

<!-- Mobile First Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile_first', __('models/settings.fields.mobile_first').':') !!}
    {!! Form::text('mobile_first', null, ['class' => 'form-control']) !!}
</div>

<!-- Mobile Secondary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile_secondary', __('models/settings.fields.mobile_secondary').':') !!}
    {!! Form::text('mobile_secondary', null, ['class' => 'form-control']) !!}
</div>

<!-- Whats App First Field -->
<div class="form-group col-sm-6">
    {!! Form::label('whats_app_first', __('models/settings.fields.whats_app_first').':') !!}
    {!! Form::text('whats_app_first', null, ['class' => 'form-control']) !!}
</div>

<!-- Whats App Secondary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('whats_app_secondary', __('models/settings.fields.whats_app_secondary').':') !!}
    {!! Form::text('whats_app_secondary', null, ['class' => 'form-control']) !!}
</div>

<!-- Fb Page Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fb_page', __('models/settings.fields.fb_page').':') !!}
    {!! Form::text('fb_page', null, ['class' => 'form-control']) !!}
</div>

<!-- Tw Page Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tw_page', __('models/settings.fields.tw_page').':') !!}
    {!! Form::text('tw_page', null, ['class' => 'form-control']) !!}
</div>

<!-- Snp Page Field -->
<div class="form-group col-sm-6">
    {!! Form::label('snp_page', __('models/settings.fields.snp_page').':') !!}
    {!! Form::text('snp_page', null, ['class' => 'form-control']) !!}
</div>

<!-- Ins Page Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ins_page', __('models/settings.fields.ins_page').':') !!}
    {!! Form::text('ins_page', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('settings.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
