<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/notifications.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- message Field -->
<div class="form-group col-sm-6">
    {!! Form::label('message', __('models/notifications.fields.message').':') !!}
    {!! Form::text('message', null, ['class' => 'form-control']) !!}
</div>

<!-- type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', __('models/notifications.fields.type').':') !!}
    {!! Form::select('type', [null => __('models/notifications.fields.type')] +
     [
3 => 'عادية',
2 => 'عالية',
 1=> 'متوسط'
], null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stats', __('models/notifications.fields.stats').':') !!}
    {!! Form::select('stats', [null => __('models/notifications.fields.stats')] +
     [1 => 'تفعيل', 0=> 'إخفاء'], null, ['class' => 'form-control']) !!}
</div>

<!-- stats Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fcm', __('models/notifications.fields.fcm').':') !!}
    {!! Form::select('fcm', [null => __('models/notifications.fields.fcm')] +
      [1 => 'إرسال', false=> 'إخفاء'], null, ['class' => 'form-control']) !!}
</div> 


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('notifications.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
