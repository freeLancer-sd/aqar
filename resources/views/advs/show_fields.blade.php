<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('models/properties.fields.title').':') !!}
    <p>{{ $adv->title }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('models/properties.fields.status').':') !!}
    <p>{{ $adv->status }}</p>
</div>

<!-- Note Field -->
<div class="form-group">
    {!! Form::label('note', __('models/properties.fields.note').':') !!}
    <p>{{ $adv->note }}</p>
</div>


<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/properties.fields.user_id').':') !!}
    <p>{{ $adv->user_id }}</p>
</div>


<!-- Status Mobile Field -->
<div class="form-group">
    {!! Form::label('ads_mobile', __('models/advs.fields.ads_mobile').':') !!}
    <p>{{ $adv->ads_mobile }}</p>
</div>

