<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('models/settings.fields.title').':') !!}
    <p>{{ $setting->title }}</p>
</div>

<!-- Version Field -->
<div class="form-group">
    {!! Form::label('version', __('models/settings.fields.version').':') !!}
    <p>{{ $setting->version }}</p>
</div>

<!-- Version Last Field -->
<div class="form-group">
    {!! Form::label('version_last', __('models/settings.fields.version_last').':') !!}
    <p>{{ $setting->version_last }}</p>
</div>

<!-- Primary Color Field -->
<div class="form-group">
    {!! Form::label('primary_color', __('models/settings.fields.primary_color').':') !!}
    <p>{{ $setting->primary_color }}</p>
</div>

<!-- Secondary Color Field -->
<div class="form-group">
    {!! Form::label('secondary_color', __('models/settings.fields.secondary_color').':') !!}
    <p>{{ $setting->secondary_color }}</p>
</div>

<!-- Logo Field -->
<div class="form-group">
    {!! Form::label('logo', __('models/settings.fields.logo').':') !!}
    <p>{{ $setting->logo }}</p>
</div>

<!-- Mobile First Field -->
<div class="form-group">
    {!! Form::label('mobile_first', __('models/settings.fields.mobile_first').':') !!}
    <p>{{ $setting->mobile_first }}</p>
</div>

<!-- Mobile Secondary Field -->
<div class="form-group">
    {!! Form::label('mobile_secondary', __('models/settings.fields.mobile_secondary').':') !!}
    <p>{{ $setting->mobile_secondary }}</p>
</div>

<!-- Whats App First Field -->
<div class="form-group">
    {!! Form::label('whats_app_first', __('models/settings.fields.whats_app_first').':') !!}
    <p>{{ $setting->whats_app_first }}</p>
</div>

<!-- Whats App Secondary Field -->
<div class="form-group">
    {!! Form::label('whats_app_secondary', __('models/settings.fields.whats_app_secondary').':') !!}
    <p>{{ $setting->whats_app_secondary }}</p>
</div>

<!-- Fb Page Field -->
<div class="form-group">
    {!! Form::label('fb_page', __('models/settings.fields.fb_page').':') !!}
    <p>{{ $setting->fb_page }}</p>
</div>

<!-- Tw Page Field -->
<div class="form-group">
    {!! Form::label('tw_page', __('models/settings.fields.tw_page').':') !!}
    <p>{{ $setting->tw_page }}</p>
</div>

<!-- Snp Page Field -->
<div class="form-group">
    {!! Form::label('snp_page', __('models/settings.fields.snp_page').':') !!}
    <p>{{ $setting->snp_page }}</p>
</div>

<!-- Ins Page Field -->
<div class="form-group">
    {!! Form::label('ins_page', __('models/settings.fields.ins_page').':') !!}
    <p>{{ $setting->ins_page }}</p>
</div>

