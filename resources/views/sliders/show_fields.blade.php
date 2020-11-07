<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('models/sliders.fields.title').':') !!}
    <p>{{ $slider->title }}</p>
</div>

<!-- Image Url Field -->
<div class="form-group">
    {!! Form::label('image_url', __('models/sliders.fields.image_url').':') !!}
    <p>{{ $slider->image_url }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('models/sliders.fields.status').':') !!}
    <p>{{ $slider->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/sliders.fields.created_at').':') !!}
    <p>{{ $slider->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/sliders.fields.updated_at').':') !!}
    <p>{{ $slider->updated_at }}</p>
</div>

