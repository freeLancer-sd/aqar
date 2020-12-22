<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/properties.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_mobile', __('models/properties.fields.status_mobile').':') !!}
    {!! Form::select('status_mobile', [1=> 'اظهار رقم المعلن', 0=> 'إخفاء رقم المعلن'], null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('property_type', __('models/properties.fields.property_type').':') !!}
    {!! Form::select('property_type', ['إيجار'=> 'إيجار', 'بيع'=> 'بيع'], null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', __('models/properties.fields.address').':') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Lat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lat', __('models/properties.fields.lat').':') !!}
    {!! Form::number('lat', null, ['class' => 'form-control', 'step' => 'any']) !!}
</div>

<!-- Lng Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lng', __('models/properties.fields.lng').':') !!}
    {!! Form::number('lng', null, ['class' => 'form-control', 'step' => 'any']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', __('models/properties.fields.status').':') !!}
    <select id="status" name="status" class="form-control control" data-role="control">
        <option value="1" @if(isset($property)){{$property->status == 1 ? 'selected' : '' }}@endif>جديد</option>
        <option value="2" @if(isset($property)){{$property->status ==2 ? 'selected' : '' }}@endif>بنتظار الموافقة
        </option>
        <option value="3" @if(isset($property)){{$property->status ==3 ? 'selected' : '' }}@endif>تم الموافقة</option>
        <option value="4" @if(isset($property)){{$property->status ==4 ? 'selected' : '' }}@endif>مخفي</option>
    </select>
</div>

<!-- Room Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('room_number', __('models/properties.fields.room_number').':') !!}
    {!! Form::number('room_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Property Age Field -->
<div class="form-group col-sm-6">
    {!! Form::label('property_age', __('models/properties.fields.property_age').':') !!}
    {!! Form::number('property_age', null, ['class' => 'form-control']) !!}
</div>

<!-- Furnished Field -->
<div class="form-group col-sm-6">
    {!! Form::label('furnished', __('models/properties.fields.furnished').':') !!}
    {!! Form::number('furnished', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city_id', __('models/properties.fields.city_id').':') !!}
    {!! Form::number('city_id', null, ['class' => 'form-control']) !!}
</div>

<!-- District Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', __('models/properties.fields.district_id').':') !!}
    {!! Form::number('district_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Space Field -->
<div class="form-group col-sm-6">
    {!! Form::label('space', __('models/properties.fields.space').':') !!}
    {!! Form::number('space', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', __('models/properties.fields.price').':') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Note Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('note', __('models/properties.fields.note').':') !!}
    {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
</div>

<!-- Property Categorie Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('property_categorie_id', __('models/properties.fields.property_categorie_id').':') !!}
    {!! Form::number('property_categorie_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('models/properties.fields.user_id').':') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('properties.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
