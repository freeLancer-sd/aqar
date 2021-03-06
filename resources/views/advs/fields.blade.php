<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/properties.fields.ads_title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>


<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', __('models/properties.fields.status').':') !!}
    <select id="status" name="status" class="form-control control" data-role="control">
        <option value="3" @if(isset($property)){{$property->status ==3 ? 'selected' : '' }}@endif>إظهار</option>
        <option value="4" @if(isset($property)){{$property->status ==4 ? 'selected' : '' }}@endif>إخفاء</option>
    </select>
</div>

<!-- Note Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('note', __('models/properties.fields.ads_note').':') !!}
    {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', __('models/properties.fields.image').':') !!}
    {{--    {!! Form::file('image[]', null, ['class' => 'form-control','roles' => 'form', 'multiple' => 'true']) !!}--}}
    <input type="file" id="image" class="form-control form-control-file" name="image[]" accept="image/*" multiple="multiple">
</div>

<!-- ads_mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ads_mobile', __('models/advs.fields.ads_mobile').':') !!}
    {!! Form::text('ads_mobile', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('advs.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
