<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/propertyCategories.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', __('models/propertyCategories.fields.status').':') !!}
    {!! Form::text('status', [0=>'يظهر للجميع', 1=>'يظهر للمستخدمين و الكل'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('propertyCategories.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
