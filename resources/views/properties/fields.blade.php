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
    {!! Form::select('status',
['1'=> 'جديد', '2'=> 'بنتظار الموافقة', '3'=> 'تم الموافقة', '4'=> 'مخفي'],
null, ['class' => 'form-control select2']) !!}
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

<!-- Property Categorie Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('property_categorie_id', __('models/properties.fields.property_categorie_id').':') !!}
    {!! Form::select('property_categorie_id', $cat, null, ['class' => 'form-control']) !!}
    {{--    {!! Form::number('property_categorie_id', null, ['class' => 'form-control']) !!}--}}
</div>

<!-- Image Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('image', __('models/properties.fields.image').':') !!}
    <input type="file" id="image" class="form-control form-control-file" name="image[]" accept="image/*"
           multiple="multiple">
    @if ($property)
        @foreach($property->images as $item)
            <img src="{{$item->url}}" height="50" width="50">
        @endforeach
    @endif
</div>

<!-- Car Entrance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('car_entrance', __('models/properties.fields.car_entrance').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('car_entrance', 0) !!}
        {!! Form::checkbox('car_entrance', '1', null) !!} 1
    </label>
</div>

<!-- Deluxe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deluxe', __('models/properties.fields.deluxe').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('deluxe', 0) !!}
        {!! Form::checkbox('deluxe', '1', null) !!} 1
    </label>
</div>

<!-- Kitchen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kitchen', __('models/properties.fields.kitchen').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('kitchen', 0) !!}
        {!! Form::checkbox('kitchen', '1', null) !!} 1
    </label>
</div>

<!-- Swimming Pool Field -->
<div class="form-group col-sm-6">
    {!! Form::label('swimming_pool', __('models/properties.fields.swimming_pool').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('swimming_pool', 0) !!}
        {!! Form::checkbox('swimming_pool', '1', null) !!} 1
    </label>
</div>

<!-- Driver Room Field -->
<div class="form-group col-sm-6">
    {!! Form::label('driver_room', __('models/properties.fields.driver_room').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('driver_room', 0) !!}
        {!! Form::checkbox('driver_room', '1', null) !!} 1
    </label>
</div>

<!-- Maids Room Field -->
<div class="form-group col-sm-6">
    {!! Form::label('maids_room', __('models/properties.fields.maids_room').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('maids_room', 0) !!}
        {!! Form::checkbox('maids_room', '1', null) !!} 1
    </label>
</div>

<!-- Elevator Field -->
<div class="form-group col-sm-6">
    {!! Form::label('elevator', __('models/properties.fields.elevator').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('elevator', 0) !!}
        {!! Form::checkbox('elevator', '1', null) !!} 1
    </label>
</div>

<!-- Furnished Field -->
<div class="form-group col-sm-6">
    {!! Form::label('furnished', __('models/properties.fields.furnished').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('furnished', 0) !!}
        {!! Form::checkbox('furnished', '1', null) !!} 1
    </label>
</div>

<!-- Cellar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cellar', __('models/properties.fields.cellar').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('cellar', 0) !!}
        {!! Form::checkbox('cellar', '1', null) !!} 1
    </label>
</div>

<!-- Courtyard Field -->
<div class="form-group col-sm-6">
    {!! Form::label('courtyard', __('models/properties.fields.courtyard').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('courtyard', 0) !!}
        {!! Form::checkbox('courtyard', '1', null) !!} 1
    </label>
</div>

<!-- Extension Field -->
<div class="form-group col-sm-6">
    {!! Form::label('extension', __('models/properties.fields.extension').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('extension', 0) !!}
        {!! Form::checkbox('extension', '1', null) !!} 1
    </label>
</div>


<!-- Note Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('note', __('models/properties.fields.note').':') !!}
    {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('properties.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
